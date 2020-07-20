<?php

namespace App\Http\Controllers;

use App\Models\Pay;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class PayController extends Controller
{
    public function index()
    {
        return view('admin.user.recharge');
    }

    public function recharge(Request $request)
    {

        $vnp_TmnCode = "P6RACWIN"; //Mã website tại VNPAY 
        $vnp_HashSecret = "AKQSYBPEINFLADTYPAGANOBXQRCPVUUK"; //Chuỗi bí mật

        $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://localhost/amthucviet/admin/user/ketqua";
        $vnp_TxnRef = date("YmdHis"); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = "Nạp tiền";
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $request->amount*100;//số tiền
        $vnp_Locale = 'vn';
        $vnp_IpAddr = request()->ip();

        $inputData = array(
            "vnp_Version" => "2.0.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );
        
        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
            
        }
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . $key . "=" . $value;
            } else {
                $hashdata .= $key . "=" . $value;
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }
        // dd($inputData);
        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
           // $vnpSecureHash = md5($vnp_HashSecret . $hashdata);
            $vnpSecureHash = hash('sha256', $vnp_HashSecret . $hashdata);
            $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
        }
        
        return redirect($vnp_Url);
    }



    public function result(Request $request)
{
    $user = User::find(Auth::user()->id);
    if($request->vnp_ResponseCode == "00"){
        Pay::firstOrCreate([
            'user_id'=>$user->id ,
            'deal_code'=>$request->vnp_TxnRef,
            ],[            
            'amount'=>$request->vnp_Amount/100,
            'bank_code'=>$request->vnp_BankCode,
            'card_type'=>$request->vnp_CardType,
            'order_info'=>$request->vnp_OrderInfo
        ]);
                
        $price = $user->wallet + ($request->vnp_Amount/100) - $user->debt;
        if($price < 0){
            $user->wallet = 0;
            $user->debt = $price;
        }else{
            $user->wallet = $price;
            $user->debt = 0;
        }
        $user->save();
        return redirect()->route('user.index')->with('success' ,'Nạp tiền thành công!');
    }
    return redirect()->route('user.index')->with('error' ,'Lỗi!');
    }
}