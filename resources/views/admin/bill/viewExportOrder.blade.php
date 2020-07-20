<table class="table">
    <thead>
        <tr>
            <th>Mã hóa đơn</th>
            <th>Tên khách hàng</th>
            <th>Tổng tiền</th>
            <th>Ngày đặt hàng</th>
            <th>Số điện thoại</th>
            <th>Địa chỉ giao hàng</th>
            <th>Trạng thái</th>
        </tr>
    </thead>
    <tbody>
        @foreach($mang as $k => $ds)
        <tr>

            @foreach($bills as $bill)
            @if($bill->id == $ds['id_bill'])
            <td>{{$bill->id}}</td>


            <td> @foreach($customers as $customer)
                @if($customer->id == $bill->id_customer)
                {{$customer->name}}
                @endif
                @endforeach
            </td>

            <td>
                <!-- @foreach($bill_details as $billdetail)
                                @if($billdetail->id_bill == $bill->id)
                                    {{$tien += $billdetail->sum}}
                                @endif
                                @endforeach  -->
                {{$tien}} VNĐ
                <!-- {{$tien=0}} -->
            </td>

            <td>{{date('d-m-Y H:i:s', strtotime($bill->order_date))}}</td>

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
            @endif
            @endforeach

        </tr>
        @endforeach
    </tbody>
</table>