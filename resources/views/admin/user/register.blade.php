<!DOCTYPE html>
<html>

<head>
    <title>Ẩm Thực Việt - Đăng ký</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="application/x-javascript">
    addEventListener("load", function() {
        setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
        window.scrollTo(0, 1);
    }
    </script>
    
    <base href="{{asset('public')}}/asset_admin/">
    <link href="css/signup.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="icon" type="image/png" href="images/icons/icon.png" />
    <link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
</head>

<body>
    <!-- main -->
    <div class="main-w3layouts wrapper">
        <h1>Đăng ký tài khoản</h1>
        <div class="main-agileinfo">
            <div class="agileits-top">
                <form action="{{route('user.register')}}" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input class="text" type="text" name="username" placeholder="Họ và tên" required="">
                    <input class="text email" type="email" name="email" placeholder="Email" required="">
                    <input class="text" type="password" name="password" placeholder="Mật khẩu" required="">
                    <input class="text w3lpass" type="password" name="password" placeholder="Nhập lại mật khẩu"
                        required="">
                    <input type="submit" value="Đăng ký">
                </form>
                <p>Bạn đã có tài khoản? <a href="{{route('user.login')}}"> Đăng nhập ngay!</a></p><br>

            </div>
        </div>
        <ul class="colorlib-bubbles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>
    <!-- //main -->
</body>

</html>