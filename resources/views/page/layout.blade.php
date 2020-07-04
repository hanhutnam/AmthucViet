<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ẩm Thực Việt </title>
    <base href="{{asset('public')}}/asset_page/">
    <link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/colorbox/example3/colorbox.css">
    <link rel="stylesheet" href="rs-plugin/css/settings.css">
    <link rel="stylesheet" href="rs-plugin/css/responsive.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/huong-style.css">
    <link rel="icon" type="image/png" href="image/icons/icon.png"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="js/jquery.js"></script>
    <script src="vendors/jqueryui/jquery-ui-1.10.4.custom.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    @yield("function")
</head>

<body>
    <!-- header -->
    <div id="header">
        <div class="header-top">
            <div class="container">
                <div class="pull-left auto-width-left">
                    <ul class="top-menu menu-beta l-inline">
                        <li><a href=""><i class="fa fa-user"></i> Make by Hà Nhựt Nam</a></li>
                        <li><a href=""><i class="fa fa-phone"></i> 0836978290</a></li>
                    </ul>
                </div>
                <div class="pull-right auto-width-right">
                    <ul class="top-details menu-beta l-inline">
                        @if(Auth::check())
                        <li><a href="">Chào bạn {{Auth::user()->name}}</a></li>
                        <li><a href="{{route('user.logout')}}">Đăng xuất</a></li>
                        @else
                        <li><a href="{{route('user.register')}}" title="Đăng ký cho chủ nhà hàng">Đăng kí</a></li>
                        <li><a href="{{route('user.login')}}" title="Đăng nhập cho chủ nhà hàng">Đăng nhập</a></li>
                        @endif

                    </ul>
                </div>
                <div class="clearfix"></div>
            </div> <!-- .container -->
        </div> <!-- .header-top -->
        <div class="header-body">
            <div class="container beta-relative">
                <div class="pull-left">
                    <a href="{{route('page.trangchu')}}" id="logo"><span
                            style="font-family:Courier New; font-size: 35px">Ẩm Thực
                            Việt</span></a>
                </div>
                <div class="pull-right beta-components space-left ov">
                    <div class="space10">&nbsp;</div>
                    <!-- <div class="beta-comp">
						<form role="search" method="get" id="searchform" action="/">
					        <input type="text" value="" name="s" id="s" placeholder="Nhập từ khóa..." />
					        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
						</form>
					</div> -->

                    <div class="beta-comp">

                        <div class="cart">
                            <div class="beta-select"><i class="fa fa-shopping-cart"></i>
                                Giỏ hàng (@if(!$check)
                                {{$getTotalQuantity}}
                                @else Trống
                                @endif)
                                <i class="fa fa-chevron-down"></i></div>
                            <div class="beta-dropdown cart-body">
                                @if(!$check)
                                @foreach($content as $cart)
                                <div class="cart-item">
                                    <a class="cart-item-delete" href="{{route('page.delete',$cart->id)}}"><i class="fa fa-times"></i></a>
                                    <div class="media">
                                        <a class="pull-left" href="#"><img src="{{$cart['attributes']['img']}}"
                                                alt=""></a>
                                        <div class="media-body">
                                            <span class="cart-item-title">{{$cart->name}}</span>
                                            <span class="cart-item-amount">{{$cart->quantity}}*
                                                <span>{{$cart->price}}</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <div class="cart-caption">
                                    <div class="cart-total text-right">Tổng tiền: <span
                                            class="cart-total-value">{{number_format($total)}} 
                                            đồng</span></div>
                                    <div class="clearfix"></div>

                                    <div class="center">
                                        <div class="space10">&nbsp;</div>
                                        <a href="{{route('page.cart')}}" class="beta-btn primary text-center">Xem giỏ hàng <i
                                                class="fa fa-chevron-right"></i></a>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div> <!-- .cart -->
                    </div>
                </div>
                <div class="clearfix"></div>
            </div> <!-- .container -->


        </div> <!-- .header-body -->
        <div class="header-bottom" style="background-color: #0277b8;">
            <div class="container">
                <a class="visible-xs beta-menu-toggle pull-right" href="#">
                    <span class="beta-menu-toggle-text">Menu</span> <i class="fa fa-bars"></i></a>
                <div class="visible-xs clearfix"></div>
                <nav class="main-menu">
                    <ul class="l-inline ov">
                        <li><a href="{{route('page.trangchu')}}">Trang chủ</a></li>
                        <!-- <li><a>Khu vực</a>
                            <ul class="sub-menu">
                                @foreach($areas as $area)
                                <li><a href="{{route('page.area',$area->id)}}">{{$area->areaname}}</a></li>
                                @endforeach
                            </ul>
                        </li> -->
                        <!-- Loại sản phẩm -->
                        <li><a>Tìm món ăn</a>
                            <ul class="sub-menu">
                                @foreach($product_types as $product_type)
                                <li><a
                                        href="{{route('page.product_type',$product_type->id)}}">{{$product_type->name}}</a>
                                </li>
                                @endforeach
                            </ul>
                        </li>
                        <li><a>Giới thiệu</a></li>
                        <li><a>Liên hệ</a></li>
                    </ul>
                    <div class="clearfix"></div>
                </nav>
            </div> <!-- .container -->
        </div> <!-- .header-bottom -->
    </div> <!-- #header -->
    <!-- end header -->


    <div class="rev-slider">
        @yield("content")
    </div>
    <!-- .container -->

    <!-- footer -->
    <div id="footer" class="color-div">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 text-center">
                    <div>Hà Nhựt Nam</div>
                </div>
                <div class="col-sm-4 text-center">
                    <div>D16PM01</div>
                </div>
                <div class="col-sm-4 text-center">
                    <div>1624801030064</div>
                </div>
            </div> <!-- .row -->
        </div> <!-- .container -->
    </div>
    <!-- end footer -->


    <!-- include js files -->
    <script src="js/jquery.js"></script>
    <script src="vendors/jqueryui/jquery-ui-1.10.4.custom.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="vendors/bxslider/jquery.bxslider.min.js"></script>
    <script src="vendors/colorbox/jquery.colorbox-min.js"></script>
    <script src="vendors/animo/Animo.js"></script>
    <script src="vendors/dug/dug.js"></script>
    <script src="js/scripts.min.js"></script>   
    <script src="rs-plugin/js/jquery.themepunch.tools.min.js"></script>
    <script src="rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/wow.min.js"></script>
    <!--customjs-->
    <script src="js/custom2.js"></script>

    @yield("js")
    <script>
    $(document).ready(function($) {
        $(window).scroll(function() {
            if ($(this).scrollTop() > 150) {
                $(".header-bottom").addClass("fixNav")
            } else {
                $(".header-bottom").removeClass("fixNav")
            }
        })

    })
    </script>
</body>

</html>