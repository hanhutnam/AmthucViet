@extends('admin.layout')
@section('css')
<!-- Custom styles for this page -->
<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection

@section('nhahang')
active
@endsection

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Danh sách nhà hàng</h1>
    <a href="{{route('create.restaurant')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <!-- <i class="fas fa-download fa-sm text-white-50"></i>  -->
        Tạo mới</a>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <!-- <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
    </div> -->
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr class="text-center">
                        <th>Tên nhà hàng</th>
                        <th>Địa chỉ</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Khu vực</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($restaurants as $restaurant)
                    <tr class="text-left">
                        <td>{{$restaurant->name}}</td>
                        <td>{{$restaurant->address}}</td>
                        <td>{{$restaurant->email}}</td>
                        <td>{{$restaurant->phone}}</td>
                        <td>@foreach($areas as $area)
                            @if($restaurant->id_area == $area->id) {{$area->areaname}} @endif
                            @endforeach
                        </td>
                        <td class="text-center">
                            <a href="{{route('edit.restaurant',['id'=>$restaurant->id])}}"><i class="far fa-edit"></i></a>
                            |
                            <a onclick="return comfirm('Bạn có muốn xóa?')"  href="{{route('delete.restaurant',
                                                ['id'=>$restaurant->id])}}"  ><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('js')
<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>
@endsection