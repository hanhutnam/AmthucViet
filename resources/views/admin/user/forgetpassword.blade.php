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
        <h1>Quên mật khẩu</h1>
        <div class="main-agileinfo">
            <div class="agileits-top">
                <form action="{{ route('sendmail') }}" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">

                    <div style="padding-bottom: 20px;">Nhập email của bạn:</div>
                    <div class="wrap-input100 validate-input" data-validate="Mời bạn nhập email của bạn">
                        <input class="input100 text-dark" type="email" name="email" placeholder="Email" required>
                        <span class="focus-input100"></span>
                    </div>
                    <br>
                    @if (session('success'))
                    <div class="alert alert-success " role="alert">
                        {{ session('success') }}
                    </div>
                    @endif 
                    @if (session('error'))
                    <div class="alert alert-danger " role="alert">
                        {{ session('error') }}
                    </div>
                    @endif
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Gửi
                        </button>
                    </div>
                </form>

            </div>
        </div>
        <br><br><br><br><br><br><br><br><br>
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