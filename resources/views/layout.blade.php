<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>LaravelForum</title>
    <link rel="stylesheet" href="/css/libs.css" >
    <link rel="stylesheet" href="/css/app.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/dropzone.css">

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .navbar{
            padding-left: 0px;
            font-size: 1.3em;
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
        .content{
            padding-top: 55px;
        }
        .container{
            width: 990px !important;
            padding-right: 20px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
        }

    </style>

</head>

<body>

    @include('partials.page-nav')

    @yield('content')

    @include('partials.page-footer')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script>
    <script src="/js/libs.js"></script>

</body>
</html>