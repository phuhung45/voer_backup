<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VprContentMaterialPerson extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "vpr_content_materialperson";
    protected $fillable = [
        'id',
        'material_rid',
        'person_id',
        'role'
    ];

    function person(){
        return $this->hasOne('\App\Models\VprContentPerson','id','person_id');
    }
}
