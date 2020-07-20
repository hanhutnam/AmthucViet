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
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="icon" type="image/png" href="images/icons/icon.png" />
    <link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
</head>

<body>
    <!-- main -->
    <div class="main-w3layouts wrapper">
        <h1 class="text-white">Đăng ký tài khoản</h1>
        <div class="main-agileinfo">
            <div class="agileits-top">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{route('user.register')}}" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="wrap-input100 validate-input m-b-16 ">
                        <input class="input100 text-dark" type="text" name="username" placeholder="Họ và tên" >
                        <span class="focus-input100"></span>
                    </div>
                    <div class="wrap-input100 validate-input m-b-16 ">
                        <input class="input100 text-dark" type="email" name="email" placeholder="Email"  >
                        <span class="focus-input100"></span>
                    </div>
                    <div class="wrap-input100 validate-input m-b-16 ">
                        <input class="input100 text-dark" type="password" name="password" placeholder="Mật khẩu">
                        <span class="focus-input100"></span>
                    </div>
                    <div class="wrap-input100 validate-input m-b-16 ">
                        <input class="input100 text-dark" type="password" name="re_password" placeholder="Nhập lại mật khẩu" >
                        <span class="focus-input100"></span>
                    </div>
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