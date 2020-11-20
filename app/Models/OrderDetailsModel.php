<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetailsModel extends Model
{
    use HasFactory;
    protected $table = 'orderdetails';
    protected $fillable = [
        'id_order',
        'id_product',
        'quantity',
        'price',
        'service_code',
        'sale',
        'warranty_preiod',
    ];
}
