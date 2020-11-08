<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    use HasFactory;
    protected $table = 'categorys';
    protected $fillable = [
        'name',
        'alias',
        'id_parent',
        'description',
        'status'
    ];
}
