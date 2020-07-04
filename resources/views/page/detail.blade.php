@extends('page.layout')
@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Sản phẩm {{$sanpham->name}}</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('page.trangchu')}}">Trang chủ</a> / <span>Thông tin chi tiết sản phẩm</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

	<div class="container">
		<div id="content">
			<div class="row">
				<div class="col-sm-12">

					<div class="row">
						<div class="col-sm-4">
							<img src="{{$sanpham->link_img}}" alt="">
						</div>
						<div class="col-sm-8">
							<div class="single-item-body">
								<p class="single-item-title"><h2>{{$sanpham->name}}</h2></p>
								<br>
								<p class="single-item-price">
									@if($sanpham->promotion_price==0)
										<span class="flash-sale">{{number_format($sanpham->unit_price)}} đồng</span>
									@else
										<span class="flash-del">{{number_format($sanpham->unit_price)}} đồng</span>
										<span class="flash-sale">{{number_format($sanpham->promotion_price)}} đồng</span>
									@endif
								</p>
							</div>

							<div class="clearfix"></div>
							<div class="space20">&nbsp;</div>

							<div class="single-item-desc">
								<p>{{$sanpham->describe}}</p>
							</div>
							<div class="space20">&nbsp;</div>

							
							<!-- <div class="single-item-options">
								Mua <a class="add-to-cart" href=""><i class="fa fa-shopping-cart"></i></a>
								<div class="clearfix"></div>
							</div> -->
							<div class="single-item-caption">
										<a class="add-to-cart " href="{{route('page.buy',$sanpham->id,$sanpham->name)}}"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary pull-left" href="{{route('page.buy',$sanpham->id,$sanpham->name)}}">Mua hàng </a>
										<div class="clearfix"></div>
									</div>
						</div>
					</div>

					<div class="space40">&nbsp;</div>
					<div class="woocommerce-tabs">
						<span style="font-size: 19px"><b>Nhà hàng:</b> {{$nhahang->name}}</span>
						<br><br>
						<span style="font-size: 19px"><b>Địa chỉ:</b> {{$nhahang->address}}</span>
					</div>
					<div class="space50">&nbsp;</div>
					<div class="beta-products-list">
						<h4>Sản phẩm tương tự</h4>
						<br>
						<div class="row">
						@foreach($sp_tuongtu as $sptt)
							<div class="col-sm-3">
								<div class="single-item">
									@if($sptt->promotion_price!=0)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
									@endif
									<div class="single-item-header">
										<a href="{{route('page.detail',$sptt->id)}}"><img src="{{$sptt->link_img}}" alt="" height="280px"></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{$sptt->name}}</p>
										<p class="single-item-price" style="font-size: 18px">
											@if($sptt->promotion_price==0)
												<span class="flash-sale">{{number_format($sptt->unit_price)}} đồng</span>
											@else
												<span class="flash-del">{{number_format($sptt->unit_price)}} đồng</span>
												<span class="flash-sale">{{number_format($sptt->promotion_price)}} đồng</span>
											@endif
										</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="{{route('page.buy',$sptt->id,$sptt->name)}}"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="{{route('page.detail',$sptt->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
									<br>
								</div>
							</div>
						@endforeach
						</div>
						<div class="row">{{$sp_tuongtu->links()}}</div>
					</div> <!-- .beta-products-list -->
				</div>
				
				</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection