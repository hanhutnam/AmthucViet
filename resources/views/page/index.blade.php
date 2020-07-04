@extends('page.layout')
@section('content')

<div class="fullwidthbanner-container">
    <div class="fullwidthbanner">
        <div class="bannercontainer">
            <div class="banner">
                <ul>
                    @foreach($slides as $sl)
                    <!-- THE FIRST SLIDE -->
                    <li data-transition="boxfade" data-slotamount="20" class="active-revslide"
                        style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
                        <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined"
                            data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined"
                            data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined"
                            data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined"
                            data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined"
                            data-oheight="undefined">
                            <div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover"
                                data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined"
                                src="{{$sl->link_img}}" data-src="{{$sl->link_img}}"
                                style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('{{$sl->link_img}}'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
                            </div>
                        </div>

                    </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="tp-bannertimer"></div>
    </div>
</div>
<!-- end slider -->



<div class="container">
    <div id="content" class="space-top-none">
        <div class="main-content">
            <div class="space60">&nbsp;</div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="beta-products-list">
                        <h4>Sản phẩm mới</h4>
                        <div class="beta-products-details">
                            <!-- <p class="pull-left">Có {{count($product_new)}} sản phẩm</p> -->
                            <div class="clearfix"></div>
                        </div>

                        <div class="row">
                            @foreach($product_new as $new)
                            <div class="col-sm-3">
                                <div class="single-item">
                                    @if($new->promotion_price!=0)
                                    <div class="ribbon-wrapper">
                                        <div class="ribbon sale">Sale</div>
                                    </div>
                                    @endif
                                    <div class="single-item-header">
                                        <a href="{{route('page.detail',$new->id)}}"><img src="{{$new->link_img}}" alt="" height="270px"></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">{{$new->name}}</p>

                                        <p class="single-item-price" style="font-size: 18px">
                                            @if($new->promotion_price==0)
                                            <span class="flash-sale">{{number_format($new->unit_price)}} đồng</span>
                                            @else
                                            <span class="flash-del">{{number_format($new->unit_price)}} đồng</span>
                                            <span class="flash-sale">{{number_format($new->promotion_price)}}
                                                đồng</span>
                                            @endif
                                        </p>
                                        <h5> @foreach($restaurants as $restaurant)
                                            @if($restaurant->id == $new->id_restaurant)
                                            {{$restaurant->name}}
                                            @endif
                                            @endforeach
                                        </h5>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="{{route('page.buy',$new->id)}}"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="{{route('page.detail',$new->id)}}">Chi tiết
                                            <i class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                    <br>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="row">{{$product_new->links()}}</div>
                    </div> <!-- .beta-products-list -->

                    <div class="space50">&nbsp;</div>

                    <div class="beta-products-list">
                        <h4>Sản phẩm khuyến mãi</h4>
                        <div class="beta-products-details">
                            <div class="clearfix"></div>
                        </div>
                        <div class="row">
                            @foreach($product_promotion as $spkm)
                            <div class="col-sm-3">
                                <div class="single-item">
                                    @if($spkm->promotion_price!=0)
                                    <div class="ribbon-wrapper">
                                        <div class="ribbon sale">Sale</div>
                                    </div>
                                    @endif
                                    <div class="single-item-header">
                                        <a href="{{route('page.detail',$spkm->id)}}"><img src="{{$spkm->link_img}}"
                                                alt="" height="270px"></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">{{$spkm->name}}</p>
                                        <p class="single-item-price" style="font-size: 18px">
                                            <span class="flash-del">{{number_format($spkm->unit_price)}} đồng</span>
                                            <span class="flash-sale">{{number_format($spkm->promotion_price)}}
                                                đồng</span>
                                        </p>
                                        <h5> @foreach($restaurants as $restaurant)
                                            @if($restaurant->id == $spkm->id_restaurant)
                                            {{$restaurant->name}}
                                            @endif
                                            @endforeach
                                        </h5>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="{{route('page.buy',$spkm->id,$spkm->name)}}"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="{{route('page.detail',$spkm->id)}}">Chi tiết
                                            <i class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div> <!-- .beta-products-list -->
                </div>
            </div> <!-- end section with sidebar and main content -->


        </div> <!-- .main-content -->
    </div> <!-- #content -->







    @endsection