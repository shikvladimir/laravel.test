<?php


namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController
{
    public function index()
    {
        Auth::loginUsingId('1');
        Auth::logout();
        return view('home.main');
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $products = Product::query()
            ->where('name', 'LIKE', '%' . $search . '%')
            ->orderBy('name')
            ->get();
//           ->paginate(9);
        return view('search', compact('products'));
    }

}
