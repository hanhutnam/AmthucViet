<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Pay;
use App\Models\Bill;
use App\Models\User;
use App\Models\Product;
use App\Models\Customer;
use App\Models\BillDetail;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function amthucviet()
    {
        $arr_restaurant_id = Restaurant::where('id_user',Auth::user()->id)->select('id')->get()->toArray();
        $qty_product = Product::whereIn('id_restaurant',$arr_restaurant_id)->count();
        $qty_restaurant = Restaurant::where('id_user',Auth::user()->id)->select('id')->get()->count();
        $bills = Bill::all();
        $qty_bill = BillDetail::Wherein('id_restaurant',$arr_restaurant_id)->select('id_bill')->groupByRaw('id_bill')->get()->count();
        $revenue_res = BillDetail::Wherein('id_restaurant',$arr_restaurant_id)->select('id_restaurant',BillDetail::raw('Sum(sum) as total'))->groupByRaw('id_restaurant')->get();
        $total_revenue = 0;
        foreach($revenue_res as $rr){
            $total_revenue += $rr->total ;
        }
       
        return view('admin.index',['qty_product'=>$qty_product,'qty_restaurant'=>$qty_restaurant,'qty_bill'=>$qty_bill,'total_revenue'=>$total_revenue]);
    }

    public function index()
    {
        $users = User::all()->sortBy('name');
        return view('admin.admin.listuser',['users'=>$users]);
    }

    public function report()
    {
        $retaurants = Restaurant::all();
        $users = User::all();
        $bill_details = BillDetail::all();
        $sums = BillDetail::select('id_restaurant', BillDetail::raw('SUM(sum) as total'))
                        ->groupBy('id_restaurant')
                        ->get();
        
        $sum = $sums->sortByDesc('total');

        return view('admin.admin.report',['sum'=>$sum,'retaurants'=>$retaurants,'users'=>$users,'bill_details'=>$bill_details]);
    }


    public function recharge()
    {
        $pays = Pay::all();
        $users = User::all();  
        $total =  Pay::select('order_info',Pay::raw('Sum(amount) as sum'))->groupByRaw('order_info')->get();
        // dd($total->sum);
        $total_pay = 0;
        // dd($revenue_res->total);
        foreach($total as $rr){
            // dd($rr->sum);
            $total_pay += $rr->sum ;
        }
        return view('admin.admin.report_recharge',['pays'=>$pays,'users'=>$users,'total_pay'=>$total_pay]);
    }


    public function menu($id)
    {
        $restaurant = Restaurant::Where('id_user',$id)->get();
        return view('admin.admin.menu',['restaurant'=>$restaurant]);
    }

    public function billReport($id)//id nhà hàng ->Where('status',1)
    {
        $tien = 0;
        $mang = BillDetail::Where('id_restaurant',$id)->select('id_bill')->groupByRaw('id_bill')->get()->toArray();
        $bill_details = BillDetail::Where('id_restaurant',$id)->get();
        $restaurants = Restaurant::all();
        $customers = Customer::all();
        $billdetails = BillDetail::all();
        $bills = Bill::all();

        $revenue_res = BillDetail::Where('id_restaurant',$id)->select('id_restaurant',BillDetail::raw('Sum(sum) as total'))->groupByRaw('id_restaurant')->get();
        $total_revenue = 0;
        // dd($revenue_res->total);
        foreach($revenue_res as $rr){
            $total_revenue += $rr->total ;
        }
        // dd($total_revenue);
        return view('admin.admin.billreport',['tien'=>$tien,'mang'=>$mang,'bill_details'=>$bill_details,'total_revenue'=>$total_revenue,
        'billdetails'=>$billdetails,'restaurants'=>$restaurants,'customers'=>$customers,'bills'=>$bills,'restaurant_id'=>$id]);
    }

}
