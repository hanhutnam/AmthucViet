@extends('admin.admin.layout')
@section('css')
<!-- Custom styles for this page -->
<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection

@section('chunhahang')
active
@endsection

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Danh sách chủ nhà hàng</h1>
    <!-- <a href="{{route('create.restaurant')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> -->
        <!-- <i class="fas fa-download fa-sm text-white-50"></i>  -->
        <!-- Tạo mới</a> -->
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
                        <th>Tên chủ nhà hàng</th>
                        <th>Email</th>
                        <!-- <th>Mật khẩu</th> -->
                        <th>Ví tiền</th>
                        <th>Tiền nợ</th>
                        <!-- <th>Xem doanh thu</th> -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr class="text-left">
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <!-- <td>{{$user->password}}</td> -->
                        <td>{{$user->wallet}}</td>
                        <td>{{$user->debt}}
                        </td>
                        <!-- <td class="text-center">
                            <a href=""><i class="fas fa-info-circle"></i></a> -->
                            <!-- |
                            <a onclick="return comfirm('Bạn có muốn xóa?')"  href=""  ><i class="fas fa-trash-alt"></i></a> -->
                        <!-- </td> -->
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