<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $fillable = [
        'sub_cat_id',
        'product_name',
        'size',
        'color',
        'price',
        'image',
        'flag'
    ];
}
