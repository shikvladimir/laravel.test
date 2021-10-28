<?php


namespace App\Services;


use App\Contracts\ProductServiceInterface;
use App\Models\Product;

class CustomProductService implements ProductServiceInterface
{
    public function findProductById($id){
        dump('4444');
        return Product::find($id);
    }

    public function getProductsByCategory($categoryId){

    }


}
