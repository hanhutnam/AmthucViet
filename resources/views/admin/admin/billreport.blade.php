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
    <h1 class="h3 mb-0 text-gray-800">Doanh thu của nhà hàng 
        @foreach($restaurants as $restaurant)
        @if($restaurant->id == $restaurant_id)
        {{$restaurant->name}}
        @endif
        @endforeach
    </h1>
    <h5><label for=""><b>Tổng doanh thu: </b></label> {{number_format($total_revenue)}} VNĐ</h5>
    
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
                        <th style="width: 60px;">Mã hóa đơn</th>
                        <th style="width: 120px;">Tên khách hàng</th>
                        <th style="width: 80px;">Số điện thoại</th>
                        <th style="width: 250px;">Địa chỉ</th>
                        <th>Tổng tiền</th>
                        <th>Ngày đặt hàng</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($mang as $k => $ds)
                    <tr class="text-left">
                        @foreach($bills as $bill)
                        @if($bill->id == $ds['id_bill'])
                        <td class="text-center">{{$bill->id}}
                            <!-- {{$bill->status}} -->
                        </td>

                        <td> @foreach($customers as $customer)
                            @if($customer->id == $bill->id_customer)
                            {{$customer->name}}
                            @endif
                            @endforeach
                        </td>
                        <td>@foreach($customers as $customer)
                            @if($customer->id == $bill->id_customer)
                            {{$customer->phone}}
                            @endif
                            @endforeach
                        </td>

                        <td>@foreach($customers as $customer)
                            @if($customer->id == $bill->id_customer)
                            {{$customer->address}}
                            @endif
                            @endforeach
                        </td>
                        <td>
                            <!-- @foreach($bill_details as $billdetail)
                                @if($billdetail->id_bill == $bill->id)
                                    {{$tien += $billdetail->sum}}
                                @endif
                                @endforeach  -->
                            {{number_format($tien)}} VNĐ
                            <!-- {{$tien=0}} -->
                        </td>

                        <td>{{date('H:i:s d-m-Y', strtotime($bill->order_date))}}</td>

                        
                        @endif
                        @endforeach

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