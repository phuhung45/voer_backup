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
    public function index()
    {
        $browses = new VprContentMaterial();
        $browses = $browses->where('publish', '=', 1)->where('deleted', 0)->latest('modified')->paginate(12);
        

        if (request()->wantsJson()) {
            return VprContentMaterial::collection($browses);
        }
        $data['browses'] = $browses;
        return view('browse.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

                dd($request->all());
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
