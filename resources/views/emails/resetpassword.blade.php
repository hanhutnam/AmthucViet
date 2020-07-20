<html>

<head>
    <style>
        .colored {
            color: blue;
        }

        #body {
            font-size: 2em;
            width: 800px;
            border-style: solid;
            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
        }

        .center {
            margin: auto;
            width: 50%;
            border: 3px solid green;
            padding: 10px;
        }

        a {
            text-decoration: none;
            color: #FFFFFF;

        }

        .button {
            background-color: wheat;
            /* Green */
            border: none;
            width: 200px;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 20px;
        }
    </style>
</head>

<body>
    <div id='body' class="center">
        <div>
            <h4>Bạn đã sử dụng chức năng khôi phục mật khẩu tại <b>Ẩm thực Việt</b> với Email</h4>
            <h5>{{$mail}}</h5>
            <hr>
            <h5>Bạn vui lòng nhấp vào liên kết bên dưới để đổi mật khẩu mới!</h5>
            <a href="{{$link}}" class="button">Đổi mật khẩu</a><br><br>
        </div>
    </div>
</body>

</html>
