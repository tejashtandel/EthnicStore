<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_detail extends Model
{
    use HasFactory;
    protected $fillable = [
        'catid',
        'sub_cay_id',
        'productid',
        'brandid',
        'pattern',
        'sleeve',
        'neck',
        'fabric',
        'length',
        'style',
        'occasion',
        'package_contain',
        'product_description',
        'size',
        'quantity',
        'bottomtype',
        'mulimages',
        'flag'
    ];
}
