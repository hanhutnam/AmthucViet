@extends('admin.layout')
@section('css')
<!-- Custom styles for this page -->
<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection

@section('monan')
active
@endsection

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Danh sách món ăn của nhà hàng 
    @foreach($restaurants as $restaurant)
        @if($restaurant->id == $restaurant_id)
            {{$restaurant->name}}
        @endif
    @endforeach
    </h1>
    <a href="{{route('product.create',['id'=>$restaurant_id])}}"
        class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <!-- <i class="fas fa-download fa-sm text-white-50"></i>  -->
        Thêm món mới</a>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr class="text-center">
                        <th>Hình ảnh</th>
                        <th>Tên món ăn</th>
                        <th>Mô tả</th>
                        <th>Giá gốc</th>
                        <th>Giá khuyến mãi</th>
                        <th>Sản phẩm mới</th>
                        <th>Loại sản phẩm</th>
                        <th>Hiển thị/Ẩn</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($product as $product)
                    <tr class="text-left">
                        <td class="text-center"><img src="{{$product->link_img}}" alt="" height="35px"></td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->describe}}</td>
                        <td>{{$product->unit_price}}</td>
                        <td>{{$product->promotion_price}}</td>
                        <td>
                            @if($product->new_product==1)
                                Sản phẩm mới
                            @else 
                                Không có
                            @endif
                        </td>
                        <td>
                            @foreach($producttypes as $producttype)
                            @if($product->id_product_type == $producttype->id) {{$producttype->name}} @endif
                            @endforeach
                        </td>
                        <td>@if($product->active==1)
                                Hiển thị
                            @else 
                                Ẩn
                            @endif</td>
                        <td class="text-center">
                            <a href="{{route('product.edit',['id'=>$product->id])}}"><i class="far fa-edit"></i></a>
                            |
                            <a onclick="return comfirm('Bạn có muốn xóa?')" href="{{route('product.delete',['id'=>$product->id])}}"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<a href="{{ url()->previous() }}" class="btn btn-default">Back</a>
@endsection

@section('js')
<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>
@endsection