<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
class VprContentMaterial extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "vpr_content_material";
    protected $fillable = [
        'id',
        'material_id',
        'slug',
        'material_type',
        'text',
        'title',
        'description',
        'categories',
        'keywords',
        'language',
        'modified',
        'created_at',
        'deleted'
    ];

    public function regex(){
        $string = "(1)(2)(3)(4)(5)(6)";
        preg_replace('/[^\p{L}\p{N}\s]/u', '', $string);
    }

    function slug(){
        return Str::slug($this->title);
    }

    function randAuthor(){
        return \App\Models\VprContentPerson::where('fullname','<>',NULL)->where('fullname','<>','')->inRandomOrder()->first()->fullname;
    }

    function author(){
        return $this->hasMany('\App\Models\VprContentMaterialPerson','material_rid','id');
    }

    function file(){
       return $this->hasOne('\App\Models\VprContentMaterialFile','material_id','material_id');
    }

    public function getAvatarUrl()
    {
        return Storage::url($this->avatar);
    }

    function fileRandImage(){
        $array_rand = [
            '0e60bfc6',
            '01f46fc2',
            '2d2e6a46',
            '3ec080b8',
            '4c212f92',
            '4dbdd6c5',
            '022e4f84',
            '45df218a',
            'b14d14a4',
            'c3ad3533',
            'c6628b9e',
            'd4aa7723',
            'ecacee10',
            'f2feed3c',
            'f05253f3',
            'fd2f579c'
        ];
        $flip = array_flip($array_rand);

        // $rand_number = $array_rand;
        $rand_number = array_rand($flip, 6);
        $arr_to_string = implode(',', $rand_number);
        $obj_select = "SELECT * FROM vpr_content_material WHERE material_id in ".$arr_to_string."";
        return $obj_select;
    }


    // function otherData(){
    //     return $this->hasOne(get_class($this),'id','id');
    // }
    
}
