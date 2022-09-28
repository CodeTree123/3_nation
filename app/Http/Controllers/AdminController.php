<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\shop_info;
use App\Models\catagory_info;
use App\Models\subcatagory_info;
use App\Models\service;
use File;

class ShopController extends Controller
{
    //
    public function shop_index(){
        return view('shop_admin.layout.shop_index');
    }
//shop Profile Update
    public function shop_edit_profile(Request $request){
        // dd($request->all());
        $shop= shop_info::where('u_id','=',$request->s_id)->update([
            'b_legal_name' => $request->b_legal_name,
            'b_dba' => $request->b_dba,
            'street_number_b' => $request->street_number_b,
            'apt_b' => $request->apt_b,
            'city_b' => $request->city_b,
            'state_b' => $request->state_b,
            'zip_b' => $request->zip_b,
            'street_number_c' => $request->street_number_c,
            'apt_c' => $request->apt_c,
            'city_c' => $request->city_c,
            'state_c' => $request->state_c,
            'zip_c' => $request->zip_c
        ]);

        return back()->with('success','Shop information have been successfully Updated.');

    }
// Catagory
    public function shop_catagory(){
        $catagories = catagory_info::where('shop_id','=',auth()->id())->get();
        return view('shop_admin.layout.catagory',compact('catagories'));
    }

    public function shop_catagory_add(Request $request){
        // dd($request->all());
        $filename='';
        if($request->hasFile('catagory_image'))
        {

            $file= $request->file('catagory_image');
            if ($file->isValid()) {
                $filename="shopcat".date('Ymdhms').'.'.$file->getClientOriginalExtension();
                $file->storeAs('shop/catagory',$filename);
            }
        }
        // dd($filename);
        catagory_info::create([
            'shop_id' => $request->shop_id,
            'catagory_name' => $request->catagory_name,
            'c_description' => $request->description,
            'c_image' => $filename,
            'c_status' => $request->c_status,
        ]);

        return back()->with('success','Catagory information have been successfully Added.');
    }

    public function shop_catagory_edit($id){
        $catagory = catagory_info::find($id);
        return response()->json([
            'status'=>200,
            'cat' => $catagory,
        ]);

    }

    public function shop_catagory_update(Request $request){
        // dd($request->all());
        $c_image = catagory_info::find($request->shop_catagory_id);
        $filename=$c_image->c_image;
        if($request->hasFile('catagory_image'))
        {
            $destination = 'uploads/shop/catagory/'.$c_image->c_image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file= $request->file('catagory_image');
            if ($file->isValid()) {
                $filename="shopcat".date('Ymdhms').'.'.$file->getClientOriginalExtension();
                $file->storeAs('shop/catagory',$filename);
            }
        }
        // dd($filename);
        catagory_info::find($request->shop_catagory_id)->update([
            'catagory_name' => $request->catagory_name,
            'c_description' => $request->description,
            'c_image' => $filename,
        ]);

        return back()->with('success','Catagory information have been successfully Updated.');
    }

    public function shop_catagory_delete(Request $request){

        $del_catagory_id = $request->deletingId;
        $del_catagory_info = catagory_info::find($del_catagory_id);

        $destination = 'uploads/shop/catagory/'.$del_catagory_info->c_image;
        if(File::exists($destination)){
            File::delete($destination);
        }
        $del_catagory_info->delete();

        return back()->with('success','Catagory information have been successfully Deleted.');
    }

//Sub Catagory
    public function shop_sub_catagory(){
        $catagories = catagory_info::where('shop_id','=',auth()->id())->get();
        $subcatagories = subcatagory_info::where('subcatagory_infos.shop_id','=',auth()->id())->Join('catagory_infos','subcatagory_infos.catagory_id','=','catagory_infos.id')->get(['subcatagory_infos.*','catagory_infos.catagory_name']);
        return view('shop_admin.layout.sub_catagory',compact('catagories','subcatagories'));
    }

