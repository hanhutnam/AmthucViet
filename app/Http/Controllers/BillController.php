<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Support\Arr;

class BillController extends Controller
{

    public function menu($id)
    {
        $restaurant = Restaurant::Where('id_user',$id)->get();
        return view('admin.bill.menu',['restaurant'=>$restaurant]);
    }
    
    public function index($id)
    {
        $tien = 0;
        $bill_details = BillDetail::Where('id_restaurant',$id)->get();
        // dd($bill_details);
        foreach($bill_details as $bdt){
            $array[] = Arr::add(['name'=>'mabill'],'id_bill',$bdt->id_bill);
            
         }
         $mang = array_unique($array,0);
        $restaurants = Restaurant::all();
        $customers = Customer::all();
        $billdetails = BillDetail::all();
        $bills = Bill::all();
        return view('admin.bill.list',['tien'=>$tien,'mang'=>$mang,'bill_details'=>$bill_details,'billdetails'=>$billdetails,'restaurants'=>$restaurants,'customers'=>$customers,'bills'=>$bills,'restaurant_id'=>$id]);
    }


    public function detail($id)
    {
        $id_bill = $id;
        $bill_details = BillDetail::Where('id_bill',$id)->get();
        $products = Product::all();
        return view('admin.bill.detail',['bill_details'=>$bill_details,'id_bill'=>$id_bill,'products'=>$products]);
    }

    
    public function status($id)
    {
        $bills = Bill::Where('id',$id)->update(['status' => 1]);;
        return redirect()->back();
    }

}
