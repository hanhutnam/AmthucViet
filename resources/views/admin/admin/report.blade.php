@extends('admin.admin.layout')
@section('css')
<!-- Custom styles for this page -->
<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection
@section('baocaotongquan')
active
@endsection

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Thống kê doanh thu các nhà hàng có hóa đơn</h1>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr class="text-center">
                        <th>Tên nhà hàng</th>
                        <th>Tên chủ nhà hàng</th>
                        <th>Doanh thu (VNĐ)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($retaurants as $retaurant)
                        @foreach($sum as $total)
                            @if($retaurant->id == $total->id_restaurant)
                                <tr class="text-left">
                                    <td>{{$retaurant->name}}</td>
                                    @foreach($users as $user)
                                        @if($user->id == $retaurant->id_user)
                                        <td>
                                            {{$user->name}}
                                        </td>
                                        @endif
                                    @endforeach
                                    <td class="text-center">
                                        {{number_format($total->total)}}
                                    </td>
                                </tr>
                            @endif
                        @endforeach
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