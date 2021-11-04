<?php


namespace App\Services;


use App\Models\Product;
use Illuminate\Support\Facades\Session;

class CartService
{
        public function addToCart($productId){
            $cart = Session::get('cart', []);
            $cart[$productId] = ($cart[$productId] ?? 0) + 1;
            Session::put('cart', $cart);
        }

        public function getProducts(){
            $cart = collect(Session::get('cart', []));
            $ids = $cart->keys();
            return Product::query()->whereIn('id', $ids)->get();
        }

        public function deleteFromCart($productId){
            $products = Session::all();
            unset($products['cart'][$productId]);
            Session::put($products);
        }
}
