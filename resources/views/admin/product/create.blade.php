@extends('admin.layout')
@section('css')

@endsection

@section('monan')
active
@endsection

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Thêm mới món ăn</h1>

</div>

<div class="">
    <form action="{{route('product.store',['id'=>$restaurant_id])}}" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <!-- tên nhà hàng  -->
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Tên món ăn: </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="name" placeholder="Tên món ăn">
            </div>
        </div>
        <!-- địa chỉ  -->
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Hình ảnh:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="link_img"
                    placeholder="Link đường dẫn ảnh (Ví dụ: https://i.ibb.co/ZYDQVDT/image.png)">
            </div>
        </div>
        <!-- email  -->
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Mô tả:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="describe" placeholder="Mô tả">
            </div>
        </div>
        <!-- /sdt -->
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Giá gốc:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="unit_price" placeholder="Giá gốc">
            </div>
        </div>
        <!-- /sdt -->
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Giá khuyến mãi:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="promotion_price"
                    placeholder="Giá khuyến mãi (nếu k có thì bằng 0)">
            </div>
        </div>
        <!-- /sảm phẩm mới -->
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Sản phẩm mới:</label>
            <div class="checkbox col-sm-10">
                <label>
                    <input type="checkbox" value="yes" name="new_product"> Mới
                </label>
            </div>
        </div>
        <!-- dropdown khu vực -->
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Loại sản phẩm</label>
            <div class="col-sm-10">
                <select class="custom-select " name="id_product_type">
                    <option selected>Chọn loại sản phẩm</option>
                    @foreach($producttypes as $producttype)
                    <option value="{{$producttype->id}}">{{$producttype->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <!-- /active -->
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Hiển thị/ẩn:</label>
            <div class="checkbox col-sm-10">
                <label>
                    <input type="checkbox" value="yes" name="active"> Hiển thị
                </label>
            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary my-1">Thêm</button>
        </div>

    </form>

</div>

@endsection

@section('js')

@endsection