<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\branch;
use App\Models\catagory_info;
use App\Models\subcatagory_info;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index(){
        $branches = branch::all();
        $catagories = catagory_info::all();
        $subcatagories = subcatagory_info::all();
        return view('index',compact('branches','catagories','subcatagories'));
    }

    public function admin_index(){
        return view('admin.layout.admin_index');
    }
    public function header(){
        // $branches = branch::all();
        // $catagories = catagory_info::all();
        // $subcatagories = subcatagory_info::all();
        return view('include.header');
    }
    public function footer(){
        return view('include.footer');
    }
    public function shop_main_category($id){
        $branches = branch::all();
        $catagories = catagory_info::all();
        $subcatagories = subcatagory_info::all();
        $subcat = subcatagory_info::Join('catagory_infos','subcatagory_infos.cat_id','=','catagory_infos.id')->Join('branches','catagory_infos.branch_id','=','branches.id')->where('subcatagory_infos.id','=',$id)->first(['subcatagory_infos.subcatagory_name','catagory_infos.catagory_name','branches.branch_name']);
        $products = product::where('subcat_id','=',$id)->get();
        return view('shop_main_category',compact('branches','catagories','subcatagories','subcat','products'));
    }
    public function cart_list(){
        return view('cart_list');
    }
    public function checkout(){
        return view('checkout');
    }
    public function login(){
        $branches = branch::all();
        $catagories = catagory_info::all();
        $subcatagories = subcatagory_info::all();
        return view('login',compact('branches','catagories','subcatagories'));
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
    public function change_password(){
        $user = User::where('id','=',auth()->id())->first();
        return view('profile',compact('user'));
    }
    public function order(){
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
