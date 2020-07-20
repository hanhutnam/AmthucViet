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
        <h1>Đổi mật khẩu</h1>
        <div class="main-agileinfo">
            <div class="agileits-top">
                <form action="{{route('user.change')}}" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div style="padding-bottom: 10px;">Nhập mật khẩu hiện tại:</div>
                    <div class="wrap-input100 validate-input m-b-16 " data-validate="Mời bạn nhập email tài khoản">
                        <input class="input100 text-dark" type="password" name="password"
                            placeholder="Mật khẩu hiện tại" required>
                        <span class="focus-input100"></span>
                    </div>

                    <div style="padding-bottom: 10px;">Nhập mật khẩu mới:</div>
                    <div class="wrap-input100 validate-input " data-validate="Mời bạn nhập mật khẩu">
                        <input class="input100 text-dark" type="password" name="newpassword" placeholder="Mật khẩu"
                            required>
                        <span class="focus-input100"></span>
                    </div>

                    <div style="padding-bottom: 10px;">Nhập lại mật khẩu:</div>
                    <div class="wrap-input100 validate-input " data-validate="Mời bạn nhập mật khẩu">
                        <input class="input100 text-dark" type="password" name="renewpassword" placeholder="Mật khẩu"
                            required>
                        <span class="focus-input100"></span>
                    </div>
                    <br>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Đổi mật khẩu
                        </button>
                    </div>
                    <br>
                    @if (session('success'))
                    <div class="alert alert-success " role="alert">
                        {{ session('success') }}
                    </div>
                    @endif
                    @if(session('message'))
                    <div class="alert alert-danger text-center">
                        {{session('message')}}
                    </div>
                    @endif
                    <div>
                        <h2><a href="{{route('user.index')}}">Trở về</a></h2>
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
<script>
$("div.alert").delay(2000).slideUp();
</script>
</html>