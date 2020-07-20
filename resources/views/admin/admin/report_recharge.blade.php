@extends('admin.admin.layout')
@section('css')
<!-- Custom styles for this page -->
<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection
@section('lichsunaptien')
active
@endsection
@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Danh sách lịch sử nạp tiền</h1>
    <h5><label for=""><b>Tổng số tiền đã được nạp vào website: </b></label> {{number_format($total_pay)}} VNĐ</h5>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr class="text-center">
                        <th>Mã giao dịch</th>
                        <th>Tên chủ nhà hàng</th>
                        <th>Ngân hàng</th>
                        <th>Số tiền (VNĐ)</th>
                        <th>Ngày nạp</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pays as $pay)
                    <tr class="text-left">
                        <td>{{$pay->deal_code}}</td>
                        @foreach($users as $user)
                        @if($pay->user_id == $user->id)
                        <td>{{$user->name}}</td>
                        @endif
                        @endforeach
                        <td class="text-center">{{$pay->bank_code}}</td>
                        <td class="text-center">{{number_format($pay->amount)}}</td>
                        <td class="text-center">{{$pay->created_at->format('h:m:s, d/m/Y')}}</td>
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