<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory , SoftDeletes;


    protected $fillable = ['name' , 'description' , 'status' , 'parent_id'];


     //رابطه داخلی فرزند با والد
     public function parent()
     {
         return $this->belongsTo($this, 'parent_id')->with('parent');
     }
 
 
     //رابطه داخلی والد با فرزند 
     public function children()
     {
         return $this->hasMany($this, 'parent_id')->with('children');
     }


     public function products()
     {
        return $this->hasMany(Product::class);
     }
}
