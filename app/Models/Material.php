<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
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
}
