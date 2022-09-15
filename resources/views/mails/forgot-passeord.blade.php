<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        div#content {
            background-color: #212529;
            padding: 2%;
            border: 15px solid #ff1313;
        }

        p {
            font-size: 17px;
            color: white;
        }

        a {
            text-decoration: none;
            background-color: #c20505;
            color: white !important;
            font-size: 15px;
            font-weight: 900;
            padding: 1% 2%;
        }

        a#logo {
            display: block;
            text-align: center;
            text-decoration: none;
            margin-bottom: 1%;
            background-color: #212529;
        }

        a#logo img {
            width: 100px;
            height: auto;
        }
    </style>
</head>

<body>
    <div id="content">
        <a href="#" id="logo">
            <p>logo</p>
        </a>
        <p>Trouble signing in?</p>
        <p>Resetting your password is easy.</p>
        <p>Just press the button below and follow the instructions. We’ll have you up and running in no time.</p>
        <a
            href="{{ route('reset.password', ['token' => $details['token'], 'email' => $details['email'], 'expire' => $details['expire']]) }}">RESET
            PASSWORD</a>
        <p>If you did not make this request then please ignore this email.</p>
    </div>
</body>

</html>
