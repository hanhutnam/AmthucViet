@extends('page.layout')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Khu vực: {{$areas->areaname}}</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('page.trangchu')}}">Home</a> / <span>Khu vực</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
</div>
<div class="container">
	<div id="content" class="space-top-none">
		<div class="main-content">
			
			<div class="space60">&nbsp;</div>
			<div class="row">
				<div class="col-sm-3">
					<ul class="aside-menu">
					@foreach($khuvuc as $kv)
						<li><a href="{{route('page.area',$kv->id)}}">{{$kv->areaname}}</a></li>
					@endforeach
					</ul>
				</div>
				<div class="col-sm-9">
					<div class="beta-products-list">
						<h4>Sản phẩm</h4>
						<div class="beta-products-details">
							<!-- <p class="pull-left">Có ? sản phẩm</p> -->
							<div class="clearfix"></div>
						</div>
						<div class="row">
						@foreach($area_res as $nh)
							@foreach($products as $sanpham)
							@if($sanpham->id_restaurant==$nh->id)
								<div class="col-sm-4">
									<div class="single-item">
										@if($sanpham->promotion_price!=0)
											<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
										@endif
										<div class="single-item-header">
											<a href=""><img src="{{$sanpham->link_img}}" alt="" height="250px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$sanpham->name}}</p>
											<p class="single-item-price" style="font-size: 18px">
											@if($sanpham->promotion_price !=0)
												<span class="flash-del">{{number_format($sanpham->unit_price)}} đồng</span>
													<span class="flash-sale">{{number_format($sanpham->promotion_price)}} đồng</span>
											@else
											<span>{{number_format($sanpham->unit_price)}} đồng</span>
											@endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href=""><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
							@endif
							@endforeach
						@endforeach
						</div>
					</div> <!-- .beta-products-list -->

					<div class="space50">&nbsp;</div>

					<div class="beta-products-list">
						<h4>Sản phẩm khu vực khác</h4>
						<div class="beta-products-details">
							<!-- <p class="pull-left">Tìm thấy ? sản phẩm</p> -->
							<div class="clearfix"></div>
						</div>

							<div class="row">
							@foreach($area_no_res as $nh_k)
								@foreach($products as $sp_k)
								@if($sp_k->id_restaurant==$nh_k->id)
									<div class="col-sm-4">
										<div class="single-item">
											@if($sp_k->promotion_price!=0)
												<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
											@endif
											<div class="single-item-header">
												<a href="chitiet.html"><img src="{{$sp_k->link_img}}" alt="" height="250px"></a>
											</div>
											<div class="single-item-body">
												<p class="single-item-title">{{$sp_k->name}}</p>
												<p class="single-item-price" style="font-size: 18px">
												@if($sp_k->promotion_price !=0)
													<span class="flash-del">{{number_format($sp_k->unit_price)}} đồng</span>
														<span class="flash-sale">{{number_format($sp_k->promotion_price)}} đồng</span>
												@else
												<span>{{number_format($sp_k->unit_price)}} đồng</span>
												@endif
												</p>
											</div>
											<div class="single-item-caption">
												<a class="add-to-cart pull-left" href="giohang.html"><i class="fa fa-shopping-cart"></i></a>
												<a class="beta-btn primary" href="product.html">Chi tiết <i class="fa fa-chevron-right"></i></a>
												<div class="clearfix"></div>
											</div>
										</div>
									</div>
								@endif
								@endforeach
							@endforeach
							</div>
						
						<div class="space40">&nbsp;</div>
					
				
					</div> <!-- .beta-products-list -->
				</div>
			</div> <!-- end section with sidebar and main content -->
			

		</div> <!-- .main-content -->
	</div> <!-- #content -->
</div> <!-- .container -->
@endsection