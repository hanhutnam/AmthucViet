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
            <h4>Thông tin liên hệ của bạn: <b>{{$name}}</b> với Email: {{$email}}</h4>
            <h3>Nội dung: </h3><br>{{$content}}
        </div>
    </div>
</body>

</html>
