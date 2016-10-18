<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>LaravelForum</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css" >
    <link rel="stylesheet" href="/css/font-awesome.min.css" >
    <link rel="stylesheet" href="/css/style.css" >


    <style>

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

    <div class="content">
        @yield('content')

    </div>

    <script src="/js/jquery-2.2.2.js"></script>
    <script src="/js/bootstrap.min.js"></script>

    @include('scripts')


    @include('flash')

</body>
</html>