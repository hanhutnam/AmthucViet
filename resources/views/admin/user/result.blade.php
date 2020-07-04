@extends('admin.layout')
@section('css')

@endsection
@section('content')

<div class="row" style="font-size: 25px">@if(Session::has('thongbao')){{Session::get('thongbao')}}@endif</div>
<br>
    <!-- <div class="form-group row center">
        <label class="col-sm-2 col-form-label ">Nạp tiền thành công! </label>       
    </div> -->
    <div class="text-center">
        <a href="{{route('user.index')}}"  class="btn btn-primary my-1">OK</a>
    </div>


@endsection
@section('js')

@endsection