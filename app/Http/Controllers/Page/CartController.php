<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Restaurant;
use App\Models\Area;
use App\Models\ProductType;
use App\Models\Customer;
use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\User;
use Cart;
use Mail;
use App\Mail\TestMails;
// use Illuminate\Support\Collection;

class CartController extends Controller
{

    public function muahang($id){
        $product_buy = Product::findOrFail($id);
        if($product_buy->promotion_price == 0) 
            $price = $product_buy->unit_price ;
        else 
            $price = $product_buy->promotion_price;
        Cart::add(array(
            'id' => $id, // inique row ID
            'name' => $product_buy->name,
            'price' => $price ,
            'quantity' => 1,
            'attributes' => array(
                'img' => $product_buy->link_img,
                'id_res' => $product_buy->id_restaurant,
            )
        ));
        $content = Cart::getContent();
        //dd($content);
        return redirect()->back();
    }


    public function giohang(){
        $content = Cart::getContent();
        $total = Cart::getTotal();
        return view('page.cart',['content'=>$content,'total'=>$total]);
    }


    public function xoasp($id)
    {
        Cart::remove($id);
        return redirect()->back();
    }

    public function capnhat(Request $request)
    {
        Cart::update($request->id, array(
            'quantity' => array(
                'relative' => false,
                'value' => $request->quantity
            ),
        ));
        
    }

    public function getCheckout(){
        $carts = Cart::getContent();
        $total = Cart::getTotal();
        return view('page.order',['carts'=>$carts,'total'=>$total]);
    }


    public function postCheckout(Request $req){

        $carts = Cart::getContent();
        $total = Cart::getTotal();

        $customer = new Customer;
        $customer->name = $req->name;
        $customer->gender = $req->gender;
        $customer->email = $req->email;
        $customer->address = $req->address;
        $customer->phone = $req->phone;
        $customer->save();

        $bill = new Bill;
        $bill->order_date = date('Y-m-d H:i:s');
        $bill->total_price = Cart::getTotal();
        $bill->id_customer = $customer->id;
        $bill->save();

        foreach ($carts as $cart) {
            $product = Product::findOrFail($cart->id);
            $restaurant = Restaurant::findOrFail($product->id_restaurant);
                     

            $BillDetail = new BillDetail;
            $BillDetail->qty = $cart->quantity;
            $BillDetail->unit_price = $cart->price;
            $BillDetail->sum = $cart->price*$cart->quantity;
            $BillDetail->id_bill= $bill->id;
            $BillDetail->id_product = $cart->id;
            $BillDetail->id_restaurant = $restaurant->id;
            $BillDetail->save();

            $user = User::findOrFail($restaurant->id_user);

            // if( ($cart->quantity*$cart->price*0.08) < $user->wallet )
            //     $user->wallet = ($user->wallet - ($cart->quantity*$cart->price*0.08));
            // else
            // {
            //     $user->debt += ($cart->quantity*$cart->price*0.08) - $user->wallet;
            //     $user->wallet = 0;
            // }   
            // $user->update();      
            
        }
        $customer = $req->name;
        Mail::to($req->email)->send(new TestMails($carts,$total,$customer));

        Cart::clear();
        return redirect()->back()->with('thongbao','Đặt hàng thành công');

    }

}