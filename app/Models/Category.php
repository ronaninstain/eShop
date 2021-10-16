<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function subCategory(){
        return $this->hasMany(SubCategory::class,'CategoryID');
    }

    public function Product(){
        return $this->hasMany(Product::class,'CategoryID');
    }
}
