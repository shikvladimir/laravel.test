<?php


namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController
{
    public function index(Request $request)
    {
        Auth::loginUsingId('1');
        Auth::logout();


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

        $showProductList = Session::all();
        if(isset($showProductList['cart'])){
            $productList = $showProductList['cart'];
            dd($productList);
        }else{
            $productList = 0;
        }

        $products = Product::query()
            ->limit(7)
            ->inRandomOrder()
            ->get();
        $categories = Category::all();
        return view('home.main', compact('categories', 'products', 'show','wishlistCount','productList'));


    }

    public function search(Request $request)
    {
        $categories = Category::all();
        $search = $request->get('search');
        $products = Product::query()
            ->where('name', 'LIKE', '%' . $search . '%')
            ->orderBy('name')
            ->get();
        if ($products->isEmpty()) {
            Session::flash('success', 'Product not found!');
        }
        return view('search', compact('products', 'categories'));

    }


}
