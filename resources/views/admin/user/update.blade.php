@extends('admin.layout')
@section('css')

@endsection

@section('thongtincanhan')
active
@endsection

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Sửa thông tin cá nhân</h1>
    
</div>

<div class="">
    <form action="{{route('user.update',['id'=>1])}}" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <!-- tên nhà hàng  -->
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Họ và tên: </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="name" value="{{$user->name}}">
            </div>
        </div>
        <!-- địa chỉ  -->
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Email:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="email"  value="{{$user->email}}">
            </div>
        </div>
        <!-- địa chỉ  -->
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Ví tiền:</label>
            <div class="col-sm-10">
                {{$user->wallet}} VNĐ
            </div>
        </div>
        <!-- địa chỉ  -->
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Tiền nợ:</label>
            <div class="col-sm-10">
                {{$user->debt}} VNĐ 
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