    public function shop_sub_catagory_add(Request $request){
        // dd($request->all());
        $filename='';
        if($request->hasFile('sub_catagory_image'))
        {

            $file= $request->file('sub_catagory_image');
            if ($file->isValid()) {
                $filename="shopcat".date('Ymdhms').'.'.$file->getClientOriginalExtension();
                $file->storeAs('shop/sub_catagory',$filename);
            }
        }
        // dd($filename);
        subcatagory_info::create([
            'shop_id' => $request->shop_id,
            'catagory_id' => $request->cat_id,
            'subcatagory_name' => $request->subcatagory_name,
            'sc_description' => $request->description,
            'sc_image' => $filename,
            'sc_status' => $request->sc_status,
        ]);

        return back()->with('success','Sub Catagory information have been successfully Added.');
    }

    public function shop_sub_catagory_edit($id){
        $subcatagory = subcatagory_info::find($id);
        return response()->json([
            'status'=>200,
            'subcat' => $subcatagory,
        ]);

    }

    public function shop_sub_catagory_update(Request $request){
        // dd($request->all());
        $sc_image = subcatagory_info::find($request->shop_subcatagory_id);
        $filename=$sc_image->sc_image;
        if($request->hasFile('sub_catagory_image'))
        {
            $destination = 'uploads/shop/sub_catagory/'.$sc_image->sc_image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file= $request->file('sub_catagory_image');
            if ($file->isValid()) {
                $filename="shopcat".date('Ymdhms').'.'.$file->getClientOriginalExtension();
                $file->storeAs('shop/sub_catagory',$filename);
            }
        }
        // dd($filename);
        subcatagory_info::find($request->shop_subcatagory_id)->update([
            'catagory_id' => $request->cat_id,
            'subcatagory_name' => $request->subcatagory_name,
            'sc_description' => $request->description,
            'sc_image' => $filename,
        ]);

        return back()->with('success','Sub Catagory information have been successfully Updated.');
    }
    

    public function shop_sub_catagory_delete(Request $request){

        $del_subcatagory_id = $request->deletingId;
        $del_subcatagory_info = subcatagory_info::find($del_subcatagory_id);

        $destination = 'uploads/shop/sub_catagory/'.$del_subcatagory_info->sc_image;
        if(File::exists($destination)){
            File::delete($destination);
        }
        $del_subcatagory_info->delete();

        return back()->with('success','Sub Catagory information have been successfully Deleted.');
    }

//Service
    public function shop_service(){
        $subcatagories = subcatagory_info::where('shop_id','=',auth()->id())->get();
        $services = service::where('services.shop_id','=',auth()->id())
                            ->Join('subcatagory_infos','services.subcatagory_id','=','subcatagory_infos.id')
                            ->Join('catagory_infos','subcatagory_infos.catagory_id','=','catagory_infos.id')
                            ->get(['services.*','subcatagory_infos.subcatagory_name','catagory_infos.catagory_name']);
        return view('shop_admin.layout.service',compact('subcatagories','services'));
    }

    public function shop_service_add(Request $request){
        // dd($request->all());
        service::create([
            'shop_id' => $request->shop_id,
            'subcatagory_id' => $request->subcat_id,
            'service_name' => $request->service_name,
            's_description' => $request->s_description,
            'price' => $request->price,
            // 'sc_image' => $filename,
            's_status' => $request->s_status,
        ]);

        return back()->with('success','Service information have been successfully Added.');
    }

    public function shop_service_edit($id){
        $service = service::find($id);
        return response()->json([
            'status'=>200,
            'serv' => $service,
        ]);

    }

    public function shop_service_update(Request $request){
        // dd($request->all());
        service::find($request->shop_service_id)->update([
            'subcatagory_id' => $request->sub_cat_id,
            'service_name' => $request->u_service_name,
            's_description' => $request->u_s_description,
            'price' => $request->u_price,
            // 'sc_image' => $filename,
        ]);

        return back()->with('success','Sub Catagory information have been successfully Updated.');
    }

    public function shop_service_delete(Request $request){

        $del_service_id = $request->deletingId;
        $del_service_info = service::find($del_service_id);
        $del_service_info->delete();

        return back()->with('success','Service information have been successfully Deleted.');
    }


}

