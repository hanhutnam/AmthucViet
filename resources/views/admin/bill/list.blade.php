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
    <h1 class="h3 mb-0 text-gray-800">Danh sách hóa đơn của nhà hàng
        @foreach($restaurants as $restaurant)
        @if($restaurant->id == $restaurant_id)
        {{$restaurant->name}}
        @endif
        @endforeach
    </h1>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr class="text-center">
                        <th>Mã hóa đơn</th>
                        <th>Tên khách hàng</th>
                        <th>Tổng tiền</th>
                        <th>Ngày đặt hàng</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ giao hàng</th>
                        <th>Trạng thái</th>
                        <th>Xem chi tiết</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($mang as $k => $ds)
                    @foreach($bills as $bill)
                    
                    <tr class="text-left">
                        <!-- //// -->
                       @if($bill->id == $ds['id_bill'])
                        <td class="text-center">{{$bill->id}}</td>
                       
                        
                        <td> @foreach($customers as $customer)
                            @if($customer->id == $bill->id_customer)
                            {{$customer->name}}
                            @endif
                            @endforeach
                        </td>

                        <td> <!--@foreach($billdetails as $billdetail)
                            @if($billdetail->id_bill == $bill->id)
                                {{$tien+=$billdetail->unit_price*$billdetail->qty}}
                            @endif
                            @endforeach--> {{$tien}}VNĐ 
                            <!-- {{$tien=0}} -->
                        </td>

                        <td>{{date('d-m-Y H:i:s', strtotime($bill->order_date))}}</td>
                        <!-- //// -->
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
                              @if($bill->status == 0)
                              Chưa giao
                              @else
                              Đã giao
                              @endif
                        </td>
                    
                        
                        <td class="text-center">
                              @if($bill->status == 0)
                            <a href="{{route('bill.status',['id'=>$bill->id])}}" title="Đã giao"><i class="fas fa-check-circle"></i></a> |
                              @endif
                            <a href="{{route('bill.detail',['id'=>$bill->id])}}" title="Xem chi tiết"><i class="fas fa-info-circle"></i></a>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<a href="{{route('bill.menu',Auth::user()->id)}}" class="btn btn-default">Back</a>
@endsection

@section('js')
<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>
@endsection