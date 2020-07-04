<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;
use App\Models\Restaurant;
use App\Models\User;
use Auth;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants = Restaurant::where('id_user',Auth::user()->id)->get();
        $areas = Area::all();
        return view('admin.restaurant.list',['restaurants'=>$restaurants],['areas'=>$areas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $areas = Area::all();
        return view('admin.restaurant.create',['areas'=>$areas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $restaurant = new Restaurant();
        $restaurant->name = $req->name;
        $restaurant->address = $req->address;
        $restaurant->email = $req->email;
        $restaurant->phone = $req->phone;
        $restaurant->id_area = $req->area;
        $restaurant->id_user  = Auth::user()->id;
        $restaurant->save();
        return redirect()->back();
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
        $restaurant = Restaurant::findOrFail($id);
        $areas = Area::all();
        return view('admin.restaurant.update',['restaurant'=>$restaurant,'areas'=>$areas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        $restaurant = Restaurant::findOrFail($id);
        $restaurant->name = $req->name;
        $restaurant->address = $req->address;
        $restaurant->email = $req->email;
        $restaurant->phone = $req->phone;
        $restaurant->id_area = $req->area;
        $restaurant->id_user  = Auth::user()->id;
        $restaurant->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $restaurant = Restaurant::findOrFail($id);
        $restaurant->delete();
        return redirect()->back();
    }
}
