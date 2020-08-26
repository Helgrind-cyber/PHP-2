<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    // public $timestamps = false;
    protected $fillable = [
        'name', 'cate_id', 'price', 'short_desc', 'detail', 'star', 'created_at', 'updated_at', 'views'
    ];
}
