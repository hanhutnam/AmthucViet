@extends('admin.admin.layout')


@section('chunhahang')
active
@endsection

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Chọn nhà hàng của bạn</h1>
    
</div>
<div class="container">
    <div class="content">
 
        @foreach($restaurant as $res)
        <a href="{{route('admin.billreport',['id'=>$res->id])}}"> {{$res->name}}</a> <br><br>
        @endforeach
    </div>
</div>
@endsection