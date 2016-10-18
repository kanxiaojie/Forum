<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>LaravelForum</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css" >
    <link rel="stylesheet" href="/css/font-awesome.min.css" >
    <link rel="stylesheet" href="/css/style.css" >


    <style>
        .navbar{
            padding-top: 5px;
            margin-bottom: 15px;
            padding-left: 0px;
            font-size: 1.2em;
        }
        .aw-search-box {
            margin: 10px 0;
        }

         .aw-search-box {
            position: relative;
            float: left;
        }
        * {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }
        div {
            display: block;
        }

    </style>

</head>

<body>

    @include('partials.page-nav')

    @yield('content')

    <script src="/js/jquery-2.2.2.js"></script>
    <script src="/js/bootstrap.min.js"></script>

    @include('scripts')


    @include('flash')

</body>
</html>