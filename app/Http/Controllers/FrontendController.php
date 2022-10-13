<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\suborder;
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
        $men = product::where('p_branch_id','=','1')->where('prostatus','1')->orderBy('id', 'DESC')->limit(7)->get();
        $women = product::where('p_branch_id','=','2')->where('prostatus','1')->orderBy('id', 'DESC')->limit(7)->get();
        $kids = product::where('p_branch_id','=','3')->where('prostatus','1')->orderBy('id', 'DESC')->limit(7)->get();
        // dd($women);
        return view('index',compact('men','women','kids'));
    }

    public function admin_index(){
        return view('admin.layout.admin_index');
    }
    public function header(){
        return view('include.header');
    }
    public function footer(){
        return view('include.footer');
    }
    public function shop_main_category($id){
        $subcat = subcatagory_info::Join('catagory_infos','subcatagory_infos.cat_id','=','catagory_infos.id')->Join('branches','catagory_infos.branch_id','=','branches.id')->where('subcatagory_infos.id','=',$id)->first(['subcatagory_infos.subcatagory_name','catagory_infos.catagory_name','branches.branch_name']);
        $products = product::where('subcat_id','=',$id)->where('prostatus','1')->get();
        return view('shop_main_category',compact('subcat','products'));
    }
    public function cart(){

        return view('cart_list');
    }
    public function checkout(){
        $user = User::where('id','=',auth()->id())->first();
        return view('checkout',compact('user'));
    }
    public function login(){
        return view('login');
    }
    public function register(){
        return view('register');
    }
    public function single_product($id){
        $product = product::find($id);
        return view('single_product',compact('product'));
    }
    public function profile(){
        $user = User::where('id','=',auth()->id())->first();
        $orders = order::Join('suborders','orders.id','=','suborders.order_id')->where('orders.user_id','=',auth()->id())->get(['orders.*','suborders.*']);
        return view('profile',compact('user','orders'));
    }
    public function change_password(){
        $user = User::where('id','=',auth()->id())->first();
        $orders = order::Join('suborders','orders.id','=','suborders.order_id')->where('orders.user_id','=',auth()->id())->get(['orders.*','suborders.*']);
        return view('profile',compact('user','orders'));
    }
    public function my_order_list(){
        $user = User::where('id','=',auth()->id())->first();
        $orders = order::where('orders.user_id','=',auth()->id())->get();
//        dd($orders);
        return view('profile',compact('user','orders'));
    }
    public function my_order_delete(Request $request){
        $order_id = order::where('id','=',$request->deletingId)->where('user_id','=',auth()->id());
        $order_id->delete();
        
        $suborder = suborder::where('order_id',$request->deletingId)->where('user_id','=',auth()->id());
        $suborder->delete();
        return back()->with('success','Order have been successfully Deleted.');
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
