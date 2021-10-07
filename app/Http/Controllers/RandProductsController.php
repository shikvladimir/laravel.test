<?php

namespace App\Http\Controllers;

    use App\Models\Product;
    use Illuminate\Http\Request;

class RandProductsController extends Controller
{
    public function index(){
        return view('randProducts');
    }

    public function product(){
        $products = Product::all();
        $randProducts = [];
        for($i=1; $i<=10; $i++){
            $randProducts[] = rand(1, count($products));
        }

        $productItem = [];
        foreach($randProducts as $product){
            $randProductsId = Product::all()->where('id', '=',$product);
                $productItem[] = $randProductsId;

        }
        return view('randProducts', compact('productItem'));
    }


}
