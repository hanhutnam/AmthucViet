<?php

namespace App\Http\Controllers;

use Excel;
use App\Models\Bill;
use App\Models\User;
use App\Models\Product;
use App\Models\Customer;
use App\Models\BillDetail;
use App\Models\Restaurant;
use App\Exports\BillExport;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

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
        $mang = BillDetail::Where('id_restaurant',$id)->select('id_bill')->groupByRaw('id_bill')->get()->toArray();
        $bill_details = BillDetail::Where('id_restaurant',$id)->get();//john
        $restaurants = Restaurant::all();
        $customers = Customer::all();
        $billdetails = BillDetail::all();
        $bills = Bill::all();//john

        return view('admin.bill.list',['tien'=>$tien,'mang'=>$mang,'bill_details'=>$bill_details,'billdetails'=>$billdetails,'restaurants'=>$restaurants,'customers'=>$customers,'bills'=>$bills,'restaurant_id'=>$id]);
    }

    public function detail($nh, $id)
    {
        $id_bill = $id;
        $bill_details = BillDetail::Where('id_bill',$id)->where('id_restaurant',$nh)->get();
        $products = Product::all();
        return view('admin.bill.detail',['bill_details'=>$bill_details,'id_bill'=>$id_bill,'products'=>$products]);
    }

    
    public function status($nh,$id)
    {
        $dem =0;
        $bills = Bill::Where('id',$id)->update(['status' => 1]);
        $user = User::Where('id',Auth::user()->id)->first();
        
        $bill_details = BillDetail::where('id_bill',$id)->where('id_restaurant',$nh)->get();
//  dd($bill_details);
        foreach($bill_details as $bdt)
        if( ($bdt->sum*0.08) < $user->wallet )
        {
            $user->wallet = ($user->wallet - ($bdt->sum*0.08));
            $dem++;
        }
        else
        {
            $user->debt += ($bdt->sum*0.08) - $user->wallet;
            $user->wallet = 0;
        }   
        // dd($dem);
        $user->update();   
        return redirect()->back();
    }


    function export($id)
    {   
         return Excel::download(new BillExport($id),'bill.xlsx');
    }
}
