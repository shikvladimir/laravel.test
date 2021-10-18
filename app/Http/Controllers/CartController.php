<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addToCart(Request $request){
        $cart = Session::get('cart',[]);
        $id = $request->input('product_id');
        $cart[$id] = ($cart[$id] ?? 0)+1;
        Session::put('cart',$cart);
        return back();
    }

    public function showCart(){

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
        $cart = collect(Session::get('cart',[]));
        $ids = $cart->keys();
        $products = Product::query()->whereIn('id',$ids)->get();


        return view('cart',compact('products','categories','show','wishlistCount'));
    }




    public function destroy($id)
    {
        $product = collect(Session::all());

        $delete = $product['cart'];
        $product->forget($delete['14}']);

//        dd(Session::all());
        $product->forget($id);

        return response()
            ->redirectToRoute('cart');
    }


}
