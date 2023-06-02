<?php

namespace App\Http\Controllers;

use App\Models\VprContentMaterial;
use Illuminate\Http\Request;
use App\Models\VprContentMaterialPerson;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class BrowseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try
        {
            // $browses =  VprContentMaterial::query();

            // if($request->all() == NULL){
            //     $browses->where('publish', '=', true)->where('deleted', false)->latest('modified');
            // }
            // if($request->author || $request->author_id){
            //     $author_id = $request->author ?: $request->author_id;
            //     $browses->whereHas('author', function($query) use ($author_id){
            //         return $query->where('material_rid',$author_id);
            //     });
            // }
            // if($request->languages ==  "en" || $request->languages == "vi"){
            //     $browses->where('language',$request->languages);
            // }
            // if(!empty($request->types)){
            //     $browses->where('material_type',$request->types);
            // }
            // if(!empty($request->categories)){
                
            //     $categories = explode(',', $request->categories);
            //     foreach($categories as $category){
            //         $browses->Where('categories', 'LIKE', "%$category%");
            //     }
            // }
            // if($request->sort){
            //     if($request->sort == 'title'){
            //         $browses->orderBy('title','asc');
                    
            //     }elseif($request->sort == '-title'){
            //         $browses->orderBy('title','desc');
            //     }elseif($request->sort == 'modified'){
            //         $browses->orderBy('modified','desc');
            //     }
            //     elseif($request->sort == '-modified'){
            //         $browses->orderBy('modified','asc');
            //     }
            // }
            $browses = DB::table('vpr_content_material');
           
            if($request->author || $request->author_id){
                $author_id = $request->author ?: $request->author_id;
                $browses->leftJoin('vpr_content_materialperson','vpr_content_material.id', '=', 'vpr_content_materialperson.material_rid')
                ->where('vpr_content_materialperson.person_id','=', $author_id);
            }
            if($request->has('languages') ){
                $languages = explode(',', $request->languages);
                if(!in_array('all', $languages)){
                    $browses->where(function($query) use($languages) {
                        foreach($languages as $index =>  $language){
                            if($index==0){
                                $query->where('language', $language);
                            }else{
                                $query->orWhere('language', $language);
                            }
                        }
                    });
                }
            }
            if($request->has('types')){
                $types = explode(',', $request->types);
                if(!in_array('all', $types)){
                    $browses->where(function($query) use($types) {
                        foreach($types as $index =>  $type){
                            if($index==0){
                                $query->where('material_type', $type);
                            }else{
                                $query->orWhere('material_type', $type);
                            }
                        }
                    });
                }
                
            }
            if(!empty($request->categories)){
                $categories = explode(',', $request->categories);
                if(!in_array('all', $categories)){
                    $browses->where(function($query) use($categories) {
                        foreach($categories as $index =>  $category){
                            if($index==0){
                                $query->where('categories', 'LIKE', "%$category%");
                            }else{
                                $query->orWhere('categories', 'LIKE', "%$category%");
                            }
                        }
                    });
                }
            }
            if($request->sort){
                if($request->sort == 'title'){
                    $browses->orderBy('title','asc');
                    
                }elseif($request->sort == '-title'){
                    $browses->orderBy('title','desc');
                }elseif($request->sort == 'modified'){
                    $browses->orderBy('modified','desc');
                }
                elseif($request->sort == '-modified'){
                    $browses->orderBy('modified','asc');
                }
            }
            $browses = $browses->paginate(12);
            if($request->ajax()){
                return view('browse.part', compact('browses'));
            }
            if (request()->wantsJson()) {
                return VprContentMaterial::collection($browses);
            }

            $data['browses'] = $browses;
            return view('browse.index', $data);
        }
        catch(\Exception $e)
        { 
            dd($e);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $author = DB::table('vpr_content_person')->where('id', auth('front')->user()->id)->select('id', 'fullname', 'user_id')->get();
        $material = VprContentMaterialPerson::where('person_id', auth('front')->user()->id)
        ->where('role', 1)
        ->join('vpr_content_material', 'vpr_content_material.id', '=', 'vpr_content_materialperson.material_rid')
        ->where('material_type',1)->get();
        $data['author'] = $author;
        $data['material'] = $material;
        if($material->count() != 0){
            return view('browse.collection_create', $data);
            } else{
                return redirect()->back()->withErrors(['message' => 'Hiện bạn chưa có tài liệu nào, vui lòng thêm tài liệu trước khi thêm giáo trình']);;
            }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate(
            [
                'text' => 'required',
                'title' => 'required',
                'language' => 'required',
                'author' => 'required'
            ], 
            [
                'text.required' => 'Không được để trống nội dung',
                'title.required' => 'Không được để trống tiêu đề',
                'language.required' => 'Không được để trống ngôn ngữ',
                'author.required' => 'Không được để trống tác giả'
            ]
          );

          $image_path = '';
                if ($request->hasFile('image')) {
                    $image_path = $request->file('image')->store('materials', 'public');
                }

        $material = VprContentMaterial::create([
            'material_id' => Str::lower(Str::random(8)),
            'material_type' => $request->material_type,
            'text' => $request->text,
            'version' => '1',
            'title' => $request->title,
            'description' => $request->description,
            'categories' => $request->categories,
            'keywords' => $request->keywords,
            'language' => 'vi',
            'license_id' => $request->license_id,
            'publish' => '1',
            'modified' => Carbon::now(),
            'derived_from' => $request->derived_from,
            'image' => $image_path,
            'author' => $request->author,

        ]);
        if ($material) {
            $author = VprContentMaterialPerson::create([
                'material_rid' => $material['id'],
                'person_id' => $request->author,
                'role' => '1',
            ]);
            $message = $request->validate;
            return redirect($message)->route('admin.show')->with('success', 'Thêm người dùng mới thành công.');
        }else{
            return redirect()->back()->with('error', 'Xảy ra lỗi khi thêm người dùng.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    

    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
