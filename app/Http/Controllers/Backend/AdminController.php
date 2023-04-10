<?php

namespace App\Http\Controllers\backend;


use App\Http\Controllers\Controller;
use App\Models\Material;
use App\Models\VprContentMaterial;
use App\Models\VprContentPerson;
use App\Models\VprUser;
use Illuminate\Http\Request;
use App\Http\Requests\MaterialUpdateRequest;
use App\Models\VprContentMaterialPerson;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;
use PHPUnit\TextUI\XmlConfiguration\ConvertLogTypes;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Gate::allows('is_supperuser') && !Gate::allows('is_staff')) {
            abort(403);
        }
        $materials = new VprContentMaterial();
        $materials = $materials::where('deleted', 0)->where('publish', '=', 1)->latest('modified')->paginate(10);

        $users = new VprUser();
        $users = $users->latest('last_login')->paginate(10);

        $featured_authors = VprContentPerson::whereIn('id', 
        ['50',
        '69',
        '758',
        '1374',
        '1643',
        '1649',
        '1663'])->latest('id')->paginate(10);

        $data['materials'] = $materials;
        $data['users'] = $users;
        $data['featured_authors'] = $featured_authors;
        return view('backend.admin', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.materials.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'text' => 'required',
                'title' => 'required',
                'language' => 'required',
            ], 
            [
                'text.required' => 'Không được để trống nội dung',
                'title.required' => 'Không được để trống tiêu đề',
                'language.required' => 'Không được để trống ngôn ngữ',
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
            'categories' => implode('()', $request->categories['name']),
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

     public function hide() {
        $materials = new VprContentMaterial();
        
        $materials = $materials->where('publish', '=', 1)->latest('modified')->paginate(10);

        $materials = DB::table('vpr_content_materialperson')
                    ->selectRaw('distinct material_rid, person_id, vpr_content_material.id, vpr_content_material.material_id, vpr_content_material.categories, vpr_content_material.title, vpr_content_person.fullname, vpr_content_material.modified, vpr_content_material.material_type, vpr_content_person.user_id')
                    ->join('vpr_content_material', 'vpr_content_material.id', '=', 'vpr_content_materialperson.material_rid')
                    ->join('vpr_content_person', 'vpr_content_person.id', '=', 'vpr_content_materialperson.person_id')
                    ->where('publish', '=', 0)
                    ->where('deleted', 0)
                    ->latest('modified')
                    ->paginate(10);
                    $materials_try = new VprContentMaterial();
                    $materials_try = $materials_try->latest('modified')->paginate(10);
                    for($i = 0; $i < sizeof($materials_try); $i++){
                        $categories[] = $materials_try[$i]->categories;
                        $material_ids[] = $materials_try[$i]->id;
                    }
                    $categories = preg_replace('/[^\p{L}\p{N}\s]/u', ' ', $categories);
                    
                    $name_arr = array();
                    if (!empty($categories)) {
                        for($i1 = 0; $i1 < sizeof($categories); $i1++){
                            $categories_name = explode('  ', trim($categories[$i1]));
                            $name = DB::table('vpr_content_category')->whereIn('id', $categories_name)->get();
                            $name = $name->map(function($val, $index) use ($material_ids, $i1) {
                                return [
                                    'id' => $val->id,
                                    'name' => $val->name,
                                    'parent' => $val->parent,
                                    'description' => $val->description,
                                    'material_id' => $material_ids[$i1],
                                ];
                            })->toArray();
                            $name_arr[] = $name;
                        }
                    }
                    // dump($materials);
                    // dd($name_arr);
                    $data['name_arr'] = $name_arr;

                    $data['materials'] = $materials;
                    return view('backend.materials.hide', $data);
     }

    public function show()
    {
        if (!Gate::allows('is_supperuser') && !Gate::allows('is_staff')) {
            abort(403);
        }

        $materials = new VprContentMaterial();
        $materials = $materials::where('publish', '=', 1)->where('deleted', 0)->latest('modified')->paginate(10);

        $materials = DB::table('vpr_content_materialperson')
                    ->selectRaw('distinct material_rid, person_id, vpr_content_material.id, vpr_content_material.material_id, vpr_content_material.categories, vpr_content_material.title, vpr_content_person.fullname, vpr_content_material.modified, vpr_content_material.material_type, vpr_content_person.user_id')
                    ->join('vpr_content_material', 'vpr_content_material.id', '=', 'vpr_content_materialperson.material_rid')
                    ->join('vpr_content_person', 'vpr_content_person.id', '=', 'vpr_content_materialperson.person_id')
                    ->where('publish', '=', 1)
                    ->where('deleted', 0)
                    ->latest('modified')
                    ->paginate(10);
                    $materials_try = new VprContentMaterial();
                    $materials_try = $materials_try->latest('modified')->paginate(10);
                    for($i = 0; $i < sizeof($materials_try); $i++){
                        $categories[] = $materials_try[$i]->categories;
                        $material_ids[] = $materials_try[$i]->id;
                    }
                    $categories = preg_replace('/[^\p{L}\p{N}\s]/u', ' ', $categories);
                    
                    $name_arr = array();
                    if (!empty($categories)) {
                        for($i1 = 0; $i1 < sizeof($categories); $i1++){
                            $categories_name = explode('  ', trim($categories[$i1]));
                            $name = DB::table('vpr_content_category')->whereIn('id', $categories_name)->get();
                            $name = $name->map(function($val, $index) use ($material_ids, $i1) {
                                return [
                                    'id' => $val->id,
                                    'name' => $val->name,
                                    'parent' => $val->parent,
                                    'description' => $val->description,
                                    'material_id' => $material_ids[$i1],
                                ];
                            })->toArray();
                            $name_arr[] = $name;
                        }
                    }
                    $count = DB::table('vpr_content_material')->count();
                    $count_hide = DB::table('vpr_content_material')->where('publish', 0)->where('deleted', 0)->count();
                    $count_deleted = DB::table('vpr_content_material')->where('deleted', 1)->count();
                    // dd($materials);
                    // dd($count_hide);
                    $data['name_arr'] = $name_arr;
                    $data['materials'] = $materials;
                    $data['count'] = $count;
                    $data['count_hide'] = $count_hide;
                    $data['count_deleted'] = $count_deleted;
                    return view('backend.materials.index', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $material = VprContentMaterial::where('material_id', $id)->first();
        return view('backend.materials.edit')->with('material', $material);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MaterialUpdateRequest $request, $id){
        $material = VprContentMaterial::find($id);
        $material->title = $request->title;
        $material->material_type = $request->material_type;
        $material->description = $request->description;
        $material->publish = $request->publish;
        $material->text = $request->text;
        $material->modified = Carbon::now();

        if ($request->hasFile('image')) {
            // Delete old image
            if ($material->image) {
                Storage::delete($material->image);
            }
            // Store image
            $image_path = $request->file('image')->store('materials', 'public');
            // Save to Database
            $material->image = $image_path;
            
        }

        if (!$material->save()) {
            return redirect()->back()->with('error', 'update không thành công.');
        }
        return redirect()->route('admin.show')->with('success', 'Cập nhật thông tin tài liệu thành công.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $material = VprContentMaterial::find($id);
        $material->where('id', $id)->update(['deleted' => 1]);
    }

    public function delete(){
        $materials = DB::table('vpr_content_materialperson')
                    ->selectRaw('distinct material_rid, person_id, vpr_content_material.id, vpr_content_material.material_id, vpr_content_material.categories, vpr_content_material.title, vpr_content_person.fullname, vpr_content_material.modified, vpr_content_material.material_type, vpr_content_person.user_id')
                    ->join('vpr_content_material', 'vpr_content_material.id', '=', 'vpr_content_materialperson.material_rid')
                    ->join('vpr_content_person', 'vpr_content_person.id', '=', 'vpr_content_materialperson.person_id')
                    ->where('deleted', 1)
                    ->latest('modified')
                    ->paginate(10);
            $materials_try = new VprContentMaterial();
            $materials_try = $materials_try->latest('modified')->paginate(10);
            for($i = 0; $i < sizeof($materials_try); $i++){
                $categories[] = $materials_try[$i]->categories;
                $material_ids[] = $materials_try[$i]->id;
            }
            $categories = preg_replace('/[^\p{L}\p{N}\s]/u', ' ', $categories);
            
            $name_arr = array();
            if (!empty($categories)) {
                for($i1 = 0; $i1 < sizeof($categories); $i1++){
                    $categories_name = explode('  ', trim($categories[$i1]));
                    $name = DB::table('vpr_content_category')->whereIn('id', $categories_name)->get();
                    $name = $name->map(function($val, $index) use ($material_ids, $i1) {
                        return [
                            'id' => $val->id,
                            'name' => $val->name,
                            'parent' => $val->parent,
                            'description' => $val->description,
                            'material_id' => $material_ids[$i1],
                        ];
                    })->toArray();
                    $name_arr[] = $name;
                }
            }
            $data['materials'] = $materials;
            $data['name_arr'] = $name_arr;
        return view('backend.materials.deleted', $data);
    }

    public function undelete($id){
        $material = VprContentMaterial::find($id);
        $material->where('id', $id)->update(['deleted' => 0]);
        return back();
    }

    public function confirm_destroy($id){
        $material = VprContentMaterial::find($id);
        if($material){
            $viewcount_delete = DB::table('vpr_content_materialviewcount')->where('material_id', $id)->delete();
            $rating_delete = DB::table('vpr_content_materialrating')->where('material_id', $id)->delete();
        }
        $material->delete();
        return response('Xóa bản ghi thành công.', 200);
    }


    public function logout(Request $request)
        {
            Auth::guard('web')->logout();
        
            // $request->session()->invalidate();
        
            // $request->session()->regenerateToken();
        
            return redirect('/admin/login');
        }
}
