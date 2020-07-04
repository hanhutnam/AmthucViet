@extends('page.layout')

@section('function')
    <script>
  function updateCart(id,quantity){
	$.get(
		"{{asset('cap-nhat')}}",
		{id:id,quantity:quantity},
		function(){
			location.reload();
		}
	);
}
    </script>
@endsection

@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Giỏ hàng của bạn</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('page.trangchu')}}">Trang chủ</a> / <span>Giỏ hàng</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
</div>
<br><br>

	<div class="cart-info container">
		<table class="table table-striped table-bordered">
			<tr >
				<th class="text-center">Ảnh</th>
				<th class="text-center">Tên món ăn</th>
				<th class="text-center">Đơn giá</th>
				<th class="text-center">Số lượng</th>
				<th class="text-center">Hành động</th>
				<th class="text-center">Thành tiền</th>
			</tr>
			<form action="" method="POST" class="beta-form-checkout">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
			@foreach($content as $cart)
			<tr>
				<td style="max-width: 20px"><img width="100%"  src="{{$cart['attributes']['img']}}" ></td>
				<td><p class="font-large">{{$cart->name}}</p></td>
				<td>
					<span class="font-large">
						{{number_format($cart->price)}}VNĐ
					</span>
				</td>
				<td style="max-width: 30px" >
					<span class="font-large" >
						<input type="number" class="qty" style="max-width: 100%" name="quantity" value="{{$cart->quantity}}"
						 onchange="updateCart({{$cart->id}},this.value)" >
					</span>
				</td>
				<td class="total text-center">
					<a class="glyphicon glyphicon-trash" title="Xóa" href="{{route('page.delete',$cart->id)}}"></a>
				</td>
				<td>{{number_format($cart->price*$cart->quantity)}}</td>
			</tr>
			@endforeach
			</form>

		</table>
	</div>
<div class="container">
	<div class="pull-right">
		<div class=" pull-right">
			<table class="table table-striped table-bordered" style="min-width: 250px">
				<tr>
					<th><span class="extra bold totalamout">Tổng cộng: </span></th>
					<td><span class="bold totalamout">{{number_format($total)}} đồng</span></td>
				</tr>
			</table>
			<div class="text-center">
				<a href="{{route('page.order')}}" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
			</div>
			
		</div>
	</div>
</div>


<br><br><br>
								
@endsection

@section('js')

@endsection