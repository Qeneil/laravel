<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_name',
        'product_short_des',
        'product_long_des',
        'pric',
        'product_category_name',
        'product_subcatgory_name',
        'product_category_id',
        'product_subcatgory_id',
        'product_img',
        'slug',



    ];
}
