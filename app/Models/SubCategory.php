<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SubCategory extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'CategoryID'];

    public function category(){
        return $this->belongsTo(Category::class,'CategoryID');
    }

    public function Product(){
        return $this->HasMany(Product::class,'SubCategoryID');
    }

}
