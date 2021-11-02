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


        $cartCount = Session::get('cart');
        if (isset($cartCount)) {
            $show = count($cartCount);
        } else {
            $show = 0;
        }

        $wishCount = Session::all();
        if (isset($wishCount['wishlist'])) {
            $wishlistCount = count($wishCount['wishlist']);
        } else {
            $wishlistCount = 0;
        }

        $showProductList = Session::get('cart');
        $showList = [];
        if (isset($showProductList)) {
            foreach ($showProductList as $id => $item) {
                $showList[] = Product::query()->find($id)->getAttributes();
            }
        }

        $result = Session::get('cart');;
        $sum = 0;
        $res = [];
        if (isset($result)) {
            foreach ($result as $id => $item){
                $res[] = Product::query()
                    ->find($id)['price'];
            }
            foreach ($res as $key => $value){
                $sum += $value;
            }
        }

        $categories = Category::all();
        $products = Product::query()
            ->limit(7)
            ->inRandomOrder()
            ->get();
        return view('home.main', compact('categories', 'products', 'show', 'wishlistCount', 'showList','sum'));

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
            Session::flash('warning', 'Product not found!');
        }

        $cartCount = Session::get('cart');
        if (isset($cartCount)) {
            $show = count($cartCount);
        } else {
            $show = 0;
        }

        $wishCount = Session::all();
        if (isset($wishCount['wishlist'])) {
            $wishlistCount = count($wishCount['wishlist']);
        } else {
            $wishlistCount = 0;
        }

        $showProductList = Session::get('cart');
        $showList = [];
        if (isset($showProductList)) {
            $productList = $showProductList;
            foreach ($productList as $id => $item) {
                $showList[] = Product::query()->find($id)->getAttributes();
            }
        }


        return view('search', compact('products', 'categories', 'show', 'wishlistCount', 'showList'));

    }


}
