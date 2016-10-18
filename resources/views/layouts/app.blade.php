<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Personnal Manager</title>

    <link rel="stylesheet" href="/css/bootstrap.min.css" >
    <link rel="stylesheet" href="/css/font-awesome.min.css" >
    <link rel="stylesheet" href="/css/style.css" >

    <style>
        ul li
        {
            list-style: none;
            line-height: 50px;
            font-size: 20px;
        }
    </style>
</head>
<body>
    {{--<img src="/images/QQ截图20160510223004.png" style="border-radius: 0px;margin-left: 50px;margin-top: 30px;" class="shadow" alt="logo">--}}
    {{--<img src="/images/QQ截图20160510223543.png" style="border-radius: 0px;float:right;width: 300px;height: 250px;">--}}
    <div class="container" style="width: 100%;height: 50px">
        <div class="row">
            <ul>
                <li>Personnal Manager</li>
            </ul>
        </div>
    </div>

    @yield('content')

    <script src="/js/jquery-2.2.2.js"></script>
    <script src="/js/bootstrap.min.js"></script>
</body>
</html>
