<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory , SoftDeletes;

    const PATH = "uploades/images/products/";

    protected $fillable = ['name' , 'description' , 'status' , 'image' , 'price' , 'category_id'];



    public function category()
    {
        return $this->belongsTo(Category::class , 'category_id');
    }
}
