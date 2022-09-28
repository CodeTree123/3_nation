<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\branch;
use App\Models\catagory_info;
use App\Models\subcatagory_info;
use App\Models\product;
use File;

class AdminController extends Controller
{
    //
    // public function shop_index(){
    //     return view('shop_admin.layout.shop_index');
    // }
//shop Profile Update
    // public function shop_edit_profile(Request $request){
    //     // dd($request->all());
    //     $shop= shop_info::where('u_id','=',$request->s_id)->update([
    //         'b_legal_name' => $request->b_legal_name,
    //         'b_dba' => $request->b_dba,
    //         'street_number_b' => $request->street_number_b,
    //         'apt_b' => $request->apt_b,
    //         'city_b' => $request->city_b,
    //         'state_b' => $request->state_b,
    //         'zip_b' => $request->zip_b,
    //         'street_number_c' => $request->street_number_c,
    //         'apt_c' => $request->apt_c,
    //         'city_c' => $request->city_c,
    //         'state_c' => $request->state_c,
    //         'zip_c' => $request->zip_c
    //     ]);

    //     return back()->with('success','Shop information have been successfully Updated.');

    // }
    public function branch(){
        $branchs = branch::all();
        return view('admin.layout.branch',compact('branchs'));
    }
// Catagory
    public function catagory(){
        $branchs = branch::all();
        $catagories = catagory_info::Join('branches','catagory_infos.branch_id','=','branches.id')->get(['catagory_infos.*','branches.branch_name']);
        return view('admin.layout.catagory',compact('branchs','catagories'));
    }

    public function catagory_add(Request $request){
        // dd($request->all());
        catagory_info::create([
            'branch_id' => $request->branch_id,
            'catagory_name' => $request->catagory_name,
            'catstatus' => $request->c_status,
        ]);

        return back()->with('success','Catagory information have been successfully Added.');
    }

    public function catagory_edit($id){
        $catagory = catagory_info::find($id);
        return response()->json([
            'status'=>200,
            'cat' => $catagory,
        ]);

    }

    public function catagory_update(Request $request){
        // dd($request->all());
        // $c_image = catagory_info::find($request->catagory_id);
        catagory_info::find($request->catagory_id)->update([
            'branch_id' => $request->branch_id,
            'catagory_name' => $request->catagory_name,
        ]);

        return back()->with('success','Catagory information have been successfully Updated.');
    }

    public function catagory_delete(Request $request){

        $del_catagory_info = catagory_info::find($request->deletingId);
        $del_catagory_info->delete();

        return back()->with('success','Catagory information have been successfully Deleted.');
    }

//Sub Catagory
    public function sub_catagory(){
        $catagories = catagory_info::Join('branches','catagory_infos.branch_id','=','branches.id')->get(['catagory_infos.*','branches.branch_name']);
        $subcatagories = subcatagory_info::Join('catagory_infos','subcatagory_infos.cat_id','=','catagory_infos.id')->Join('branches','catagory_infos.branch_id','=','branches.id')->get(['subcatagory_infos.*','catagory_infos.catagory_name','branches.branch_name']);
        return view('admin.layout.sub_catagory',compact('catagories','subcatagories'));
    }

    public function sub_catagory_add(Request $request){
        // dd($request->all());
        subcatagory_info::create([
            'cat_id' => $request->cat_id,
            'subcatagory_name' => $request->subcatagory_name,
            'subcatstatus' => $request->subcat_status,
        ]);

        return back()->with('success','Sub Catagory information have been successfully Added.');
    }

    public function sub_catagory_edit($id){
        $subcatagory = subcatagory_info::find($id);
        return response()->json([
            'status'=>200,
            'subcat' => $subcatagory,
        ]);

    }

    public function sub_catagory_update(Request $request){
        // dd($request->all());
        subcatagory_info::find($request->u_subcatagory_id)->update([
            'cat_id' => $request->cat_id,
            'subcatagory_name' => $request->subcatagory_name,
        ]);

        return back()->with('success','Sub Catagory information have been successfully Updated.');
    }
    

    public function sub_catagory_delete(Request $request){

        $del_subcatagory_info = subcatagory_info::find($request->deletingId);
        $del_subcatagory_info->delete();

        return back()->with('success','Sub Catagory information have been successfully Deleted.');
    }

//Product
    public function product(){
        $subcatagories = subcatagory_info::Join('catagory_infos','subcatagory_infos.cat_id','=','catagory_infos.id')->Join('branches','catagory_infos.branch_id','=','branches.id')->get(['subcatagory_infos.*','catagory_infos.catagory_name','branches.branch_name']);
        $products = product::Join('subcatagory_infos','products.subcat_id','=','subcatagory_infos.id')
                            ->Join('catagory_infos','subcatagory_infos.cat_id','=','catagory_infos.id')
                            ->Join('branches','catagory_infos.branch_id','=','branches.id')
                            ->get(['products.*','subcatagory_infos.subcatagory_name','catagory_infos.catagory_name','branches.branch_name']);
        return view('admin.layout.product',compact('subcatagories','products'));
    }

    public function product_add(Request $request){
        // dd($request->all());
        $filename='';
        if($request->hasFile('product_image'))
        {

            $file= $request->file('product_image');
            if ($file->isValid()) {
                $filename="product".date('Ymdhms').'.'.$file->getClientOriginalExtension();
                $file->storeAs('product',$filename);
            }
        }
        // dd($filename);
        product::create([
            'subcat_id' => $request->subcat_id,
            'product_name' => $request->product_name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $filename,
            'prostatus' => $request->p_status,
        ]);

        return back()->with('success','Service information have been successfully Added.');
    }

    public function product_edit($id){
        $service = service::find($id);
        return response()->json([
            'status'=>200,
            'serv' => $service,
        ]);

    }

    public function product_update(Request $request){
        // dd($request->all());
        service::find($request->product_id)->update([
            'subcatagory_id' => $request->sub_cat_id,
            'service_name' => $request->u_service_name,
            's_description' => $request->u_s_description,
            'price' => $request->u_price,
            // 'sc_image' => $filename,
        ]);

        return back()->with('success','Sub Catagory information have been successfully Updated.');
    }

    public function product_delete(Request $request){

        $del_service_id = $request->deletingId;
        $del_service_info = service::find($del_service_id);
        $del_service_info->delete();

        return back()->with('success','Service information have been successfully Deleted.');
    }


}

