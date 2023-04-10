<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class VprContentPerson extends Authenticatable
{
    use HasFactory;
    protected $table = "vpr_content_person";
    public $timestamps = false;

    protected $fillable = [
        'id',
        'user_id',
        'fullname',
        'password',
        'client_id',
        'title',
        'affiliation',
        'affiliation_url',
        'email',
        'first_name',
        'last_name',
        'homepage',
        'national',
        'biography',
        'avatar',
        'biography',
        'avatar'
    ];

    function authorTop(){
        $author_top_array = [
            '50',
            '69',
            '214',
            '702',
            '1233',
            '1651'
        ];
        $flip = array_flip($author_top_array);

        // $rand_number = $array_rand;
        $rand_author = array_rand($flip, 6);
        $arr_to_string = implode(',', $rand_author);
        $obj_select_author = "SELECT * FROM vpr_content_person WHERE id in ".$arr_to_string."";
        return $obj_select_author;
    }

    function otherData(){
        return $this->hasOne(get_class($this),'id','id');
    }

}
