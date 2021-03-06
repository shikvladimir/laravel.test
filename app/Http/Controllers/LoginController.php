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
        $products = Product::all();
        return view('auth.register', compact('products'));
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
        $products = Product::all();
        return view('auth.login', compact('products'));
    }

    public function checkLogin(Request $request)
    {
        Auth::attempt($request->only(['email', 'password']));
//        return redirect()->route('main_page');
        return back();
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        $items = User::create($request->all());

        return back()->with('success', 'Product successfully added.');
    }

}
