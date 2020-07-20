<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','Page\CustomerController@index');    

Route::get('/trang-chu','Page\CustomerController@index')->name('page.trangchu');

Route::get('/khu-vuc/{id}','Page\CustomerController@getArea')->name('page.area');

Route::get('/loai-san-pham/{id}','Page\CustomerController@getProductType')->name('page.product_type');

Route::get('/chi-tiet-san-pham/{id}','Page\CustomerController@getDetail')->name('page.detail');

Route::get('mua-hang/{id}','Page\CartController@muahang')->name('page.buy');

Route::get('gio-hang','Page\CartController@giohang')->name('page.cart');

Route::get('xoa-san-pham/{id}','Page\CartController@xoasp')->name('page.delete');

Route::get('cap-nhat','Page\CartController@capnhat');

Route::get('dat-hang','Page\CartController@getCheckout')->name('page.order');

Route::post('dat-hang','Page\CartController@postCheckout')->name('page.order');

Route::get('login','LoginController@loginview')->name('user.login');

Route::post('login','LoginController@login')->name('user.login');

Route::get('register','LoginController@signup')->name('user.register');

Route::post('register','LoginController@register')->name('user.register');

Route::get('logout','LoginController@logout')->name('user.logout');

Route::get('changepassword','LoginController@getchange')->name('user.change');

Route::post('changepassword','LoginController@postchange')->name('user.change');

Route::get('/search/key', 'Page\CustomerController@searchName')->name('searching');      //search tên

Route::post('search/retaurent', 'Page\CustomerController@searchRetaurents')->name('search.retaurent');

Route::post('search/product', 'Page\CustomerController@searchProducts')->name('search.product');

Route::get('search', 'Page\CustomerController@getSearch')->name('search');

Route::get('contact','Page\CustomerController@contact')->name('page.getcontact');

Route::post('contact','Page\CustomerController@postcontact')->name('page.postcontact');

// Route::group(['prefix' => 'page'], function () {

    

// });


















Route::get('admin/listuser', 'AdminController@index')->name('admin.listuser');

Route::get('admin/report', 'AdminController@report')->name('report');

Route::get('admin/report_recharge', 'AdminController@recharge')->name('report.recharge');

Route::get('admin/menu-res/{id}','AdminController@menu')->name('admin.menu');//id chủ nhà hàng

Route::get('admin/bill-report/{id}','AdminController@billReport')->name('admin.billreport');//id nhà hàng

Route::get('admin/forgetpassword','LoginController@getforgetpassword')->name('user.forgetpass');//quên mật khẩu    

Route::get('admin/forgetpassword','LoginController@getsendmail')->name('sendtomail');//giao dien nhap email

Route::post('admin/forgetpassword','LoginController@postsendmail')->name('sendmail');//gui email

Route::get('admin/changepassword/{token}','LoginController@getforgetpassword')->name('getnewPass');

Route::post('admin/changepassword/{token}','LoginController@postpassword')->name('postnewPass');//tao moi mat khau

 Route::group(['middleware'=>'adminmiddleware'],function(){
    
    Route::get('/admin', function () {
        return view('admin.index');
    });

    Route::get('/admin', 'AdminController@amthucviet')->name('amthucviet');

    Route::group(['prefix' => 'admin'], function () {
        Route::group(['prefix'=>'restaurant'], function (){
            Route::get('index', 'RestaurantController@index')->name('list.restaurant');

            Route::get('create','RestaurantController@create')->name('create.restaurant');

            Route::post('store','RestaurantController@store')->name('store.restaurant');

            Route::get('edit/{id}','RestaurantController@edit')->name('edit.restaurant');

            Route::post('update/{id}','RestaurantController@update')->name('update.restaurant');

            Route::get('delete/{id}','RestaurantController@destroy')->name('delete.restaurant');
        });
    

        Route::group(['prefix'=>'user'], function(){
            Route::get('index','UserController@index')->name('user.index');

            Route::get('edit/{id}','UserController@edit')->name('user.edit');

            Route::post('update/{id}','UserController@update')->name('user.update');
            //thanh toán
            Route::get('naptien','PayController@index')->name('pay.index');

            Route::post('naptien','PayController@recharge')->name('pay.recharge');

            Route::get('ketqua','PayController@result')->name('pay.result');

            
        });

        Route::group(['prefix'=>'product'], function (){
            Route::get('menu/{id}','ProductController@menu')->name('product.menu');//id của chủ nhà hàng

            Route::get('index/{id}', 'ProductController@index')->name('product.index');//id của nhà hàng

            Route::get('create/{id}','ProductController@create')->name('product.create');//id của nhà hàng

            Route::post('store/{id}','ProductController@store')->name('product.store');//id của nhà hàng

            Route::get('edit/{id}','ProductController@edit')->name('product.edit');//id sản phẩm

            Route::post('update/{id}','ProductController@update')->name('product.update');//id sản phẩm

            Route::get('delete/{id}','ProductController@destroy')->name('product.delete');//id sản phẩm
        });

        Route::group(['prefix'=>'bill'], function(){
            Route::get('menu/{id}','BillController@menu')->name('bill.menu');//id chủ nhà hàng

            Route::get('index/{id}', 'BillController@index')->name('bill.index');//id của nhà hàng

            Route::get('detail/{nh}/{id}', 'BillController@detail')->name('bill.detail');//nh id cua nha hang //id của hóa đơn

            Route::get('status/{nh}/{id}', 'BillController@status')->name('bill.status');//id của hóa đơn

            Route::get('export/{id}', 'BillController@export')->name('export');
        });

        Route::group(['prefix'=>'admin'], function(){
            
        });
    });

 });

