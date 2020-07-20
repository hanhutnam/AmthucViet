@extends('admin.layout')
@section('css')

@endsection

@section('nhahang')
active
@endsection

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tạo mới nhà hàng</h1>
</div>
<div>
    @if (session('error'))
    <div class="alert alert-danger " role="alert">
        {{ session('error') }}
    </div>
    @endif
</div>
<div class="">
    <form action="{{route('store.restaurant')}}" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <!-- tên nhà hàng  -->
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Tên nhà hàng: </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="name" placeholder="Tên nhà hàng">
            </div>
        </div>
        <!-- địa chỉ  -->
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Địa chỉ:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="address" placeholder="Địa chỉ">
            </div>
        </div>
        <!-- email  -->
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Email:</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" name="email" placeholder="Email">
            </div>
        </div>
        <!-- /sdt -->
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Số điện thoại:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="phone" placeholder="Số điện thoại">
            </div>
        </div>
        <!-- dropdown khu vực -->
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Khu vực</label>
            <div class="col-sm-10">
                <select class="custom-select " name="area">
                    <option selected>Chọn khu vực</option>
                    @foreach($areas as $area)
                    <option value="{{$area->id}}">{{$area->areaname}}</option>
                    @endforeach
                </select>
                <!-- <input type="text" list="thanhpho" placeholder="Chọn thành phố">
                <datalist id="thanhpho">
                    @foreach($areas as $area)
                    <option value="{{$area->areaname}}"></option>
                    @endforeach
                </datalist> -->
            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary my-1">Thêm</button>
        </div>

    </form>

</div>

@endsection

@section('js')
<script>
$("div.alert").delay(2000).slideUp();
</script>
@endsection