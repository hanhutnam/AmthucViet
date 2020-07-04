@extends('page.product_type')

@section('data')
<div class="col-sm-10">
    <div class="beta-products-list">
        <h4>Sản phẩm {{$loap_sp->name}}</h4>
        <div class="beta-products-details">
            <!-- <p class="pull-left">Có {{count($sp_theoloai)}} sản phẩm</p> -->
            <div class="clearfix"></div>
        </div>

        <div class="row data">
            @foreach($sp_theoloai as $sanpham)
            <div class="col-sm-3">
                <div class="single-item">
                    @if($sanpham->promotion_price!=0)
                    <div class="ribbon-wrapper">
                        <div class="ribbon sale">Sale</div>
                    </div>
                    @endif
                    <div class="single-item-header">
                        <a href="{{route('page.detail',$sanpham->id)}}"><img src="{{$sanpham->link_img}}" alt=""
                                height="250px"></a>
                    </div>
                    <div class="single-item-body">
                        <p class="single-item-title">{{$sanpham->name}}</p>
                        <p class="single-item-price" style="font-size: 18px">
                            @if($sanpham->promotion_price !=0)
                            <span class="flash-del">{{number_format($sanpham->unit_price)}} đồng</span>
                            <span class="flash-sale">{{number_format($sanpham->promotion_price)}}
                                đồng</span>
                            @else
                            <span>{{number_format($sanpham->unit_price)}} đồng</span>
                            @endif
                        </p>
                        <strong style="font-size:18px"> @foreach($restaurants as $restaurant)
                            @if($restaurant->id == $sanpham->id_restaurant)
                            {{$restaurant->name}}
                            @endif
                            @endforeach
                        </strong>
                    </div>
                    <div class="single-item-caption">
                        <a class="add-to-cart pull-left" href="{{route('page.buy',$sanpham->id,$sanpham->name)}}"><i
                                class="fa fa-shopping-cart"></i></a>
                        <a class="beta-btn primary" href="{{route('page.detail',$sanpham->id)}}">Chi tiết
                            <i class="fa fa-chevron-right"></i></a>
                        <div class="clearfix"></div>
                    </div>
                    <br>
                </div>
            </div>
            @endforeach
        </div>
    </div> <!-- .beta-products-list -->


</div>

@endsection