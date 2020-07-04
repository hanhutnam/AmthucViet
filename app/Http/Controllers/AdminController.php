<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pay;
use App\Models\Restaurant;
use App\Models\BillDetail;
use App\Models\Bill;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function amthucviet()
    {
        return view('admin.index');
    }

    public function index()
    {
        $users = User::all()->sortBy('name');
        return view('admin.admin.listuser',['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function report()
    {
        $retaurants = Restaurant::all();
        $users = User::all();
        $bill_details = BillDetail::all();
        $sums = BillDetail::select('id_restaurant', BillDetail::raw('SUM(sum) as total'))
                        ->groupBy('id_restaurant')
                        ->get();
        
        $sum = $sums->sortByDesc('total');

        // $john = $sum::john('retaurant','sum.id_restaurant','=','retaurant.id');
        //  dd($john);
        return view('admin.admin.report',['sum'=>$sum,'retaurants'=>$retaurants,'users'=>$users,'bill_details'=>$bill_details]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function recharge()
    {
        $pays = Pay::all();
        $users = User::all();
        return view('admin.admin.report_recharge',['pays'=>$pays,'users'=>$users]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
