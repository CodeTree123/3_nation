<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\branch;
use App\Models\catagory_info;
use App\Models\subcatagory_info;
use App\Models\product;
use App\Models\order;
use App\Models\suborder;
use File;
use Image;

class AdminController extends Controller
{
// Branch
    public function branch(){
        $branchs = branch::all();
        return view('admin.layout.branch',compact('branchs'));
    }

    public function branch_status($id){
        $getStatus = branch::find($id);
        // dd($getStatus);
        if($getStatus->branch_status == 1){
            $status = 0;
        }else{
            $status = 1;
        }
        if($status == 1){
            branch::where('id','=',$id)->update(['branch_status'=>$status]);
        }else{
            branch::where('id','=',$id)->update(['branch_status'=>$status]);
        }
        return back();
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

    public function catagory_status($id){
        $getStatus = catagory_info::find($id);
        // dd($getStatus);
        if($getStatus->catstatus == 1){
            $status = 0;
        }else{
            $status = 1;
        }
        if($status == 1){
            catagory_info::where('id','=',$id)->update(['catstatus'=>$status]);
        }else{
            catagory_info::where('id','=',$id)->update(['catstatus'=>$status]);
        }
        return back();
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

    public function sub_catagory_status($id){
        $getStatus = subcatagory_info::find($id);
        // dd($getStatus);
        if($getStatus->subcatstatus == 1){
            $status = 0;
        }else{
            $status = 1;
        }
        if($status == 1){
            subcatagory_info::where('id','=',$id)->update(['subcatstatus'=>$status]);
        }else{
            subcatagory_info::where('id','=',$id)->update(['subcatstatus'=>$status]);
        }
        return back();
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
        $all_id = subcatagory_info::Join('catagory_infos','subcatagory_infos.cat_id','=','catagory_infos.id')->Join('branches','catagory_infos.branch_id','=','branches.id')->where('subcatagory_infos.id',$request->subcat_id)->first(['subcatagory_infos.cat_id','catagory_infos.branch_id']);
            //    dd($request->all(),$all_id);
        $filename='';
        $filename1='';
        $filename_others[]='';
        if($request->hasFile('product_image'))
        {
            $file= $request->file('product_image');
            if ($file->isValid()) {
                $filename="product".date('Ymdhms').'.'.$file->getClientOriginalExtension();
                Image::make($file->getRealPath())->resize(1075, 1500)->save(base_path("public/uploads/product/" . $filename), 100);
//                $file->storeAs('product',$filename);
            }
        }

        if($request->hasFile('product_image1'))
        {
            $file1= $request->file('product_image1');
            if ($file1->isValid()) {
                $filename1="product".date('Ymdhms').rand(1,100).'.'.$file1->getClientOriginalExtension();
                Image::make($file1->getRealPath())->resize(1075, 1500)->save(base_path("public/uploads/product/" . $filename1), 100);
//                $file->storeAs('product',$filename);
            }
        }

        if($request->hasFile('images'))
        {
            $file_others= $request->file('images');
            // dd("hello",$file_others);
            foreach($file_others as $file_other){
                if ($file_other->isValid()) {
                    $filename_other="other_pro".date('Ymdhms').rand(1,100).'.'.$file_other->getClientOriginalExtension();
                    Image::make($file_other->getRealPath())->resize(1075, 1500)->save(base_path("public/uploads/product/" . $filename_other), 100);
                    $filename_others[] = $filename_other;
    //                $file->storeAs('product',$filename);
                }
            }
        }
        if($filename_others[0] == null){
            $test = array_shift($filename_others);
        }
        $filename_others = implode(',',$filename_others);

        product::create([
            'p_branch_id' => $all_id->branch_id,
            'p_cat_id' => $all_id->cat_id,
            'subcat_id' => $request->subcat_id,
            'product_code' => $request->product_code,
            'product_name' => $request->product_name,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'stock_limit' => $request->alert_quantity,
            'color' => $request->color,
            'size' => $request->size,
            'm_image' => $filename,
            'h_image' => $filename1,
            'other_images' => $filename_others,
            'prostatus' => $request->p_status,
        ]);
        session()->flash('success', 'Product is Added to Cart Successfully !');
        return back();
    }

    public function product_edit($id){
        $product = product::find($id);
        return response()->json([
            'status'=>200,
            'pro' => $product,
        ]);

    }

    public function product_update(Request $request){
//         dd($request->all());
        // dd($request->images);
//        $validator = $request->validate([
//            'images'=> 'array|max:5',
//        ]);
//        if($validator->fails()){
//            return back()->with('fail','Maximum 4 Images Are Allowed.');
//        }

        $pro_id = product::find($request->product_id);
        $filename=$pro_id->m_image;
        $filename1=$pro_id->h_image;
        $filename_others[]='';
        if($request->hasFile('product_image'))
        {
            $destination = 'uploads/product/'.$pro_id->m_image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file= $request->file('product_image');
            if ($file->isValid()) {
                $filename="product".date('Ymdhms').'.'.$file->getClientOriginalExtension();
                Image::make($file->getRealPath())->resize(1075, 1500)->save(base_path("public/uploads/product/" . $filename), 100);
            }
        }

        if($request->hasFile('product_image1'))
        {
            $destination = 'uploads/product/'.$pro_id->h_image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file1= $request->file('product_image1');
            if ($file1->isValid()) {
                $filename1="product".date('Ymdhms').rand(1,100).'.'.$file1->getClientOriginalExtension();
                Image::make($file1->getRealPath())->resize(1075, 1500)->save(base_path("public/uploads/product/" . $filename1), 100);
//                $file->storeAs('product',$filename);
            }
        }

        if($request->hasFile('images'))
        {
            $others = $pro_id->other_images;
            $others = explode(',',$others);
            // dd($others);
            foreach($others as $other){
                $destination = 'uploads/product/'.$other;
                if(File::exists($destination)){
                    File::delete($destination);
                }
            }

            $file_others= $request->file('images');
            // dd("hello",$file_others);
            foreach($file_others as $file_other){
                if ($file_other->isValid()) {
                    $filename_other="other_pro".date('Ymdhms').rand(1,100).'.'.$file_other->getClientOriginalExtension();
                    Image::make($file_other->getRealPath())->resize(1075, 1500)->save(base_path("public/uploads/product/" . $filename_other), 100);
                    $filename_others[] = $filename_other;
    //                $file->storeAs('product',$filename);
                }
            }
        }

        if($filename_others[0] == null){
            $test = array_shift($filename_others);
        }
        $filename_others = implode(',',$filename_others);

        product::find($request->product_id)->update([
            'subcat_id' => $request->u_sub_cat_id,
            'product_code' => $request->u_product_code,
            'product_name' => $request->u_product_name,
            'description' => $request->u_description,
            'price' => $request->u_price,
            'quantity' => $request->u_quantity,
            'stock_limit' => $request->u_alert_quantity,
            'color' => $request->u_color,
            'size' => $request->u_size,
            'm_image' => $filename,
            'h_image' => $filename1,
            'other_images' => $filename_others,
        ]);

        return back()->with('success','Product information have been successfully Updated.');
    }

    public function product_delete(Request $request){

        $pro_id = product::find($request->deletingId);
        $destination = 'uploads/product/'.$pro_id->m_image;
        if(File::exists($destination)){
            File::delete($destination);
        }

        $destination1 = 'uploads/product/'.$pro_id->h_image;
        if(File::exists($destination1)){
            File::delete($destination1);
        }
        $others = $pro_id->other_images;
        $others = explode(',',$others);
        // dd($others);
        foreach($others as $other){
            $destination = 'uploads/product/'.$other;
            if(File::exists($destination)){
                File::delete($destination);
            }
        }

        $del_product_info = product::find($request->deletingId);
        $del_product_info->delete();

        return back()->with('success','Product information have been successfully Deleted.');
    }

    public function product_status($id){
        $getStatus = product::find($id);
        // dd($getStatus);
        if($getStatus->prostatus == 1){
            $status = 0;
        }else{
            $status = 1;
        }
        if($status == 1){
            product::where('id','=',$id)->update(['prostatus'=>$status]);
        }else{
            product::where('id','=',$id)->update(['prostatus'=>$status]);
        }
        return back();
    }


    public function add_product_stock(Request $request){
        $pro = product::find($request->pro_id);
        $previous_stock = $pro->quantity;
        $new_stock = $previous_stock + $request->stock;
        $pro->quantity = $new_stock;
        $pro->new_stock = $request->stock;
        $pro->update();
        return back()->with('success','Product Stock have been successfully Deleted.');
    }

    public function product_img($id){
        $pro = product::where('id','=',$id)->first();
        $images = $pro->m_image.','.$pro->h_image.','.$pro->other_images;
        $images = explode(',',$images);
        return response()->json([
            'status'=>200,
            'all_image' => $images,
        ]);
    }
    
    public function product_description($id){
        $des = product::where('id','=',$id)->first()->description;
        return response()->json([
            'status'=>200,
            'des' => $des,
        ]);
    }

    public function order_list(){
        $orders = order::Join('users','orders.user_id','=','users.id')->get(['orders.*','users.first_name','users.last_name','users.email','users.phone']);
        // dd($orders);
        return view('admin.layout.order',compact('orders'));
    }

    public function order_view($id){
        $order = suborder::where('order_id','=',$id)->get();
        $order_total = order::where('id','=',$id)->first()->total_price;
        $subtotal = $order->sum('sub_total');
        $vat = round($order_total - $subtotal,2);
        // dd($order_total,$subtotal,$vat);
        return response()->json([
            'status'=>200,
            'order' => $order,
            'order_total' => $order_total,
            'subtotal' => $subtotal,
            'vat' => $vat,
        ]);
    }

    public function ordre_status($id){

        $getStatus = order::find($id);
        // dd($getStatus);
        if($getStatus->order_status == 1){
            $status = 0;
        }else{
            $status = 1;
        }
        if($status == 1){
            order::where('id','=',$id)->update(['order_status'=>$status]);
        }else{
            order::where('id','=',$id)->update(['order_status'=>$status]);
        }
        return back();
    }
    public function order_delete(Request $request){
        $order_id = order::find($request->deletingId);
        $order_id->delete();
        
        $suborder = suborder::where('order_id',$request->deletingId);
        $suborder->delete();
        return back()->with('success','Order have been successfully Deleted.');
    }

}

