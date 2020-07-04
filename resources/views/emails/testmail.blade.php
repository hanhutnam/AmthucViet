<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ẩm Thực Việt</title>
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

    <script src="js/jquery.js"></script>
    <script src="vendors/jqueryui/jquery-ui-1.10.4.custom.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
</head>

<body>
    <h2>Chào bạn <strong>{{$customer}}</strong>!</h2><br>
    <div class="your-order-head">
        <h3>Đơn hàng của bạn</h3>
    </div>
    <div class="your-order-body" style="padding: 0px 10px">
        <div class="your-order-item">
            <div>
                @foreach($carts as $cart)
                <!--  one item	 -->
                <div class="media">
                    <img width="25%" src="{{$cart['attributes']['img']}}" alt="" class="pull-left">
                    <div class="media-body">
                        <p class="text-bold">{{$cart->name}}</p>
                        <div>
                            <span class="color-gray your-order-info">Đơn giá: {{number_format($cart->price)}}VNĐ</span>
                        </div>
                        <div>
                            <span class="color-gray your-order-info">Số lượng: {{$cart->quantity}}</span>
                        </div>
                        <br>
                    </div>
                </div>
                <!-- end one item -->
                @endforeach
            </div>
            <div class="clearfix"></div>
        </div>
        <br>
        <div class="your-order-item">
            <h3>Tổng tiền: {{number_format($total)}} VNĐ</h3>
            <div class="clearfix"></div>
        </div>
    </div>
    <br>
    <h2 class="text-center">Cảm ơn bạn!</h2>
</body>

</html>