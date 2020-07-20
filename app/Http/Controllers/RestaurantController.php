<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;
use App\Models\Restaurant;
use App\Models\User;
use Auth;

class RestaurantController extends Controller
{

    public function index()
    {
        $restaurants = Restaurant::where('id_user',Auth::user()->id)->get();
        $areas = Area::all();
        return view('admin.restaurant.list',['restaurants'=>$restaurants],['areas'=>$areas]);
    }

    public function create()
    {
        $areas = Area::all();
        return view('admin.restaurant.create',['areas'=>$areas]);
    }


    public function store(Request $req)
    {
        $res = Restaurant::all();
        foreach($res as $r)
        {
            if( $req->email == $r->email)
            {
                return redirect()->back()->with('error', 'Email đã tồn tại!');
            }
        }
        
        $restaurant = new Restaurant();
        $restaurant->name = $req->name;
        $restaurant->address = $req->address;
        $restaurant->email = $req->email;
        $restaurant->phone = $req->phone;
        $restaurant->id_area = $req->area;
        $restaurant->id_user  = Auth::user()->id;
        $restaurant->save();
        return redirect()->route('list.restaurant')->with('success', 'Tạo mới thành công!');
    }

    public function edit($id)
    {
        $restaurant = Restaurant::findOrFail($id);
        $areas = Area::all();
        return view('admin.restaurant.update',['restaurant'=>$restaurant,'areas'=>$areas]);
    }

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
        return redirect()->route('list.restaurant')->with('success', 'Cập nhật thành công!');
    }

    public function destroy($id)
    {
        $restaurant = Restaurant::findOrFail($id);
        $restaurant->delete();
        return redirect()->route('list.restaurant')->with('success', 'Xóa thành công!');
    }
}
