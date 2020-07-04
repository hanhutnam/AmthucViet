@extends('admin.layout')
@section('css')
<!-- Custom styles for this page -->
<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection
@section('dondathang')
active
@endsection
@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Chi tiết hóa đơn {{$id_bill}}</h1>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr class="text-center">
                        <th>Tên món ăn</th>
                        <th>Số lượng</th>
                        <th>Đơn giá</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($bill_details as $bill_detail)
                    <tr class="text-left">
                        <td>
                            @foreach($products as $product)
                                @if($product->id == $bill_detail->id_product)
                                    {{$product->name}}
                                @endif
                            @endforeach
                        </td>
                        <td>{{ $bill_detail->qty}}</td>
                        <td>{{ $bill_detail->unit_price}} VNĐ</td>
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