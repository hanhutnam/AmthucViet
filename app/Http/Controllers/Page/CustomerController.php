<?php

namespace App\Http\Controllers\Page;

use Cart;
use App\Models\Area;
use App\Models\Slide;
use App\Models\Product;
use App\Models\Restaurant;
use App\Models\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants = Restaurant::all();
        $product_new = Product::Where('new_product',1)->paginate(12);
        $product_promotion = Product::Where('promotion_price','<>',0)->get();//->paginate(12);
        $slides = Slide::all();
        return view('page.index',['slides'=>$slides, 'product_new'=>$product_new, 'product_promotion'=>$product_promotion,'restaurants'=>$restaurants]);
    }

    public function getArea($id){
        $areas = Area::findOrFail($id);
        $area_res = Restaurant::where('id_area',$areas->id)->get();
        $area_no_res = Restaurant::where('id_area','<>',$areas->id)->get();
        $products = Product::all();
        $khuvuc = area::all();
        return view('page.area',['areas'=>$areas,'area_res'=>$area_res,'area_no_res'=>$area_no_res,'products'=>$products,'khuvuc'=>$khuvuc]);
    }

    public function getProductType($id){
        $sp_theoloai = Product::where('id_product_type',$id)->get();
        $sp_khac = Product::where('id_product_type','<>',$id)->paginate(4);
        $loai = ProductType::all();
        $loap_sp = ProductType::where('id',$id)->first();
        $restaurants = Restaurant::all();
        $products = Product::all();
    	return view('page.data',compact('sp_theoloai','sp_khac','loai','loap_sp','restaurants','products'));
    }

    public function getDetail(Request $req){
        $sanpham = Product::findOrFail($req->id);
        $sp_tuongtu = Product::where('id_product_type',$sanpham->id_product_type)->paginate(6);
        $nhahang = Restaurant::findOrFail($sanpham->id_restaurant);
    	return view('page.detail',compact('sanpham','sp_tuongtu','nhahang'));
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function searchRetaurents(Request $request)
    {
        $retaurents = Restaurant::where('id_area',$request->area_id)->get()->toArray();
        // Log::debug($retaurents);
        return response()->json($retaurents);
      
    }

    public function searchProducts(Request $request)
    {
        $products = Product::where('id_restaurant',$request->restaurant_id)->get()->toArray();
        // Log::debug($products);
        return response()->json($products);
      
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getSearch(Request $request)
    {
        $restaurants = Restaurant::all();

        $area_id = $request->areaname;
        $restaurant_id = $request->restaurant;
        $product_id = $request->product;

        if($area_id == 0)
        {
            $products = Product::paginate(20);
            return view('page.search',['products'=>$products,'restaurants'=>$restaurants]);
        }

        if($restaurant_id == 0){
            $arr_restaurant_id = Restaurant::where('id_area',$area_id)->select('id')->get()->toArray();

            $products = Product::whereIn('id_restaurant',$arr_restaurant_id)->paginate(20);

            return view('page.search',['products'=>$products,'restaurants'=>$restaurants]);
        }
        
        if($product_id == 0){
            $products = Product::where('id_restaurant',$restaurant_id)->paginate(20);

            return view('page.search',['products'=>$products,'restaurants'=>$restaurants]);
        }

        $products = Product::where('id',$product_id)->paginate(20);

        return view('page.search',['products'=>$products,'restaurants'=>$restaurants]);
    }

}


// if (data) {
//     $("#importByTable").empty();
//     $.each(data, function(key, value) {
//         $("#importByTable").append('<div class="form-group">' +
//             '<label> Loại câu hỏi: ' + value['type'] + ' (Số câu hỏi có trong ngân hàng câu hỏi: ' + value['total_question'] + ') </label>' +
//             '<input type="number" name="' + value['key'] +'" class="form-control" max="'+value['total_question']+'"> </div>');
//     });
// }