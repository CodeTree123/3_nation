<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\product;
use App\Models\suborder;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;


class CartController extends Controller
{
    public function addtocart($id){
        $product=product::find($id);
        $cart=Cart::add([
            'id' => $id,
            'name' => $product->product_name,
            'qty' => 1,
            'price' => $product->price,
            'weight' => 0,
            'options' => ['image' => $product->m_image,]
        ]);
        return redirect()->back()->with('suceess','Product Added to the Cart');
    }

    public function updatecart(Request $request)
    {
        foreach($request->row_ids as $key1=>$row){
            foreach ($request->qties as $key2=>$qty){
                if($key1 == $key2){
                    Cart::update($row, $qty);
//                    dd($request->all(),$row,$qty);
                }
            }
        }
//        Cart::remove($rowId);
        return redirect()->back()->with('suceess','Updated the Cart product');
    }

    public function cartdelete($rowId)
    {
        Cart::remove($rowId);
        return redirect()->back()->with('suceess','product Removed From the Cart');
    }
    public function checkout(Request $request)
    {

        $carts=Cart::content();

        $cart_count = Cart::count();
//        $subtotal=Cart::SubTotal();
        $total=Cart::Total();

    //    dd($request->all(),$total,$cart_count);

        $order=order::create([
            'user_id'=>auth()->user()->id,
            'address'=>$request->address_1,
            'notes'=>$request->order_note,
            'total_items'=>$cart_count,
            'total_price'=>$total,
        ]);
//        dd($order);
        foreach ($carts as $cart) {
            $suborder=suborder::create([
                'user_id'=>auth()->user()->id,
                'order_id'=>$order->id,
                'product_id'=>$cart->id,
                'product_name'=>$cart->name,
                'image'=>$cart->options->image,
                'order_quantity'=>$cart->qty,
                'sub_total'=>$cart->subtotal,

            ]);
        }

        Cart::destroy();
        return redirect()->route('index')->with('massage','order has been placed');
    }
}
