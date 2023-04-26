<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\VprContentMaterial;
use Carbon\Carbon;
use App\Models\VprContentMaterialPerson;
use App\Models\VprContentPerson;
use Illuminate\Support\Facades\Storage;
class UserMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('browse.create');
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
                ], 
                [
                'text.required' => 'Không được để trống nội dung',
                'title.required' => 'Không được để trống tiêu đề',
                ]
          );

            // $image_path = '';
            //     if ($request->hasFile('image')) {
            //         $image_path = $request->file('image')->store('materials', 'public');
            //     }
            $image_path = '';
            if ($request->hasFile('image')) {
                // Delete old image
    
                // Store image -> store where ?
                $image_path = $request->file('image')->store('materials', 'public');
                // Save to Database
                // $material->image = $image_path;
            }
            $material = VprContentMaterial::create([
                'material_id' => Str::lower(Str::random(8)),
                'material_type' => '1',
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
                'author' => auth('front')->user()->id,
            ]);

        // dd($material);
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
    public function show(Request $request)
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
