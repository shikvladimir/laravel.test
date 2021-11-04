<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Services\CartService;
use Darryldecode\Cart\Cart;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{

    /**
     * @var CartService
     */
    private $cartService;

    public function __construct(CartService $cartService)
    {
            $this->cartService = $cartService;
    }

    public function addToCart(Request $request)
    {
        $this->cartService->addToCart($request->input('product_id'));
        return back();
    }



    public function showCart()
    {
        $products = $this->cartService->getProducts();
        return view('cart', compact('products'));
    }

    public function destroy($id)
    {
        $this->cartService->deleteFromCart($id);
        return back();
    }

}
