<?php

namespace App\Http\Controllers;
use App\Models\VprContentMaterial;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\VprContentPerson;

class VprAuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $author_profile = VprContentPerson::where('id', $id)->with('otherData')->first();
        // dd($author_profile);
            // $browses = new VprContentMaterial();
            // $browses = $browses->where('modified')->paginate(12);
            $category_author = DB::table('vpr_content_materialperson')->where('vpr_content_materialperson.person_id', $id)->join('vpr_content_material', 'vpr_content_material.id', '=', 'material_rid')->where('vpr_content_materialperson.role', '=', 1)->get();
            // dd($category_author);
            foreach($category_author as $item){
                $array[] = $item->material_rid;
            }

            $browses = new VprContentMaterial();
            if($category_author->count() != 0){
            $browses = $browses->WhereIn('id', $array)->latest('modified')->paginate(12);
            }
            else{
                return redirect()->back()->withErrors(['message' => 'Bạn chưa có bài viết / giáo trình nào']);
            }
            if (request()->wantsJson()) {
                return VprContentMaterial::collection($browses);
            }
        return view('author.profile', ['profile' => $author_profile, 'browses' => $browses]);
 
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
        //
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
