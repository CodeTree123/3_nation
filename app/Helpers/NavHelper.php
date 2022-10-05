<?php

use App\Models\branch;
use App\Models\catagory_info;
use App\Models\subcatagory_info;
use Gloudemans\Shoppingcart\Facades\Cart;

function branches(){
    $branches = branch::where('branch_status','1')->get();
    return $branches;
}
function catagories(){
    $catagories = catagory_info::where('catstatus','1')->get();
    return $catagories;
}
function subcatagories(){
    $subcatagories = subcatagory_info::where('subcatstatus','1')->get();
    return $subcatagories;
}
function cart(){
    $cart=Cart::content();
    return $cart;
}
