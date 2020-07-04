@extends('admin.layout')
@section('css')
<link href="https://sandbox.vnpayment.vn/paymentv2/lib/vnpay/vnpay.css" rel="stylesheet" />
@endsection

@section('thongtincanhan')
active
@endsection

@section('content')

<form action="{{route('pay.recharge')}}" method="POST">
    @csrf
    <div class="form-group row ">
        <label class="col-sm-2 col-form-label ">Số tiền muốn nạp: </label>
        <input type="number" value="" name="amount" placeholder=""> 
        <label class="col-sm-2 col-form-label ">VNĐ</label>
    </div>

    <div class="text-center">
        <input type="submit" class="btn btn-primary my-1" value="Nạp tiền">
    </div>
</form>

@endsection
@section('js')

<script src="https://sandbox.vnpayment.vn/paymentv2/lib/vnpay/vnpay.js"></script>
@endsection