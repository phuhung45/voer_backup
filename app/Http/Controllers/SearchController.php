<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VprContentMaterial;
use App\Models\VprContentMaterialPerson;
use Illuminate\Support\Facades\DB;


class SearchController extends Controller
{
    public function searchByTitle(Request $request){
        $material = VprContentMaterial::where('title', 'like', '%' . $request->keyword . '%')
        ->latest('modified')
        ->paginate(10);
        $keyword = $request->keyword;
        $data['material'] = $material;
        $data['keyword'] = $keyword;
        return view('browse.search', $data); 
    }

    public function adminSearchByTitle(Request $request){
        $material = VprContentMaterial::where('title', 'like', '%' . $request->keyword . '%')
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
        $keyword = $request->keyword;
        $data['material'] = $material;
        $data['keyword'] = $keyword;
        $data['name_arr'] = $name_arr;
        return view('backend.materials.search', $data); 
    }

    public function action(Request $request){

    }
}
