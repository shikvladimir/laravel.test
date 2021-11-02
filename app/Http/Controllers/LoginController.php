<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegistrationRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{

    public function register()
    {
        $cartCount = Session::get('cart');
        if (isset($cartCount)) {
            $show = count($cartCount);
        } else {
            $show = 0;
        }
        Session::put($cartCount);

        $wishCount = Session::get('cart');
        if (isset($wishCount)) {
            $wishlistCount = count($wishCount);

        } else {
            $wishlistCount = 0;
        }
        Session::put($wishCount);

        $products = Product::all();
        $categories = Category::all();
        return view('auth.register', compact('categories','products','wishlistCount', 'show'));
    }

    public function registration(UserRegistrationRequest $request)
    {
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        User::create($data);

        return redirect()->route('main_page');

    }

    public function login()
    {
        $cartCount = Session::get('cart');
        if (isset($cartCount)) {
            $show = count($cartCount);
        } else {
            $show = 0;
        }
        Session::put($cartCount);

        $wishCount = Session::get('cart');
        if (isset($wishCount)) {
            $wishlistCount = count($wishCount);

        } else {
            $wishlistCount = 0;
        }
        Session::put($wishCount);

        $products = Product::all();
        $categories = Category::all();
        return view('auth.login', compact('categories','products','wishlistCount', 'show'));
    }

    public function checkLogin(Request $request)
    {
        Auth::attempt($request->only(['email', 'password']));
//        return redirect()->route('main_page');
return back();
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'email' => 'required',
            'password' => 'required'
        ]);

        $items = User::create($request->all());

        return back()->with('success','Product successfully added.');
    }

}
