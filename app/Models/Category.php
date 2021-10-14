<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'title','category_id'];

    public function products()
    {
        $categories = Category::find(1);
        $products = $categories->products;
        foreach ($products as $product){
            echo $product->name;
        }


        return $this->hasMany(Product::class);
    }


//    public function getRouteKeyName()
//    {
//        return 'name';
//    }
}
