<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VprContentMaterial;
use App\Models\VprContentMaterialFile;

class ReplaceController extends Controller
{
    public function index(){
        $files = VprContentMaterialFile::where('id', '>', 24100)->paginate(5000);
        foreach( $files as $file ){ 
            // dump($file);
            $new_name = 'src="/'.$file->name;
            $old_name = 'src="'.$file->name;
            $post = VprContentMaterial::where('material_id', $file->material_id)->first();
            $post->text = str_replace($old_name,$new_name,$post->text) ;
            $post->update();
        }
        return view('backend.welcome');
    }
}

