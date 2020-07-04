@extends('admin.layout')
@section('css')

@endsection

@section('nhahang')
active
@endsection

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Sửa thông tin nhà hàng</h1>
    
</div>

<div class="">
    <form action="{{route('update.restaurant',['id'=>$restaurant->id])}}" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <!-- tên nhà hàng  -->
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Tên nhà hàng: </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="name" placeholder="Tên nhà hàng" value="{{$restaurant->name}}">
            </div>
        </div>
        <!-- địa chỉ  -->
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Địa chỉ:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="address" placeholder="Địa chỉ" value="{{$restaurant->address}}">
            </div>
        </div>
        <!-- email  -->
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Email:</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" name="email" placeholder="Email" value="{{$restaurant->email}}">
            </div>
        </div>
        <!-- /sdt -->
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Số điện thoại:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="phone" placeholder="Số điện thoại" value="{{$restaurant->phone}}">
            </div>
        </div>
        <!-- dropdown khu vực -->
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Khu vực</label>
            <div class="col-sm-10">
                <select class="custom-select " name="area">
                @foreach($areas as $area)
                    <option value="{{$area->id}}" @if($restaurant->id_area == $area->id) selected @endif > {{$area->areaname}}</option>
                @endforeach 
                </select>
            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary my-1">Cập nhật</button>
        </div>

    </form>

</div>

@endsection

@section('js')

@endsection