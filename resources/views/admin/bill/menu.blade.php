@extends('admin.layout')
@section('css')

@endsection

@section('dondathang')
active
@endsection

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Chọn nhà hàng</h1>
    
</div>
<div class="container">
    <div class="content">
 
        @foreach($restaurant as $res)
        <a href="{{route('bill.index',['id'=>$res->id])}}"> {{$res->name}}</a> <br><br>
        @endforeach
    </div>
</div>
@endsection