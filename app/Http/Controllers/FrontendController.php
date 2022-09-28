<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index(){
        return view('index');
    }
    public function header(){
        return view('include.header');
    }
    public function footer(){
        return view('include.footer');
    }
    public function shop_main_category(){
        return view('shop_main_category');
    }
    public function cart_list(){
        return view('cart_list');
    }
    public function checkout(){
        return view('checkout');
    }
    public function login(){
        return view('login');
    }
    public function register(){
        return view('register');
    }
    public function single_product(){
        return view('single_product');
    }
    public function profile(){
        $user = User::where('id','=',auth()->id())->first();
        return view('profile',compact('user'));
    }
    public function about_us(){
        return view('about_us');
    }
    public function privacy_policy(){
        return view('privacy_policy');
    }
    public function terms_and_conditions(){
        return view('terms_and_conditions');
    }
}
