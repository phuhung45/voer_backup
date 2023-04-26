<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VprContentMaterial;
use App\Models\VprContentMaterialPerson;
use App\Models\VprContentPerson;
use Illuminate\Support\Facades\DB;

class VprContentMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($material_type,$slug, $id, $content_id = NULL)
    {
        
        $aray_test = [];
        // *
        $material_detail = VprContentMaterial::where('material_id', $id)->first();
        // dd($material_detail->author);
        
        if(!empty($material_detail)) {

            $material_id = $material_detail->id;
            $material_type = $material_detail->material_type;
            // *
            $person_id = $material_detail->author[0]->person_id;
            $count = DB::table('vpr_content_materialperson')
                ->where('vpr_content_materialperson.person_id', $person_id)
                ->where('vpr_content_materialperson.role', '=', 1)
                ->join('vpr_content_material', 'vpr_content_material.id', '=', 'vpr_content_materialperson.material_rid')
                ->select('material_type', DB::raw('count(material_rid) as total'))
                ->groupBy('material_type')
                ->get();
                // dd($count);
                
            $author = DB::table('vpr_content_person')->where('vpr_content_person.id' , '=', $person_id)->first();
                
            $categories = [$material_detail->categories];
            $categories = preg_replace('/[^\p{L}\p{N}\s]/u', ' ', $categories);
            // dd($categories);
            // dd($categories);
            
            $int = (int)$categories[0];
            // dd($int);
            // $patterns = '/[^\d]/u';
            // $categories = explode('  ', trim(preg_replace($patterns, ' ', $material_detail->categories)));
            
            // $int = (int)$categories;
            // dd($int);

            if($int == 0){
                $name_categories = '';
            }else{
                $categories_detail = DB::table('vpr_content_category')->where('vpr_content_category.id', $int)->first();
                $name_categories = $categories_detail->name;
            }
            $same_author = DB::table('vpr_content_materialperson')
                ->where('vpr_content_materialperson.person_id', $person_id)
                ->where('vpr_content_materialperson.role', '=', 1)
                ->where('vpr_content_material.material_type', '=', 1)
                ->join('vpr_content_material', 'vpr_content_material.id', '=', 'vpr_content_materialperson.material_rid')
                ->latest('modified')
                ->paginate(10);

            if (!empty($material_type == 1)) {
                // $text = json_decode($material_detail->text);
                $data_other = false;
                $name_author = $material_detail->author;
                $arr_name_author = [];
                // dd($data_other);
                foreach ($name_author as $detail_author){
//                    merge name all author
                    $arr_name_author[$detail_author->person->first()->fullname] = 0;
                }
                $author_id = $material_detail->author[0]->person_id;
                $name_author = array_keys($arr_name_author);

            } elseif (!empty($material_type == 2)) {
                $text = json_decode($material_detail->text);
				$list_arr = $text;

                $data_try = [];
                $data_author_try = [];
                foreach ($text as $detail_other) {
                    for ($i = 0; $i < sizeof($detail_other); $i++) {
                        // dd($detail_other);
                        if(!empty($detail_other[$i]->content)){
                            $data_id_try = $detail_other[$i]->content[0]->id;
                            $data_author_try = $detail_other[$i]->content[0]->authors;
                            $data_title_try = $detail_other[$i]->content;

                            $title_content = $data_title_try;
                        //    dd($data_title_try);
                        }else{
                            $data_id_try = $detail_other[$i]->id;
                            $data_author_try = $detail_other[$i]->authors ??'';
                            $data_title_try = $detail_other[$i];
                            $title_content = $data_title_try;
                        }
                        $array_all_authors = [];
                                for ($i_authors =0; $i_authors < sizeof($data_author_try);$i_authors++){
                                $array_all_authors[$data_author_try[$i_authors]] = 0;
                            
                        }
                            
                          
                        // lay ra tat ca author khac nhau trong cac noi dung khac nhau gop vao 1 mang
                        $array_all_authors = array_keys($array_all_authors);
                        $name_author = $array_all_authors;

                        $aray_test[] = $data_id_try;


                        $data_try = VprContentMaterial::where('material_id', $data_id_try)->first();
//                        dd('zz2');
                        $array_post[] = $data_try;
                        
//                        dd($array_post);
                    }
                }
                $data_other = $array_post;
            //    dd($data_other);
            //    dd($data_try);
            }
            

            if(empty($title_content)){
                $title_content = '';
            }
			if (empty($list_arr)) $list_arr = '';

            if($content_id){
                $data_content_id = VprContentMaterial::where('material_id', '=', $content_id)->first();
                $data['data_content_id'] = $data_content_id;
            }
            $data['detail'] = $material_detail;
            $data['name_categories'] = $name_categories;
            $data['title_content'] = $title_content;
            $data['data_content'] = $data_other;
            $data['name_author'] = $name_author;
            $data['same_author'] = $same_author;
            $data['list_arr'] = $list_arr;
            $data['content_id'] = $content_id;
            $data['count'] = $count;
            // $data['baiviet'] = $count_baiviet;
            $data['author'] = $author;
            // dd($data);
            return view('browse.detail', $data);
        }
        return abort(404);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($material_type,$slug, $id)
    {
        
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
