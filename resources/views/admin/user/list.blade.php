@extends('admin.layout')
@section('css')
<link href="https://sandbox.vnpayment.vn/paymentv2/lib/vnpay/vnpay.css" rel="stylesheet"/>
@endsection

@section('thongtincanhan')
active
@endsection

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Thông tin cá nhân</h1>
</div>
<div class="row" style="font-size: 25px">@if(Session::has('thongbao')){{Session::get('thongbao')}}@endif</div>
<br>
<div class="">
    <form class="">
        <!-- tên nhà hàng  -->
        <div class="form-group row ">
            <label class="col-sm-2 col-form-label ">Họ và tên: </label>
            <div class="col-sm-10 col-form-label">
                {{$user->name}}
            </div>
        </div>
        <!-- email  -->
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Email:</label>
            <div class="col-sm-10 col-form-label">
                {{$user->email}}
            </div>
        </div>
        <!-- địa chỉ  -->
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Ví tiền:</label>
            <div class="col-sm-10 col-form-label">
                {{$user->wallet}} VNĐ
            </div>
        </div>
        <!-- địa chỉ  -->
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Tiền nợ:</label>
            <div class="col-sm-10 col-form-label">
                {{$user->debt}} VNĐ
            </div>
        </div>
        <div class="text-center">
            <div class="row">
                <div class="col-3"></div>
                <div class="col-3">
                    <a  href="{{route('pay.index')}}" id="" class="btn btn-primary my-1">Nạp tiền</a>
                </div>
                <div class="col-3">
                    <a href="{{route('user.edit',['id'=>$user->id])}}" class="btn btn-primary my-1">Chỉnh sửa</a>
                </div>
            </div>


        </div>

    </form>

</div>

@endsection

@section('js')

<script src="https://sandbox.vnpayment.vn/paymentv2/lib/vnpay/vnpay.js"></script>
@endsection