<?php

use App\Models\branch;
use App\Models\catagory_info;
use App\Models\subcatagory_info;

function branches(){
    $branches = branch::all();
    return $branches;
}
function catagories(){
    $catagories = catagory_info::all();
    return $catagories;
}
function subcatagories(){
    $subcatagories = subcatagory_info::all();
    return $subcatagories;
}
