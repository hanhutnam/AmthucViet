<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\ProductType;
use App\Models\Restaurant;

class ProductController extends Controller
{
    public function menu($id)
    {
        $restaurant = Restaurant::Where('id_user',$id)->get();
        return view('admin.product.menu',['restaurant'=>$restaurant]);
    }
 
    public function index($id)
    {
        $restaurants = Restaurant::all();
        $producttypes = ProductType::all();
        $product = Product::Where('id_restaurant',$id)->get();
        return view('admin.product.list',['restaurants'=>$restaurants,'producttypes'=>$producttypes,'product'=>$product,'restaurant_id'=>$id]);
    }
 
    public function create($id)
    {
        $producttypes = ProductType::all();
        return view('admin.product.create',['producttypes'=>$producttypes,'restaurant_id'=>$id]);
    }

 
    public function store(Request $req, $id)
    {
        $product = new Product();
        $product->name = $req->name;
        $product->describe = $req->describe;
        $product->link_img = $req->link_img;
        $product->unit_price = $req->unit_price;
        $product->promotion_price = $req->promotion_price;
        $product->id_product_type = $req->id_product_type;
        $product->id_restaurant  = $id;
        //new_product
        $check_new_product = $req['new_product'];
        if($check_new_product==='yes')
            $product->new_product = 1;
        else 
            $product->new_product = 0;
        //active
        $check_active = $req['active'];
        if($check_active==='yes')
            $product->active = 1;
        else 
            $product->active = 0;
        $product->save();
        return redirect()->route('product.index',['id'=>$id])->with('success', 'Thêm món ăn thành công!');
    }



    public function edit($id)
    {
        $products = Product::findOrFail($id);
        $product_types = ProductType::all();
        return view('admin.product.update',['products'=>$products,'product_types'=>$product_types]);
    }


    public function update(Request $req, $id)
    {
        $product = Product::findOrFail($id);
        $product->name = $req->name;
        $product->describe = $req->describe;
        $product->unit_price = $req->unit_price;
        $product->promotion_price = $req->promotion_price;
        $product->link_img = $req->link_img;
        $product->id_product_type  = $req->id_product_type;
        $product->id_restaurant = $product->id_restaurant;
        //new_product
        $product->new_product = $req->new_product;
        //active
        $product->active = $req->active;
        $product->save();
        return redirect()->route('product.index',['id'=>$product->id_restaurant])->with('success', 'Cập nhật thành công!');
    }


    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->back()->with('success', 'Xóa thành công!');
    }
}