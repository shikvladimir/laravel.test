<?php


namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;

class HomeController
{
    public function index(){
        Auth::loginUsingId('1');
        Auth::logout();
        return view('home.main');
    }
}
