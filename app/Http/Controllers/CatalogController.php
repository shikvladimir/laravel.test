<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CatalogController extends Controller
{

    public function index(Request $request)
    {
        $cartCount = Session::all();
        if(isset($cartCount['cart'])){
            $show = count($cartCount['cart']);
        }else{
            $show = 0;
        }

        $wishCount = Session::all();
        if(isset($wishCount['wishlist'])){
            $wishlistCount = count($wishCount['wishlist']);
        }else{
            $wishlistCount = 0;
        }
        $categories = Category::all();
        $products = Product::query()
            ->paginate(9);

        return view('catalog.catalog',
            compact('categories', 'products','show','wishlistCount'));


    }

    public function category(Request $request, Category $category)
    {
        $cartCount = Session::all();
        if(isset($cartCount['cart'])){
            $show = count($cartCount['cart']);
        }else{
            $show = 0;
        }

        $wishCount = Session::all();
        if(isset($wishCount['wishlist'])){
            $wishlistCount = count($wishCount['wishlist']);
        }else{
            $wishlistCount = 0;
        }
        $categories = Category::all();
        $products = Product::query()
            ->paginate(9);



        return view('catalog.catalog',
            compact('category', 'categories', 'products','show','wishlistCount'));
    }

    public function product(Request $request, $category, $product)
    {
        return view('catalog.product');
    }
}
