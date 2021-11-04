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

        $products = Product::query()
            ->limit(7)
            ->inRandomOrder()
            ->get();
        return view('home.main', compact( 'products'));

    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $products = Product::query()
            ->where('name', 'LIKE', '%' . $search . '%')
            ->orderBy('name')
            ->get();
        if ($products->isEmpty()) {
            Session::flash('warning', 'Product not found!');
        }

        return view('search', compact('products'));
    }


}
