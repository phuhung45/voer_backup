<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Browse extends Model
{
    use HasFactory;
    protected $fillable = [
        'material_id',
        'material_type',
        'text',
        'title',
        'description',
        'categories',
        'keywords',
        'language',
        'modified'
    ];
    function slug(){
        return \Str::slug($this->title);
    }
}
