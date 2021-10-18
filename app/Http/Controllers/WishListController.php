<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class WishListController extends Controller
{
    public function addToWishlist(Request $request){

        $wishlist = Session::get('wishlist',[]);
        $id = $request->input('product_id');
        $wishlist[$id] = ($wishlist[$id] ?? 0)+1;
        Session::put('wishlist',$wishlist);
        return back();
    }

    public function showWishlist(){

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
        $wishlist = collect(Session::get('wishlist',[]));
        $ids = $wishlist->keys();
        $products = Product::query()->whereIn('id',$ids)->get();

        return view('wishlist',compact('products','categories','show','wishlistCount'));
    }
}