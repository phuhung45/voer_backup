<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\VprContentMaterial;
use Carbon\Carbon;
use App\Models\VprContentMaterialPerson;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        return view('browse.collection_create', $data);
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
            'title' => 'required',
            ], 
            [
            'title.required' => 'Không được để trống tiêu đề',
            ]
        );
        $array = array(
            "content" => $request->content,
        );
        // dd($array);
        $image_path = '';
                if ($request->hasFile('image')) {
                    $image_path = $request->file('image')->store('materials', 'public');
                }

            $material = VprContentMaterial::create([
                'material_id' => Str::lower(Str::random(8)),
                'material_type' => 2,
                'text' => json_encode($array),
                'version' => '1',
                'title' => $request->title,
                'description' => $request->description,
                'categories' => implode('()', $request->categories['name']),
                'keywords' => $request->keywords,
                'language' => 'vi',
                'license_id' => $request->license_id,
                'publish' => '1',
                'modified' => Carbon::now(),
                'derived_from' => $request->derived_from,
                'image' => $image_path,
                'author' => auth('front')->user()->id,
            ]);
            if ($material) {
                $author = VprContentMaterialPerson::create([
                    'material_rid' => $material['id'],
                    'person_id' => auth('front')->user()->id,
                    'role' => '1',
                ]);
                $message = $request->validate;
                return redirect($message)->route('browse.index')->with('success', 'Thêm bài viết mới thành công.');
            }else{
                return redirect()->back()->with('error', 'Xảy ra lỗi khi thêm bài viết.');
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
