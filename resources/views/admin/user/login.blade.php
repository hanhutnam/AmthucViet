<!DOCTYPE html>
<html>

<head>
    <title>Ẩm thực Việt - Đăng nhập</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <base href="{{asset('public')}}/asset_admin/">
    <link href="css/signup.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="icon" type="image/png" href="images/icons/icon.png" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->
    <link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
</head>

<body>
    <!-- main -->
    <div class="main-w3layouts wrapper">
        <h1>Đăng nhập</h1>
        <div class="main-agileinfo">
            <div class="agileits-top">
            <div class="bg-danger">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            </div>
                <form action="{{route('user.login')}}" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="wrap-input100 validate-input m-b-16 " data-validate="Mời bạn nhập email tài khoản">
                        <input class="input100 text-dark" type="email" name="username" placeholder="Email"  require >
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input " data-validate="Mời bạn nhập mật khẩu">
                        <input class="input100 text-dark" type="password" name="password" placeholder="Mật khẩu" >
                        <span class="focus-input100"></span>
                    </div>
                    <div class="text-right p-t-13 p-b-23">
                        <span class="text-reset">
                            Quên
                        </span>

                        <a href="{{route('sendtomail')}}" class="text-danger">
                            mật khẩu
                        </a>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Đăng nhập
                        </button>
                    </div>
                    <br>
                    @if(session('message'))
                    <div class="alert alert-danger text-center">
                        {{session('message')}}                    
                    </div>
                    @endif
                    <div class="flex-col-c p-t-70 p-b-40">
                        <span class="text-gray-100 p-b-9">
                            Bạn chưa có tài khoản?
                        </span>

                        <a href="{{route('user.register')}}" class="text-danger">
                        ĐĂNG KÝ NGAY
                        </a>
                    </div>
                </form>

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
        </ul>
    </div>
    <!-- //main -->
</body>

</html>