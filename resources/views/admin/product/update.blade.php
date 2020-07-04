@extends('admin.layout')
@section('css')

@endsection

@section('monan')
active
@endsection

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Cập nhật món ăn</h1>

</div>

<div class="">
    <form action="{{route('product.update',['id'=>$products->id])}}" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <!-- tên nhà hàng  -->
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Tên món ăn: </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="name" placeholder="Tên món ăn"
                    value="{{$products->name}}">
            </div>
        </div>
        <!-- địa chỉ  -->
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Hình ảnh:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="link_img" value="{{$products->link_img}}"
                    placeholder="Link đường dẫn ảnh (Ví dụ: https://i.ibb.co/ZYDQVDT/image.png)">
            </div>
        </div>
        <!-- email  -->
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Mô tả:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="describe" placeholder="Mô tả"
                    value="{{$products->describe}}">
            </div>
        </div>
        <!-- /sdt -->
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Giá gốc:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="unit_price" placeholder="Giá gốc"
                    value="{{$products->unit_price}}">
            </div>
        </div>
        <!-- /sdt -->
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Giá khuyến mãi:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="promotion_price"
                    placeholder="Giá khuyến mãi (nếu k có thì bằng 0)" value="{{$products->promotion_price}}">
            </div>
        </div>
        <!-- /sảm phẩm mới -->
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Sản phẩm mới:</label>
            <div class="col-sm-10">
                <select class="custom-select " name="new_product">
                    <option value="1" @if($products->new_product == 1) selected
                        @endif> Sản phẩm mới
                    </option>
                    <option value="0" @if($products->new_product != 1) selected
                        @endif> Không có
                    </option>
                </select>
            </div>
        </div>
        <!-- dropdown khu vực -->
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Loại sản phẩm</label>
            <div class="col-sm-10">
                <select class="custom-select " name="id_product_type">
                    @foreach($product_types as $product_type)
                    <option value="{{$product_type->id}}" @if($products->id_product_type == $product_type->id) selected
                        @endif> {{$product_type->name}}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>
        <!-- /active -->
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Hiển thị/ẩn:</label>
            <div class="col-sm-10">
                <select class="custom-select " name="active">
                    <option value="1" @if($products->active == 1) selected
                        @endif> Hiển thị
                    </option>
                    <option value="0" @if($products->active != 1) selected
                        @endif> Ẩn
                    </option>
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