<?php


namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController
{
    public function index()
    {
        Auth::loginUsingId('1');
        Auth::logout();

        $categories = Category::all();
        return view('home.main', compact('categories'));


    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $products = Product::query()
            ->where('name', 'LIKE', '%' . $search . '%')
            ->orderBy('name')
            ->get();
            if(file_exists($products)){
                Session::flash('warning', 'Product not found!');
                return view('search');
            }else{
                return view('search', compact('products'));
            }
    }

}
