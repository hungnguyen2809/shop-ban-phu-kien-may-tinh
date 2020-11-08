<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'name',
        'alias',
        'images',
        'description',
        'quantity',
        'price',
        'id_brand',
        'id_category',
        'status'
    ];
}
