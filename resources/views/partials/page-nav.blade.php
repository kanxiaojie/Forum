{{--<nav class="navbar navbar-default navbar-fixed-top">--}}
    {{--<div class="">--}}
        {{--<div class="container">--}}

            {{--<div style="float: left">--}}
                {{--<ul class="nav navbar-nav">--}}
                    {{--<li>--}}
                        {{--<a href="#">LaravelForum</a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</div>--}}

            {{--<div style="float: left">--}}
                {{--<ul class="nav navbar-nav">--}}
                    {{--<li>--}}
                        {{--<div class="aw-top-nav navbar">--}}
                            {{--<div class="navbar-header">--}}
                                {{--<button class="navbar-toggle pull-left">--}}
                                    {{--<span class="icon-bar"></span>--}}
                                    {{--<span class="icon-bar"></span>--}}
                                    {{--<span class="icon-bar"></span>--}}
                                {{--</button>--}}
                            {{--</div>--}}
                            {{--<nav role="navigation" class="collapse navbar-collapse bs-navbar-collapse">--}}
                                {{--<ul class="nav navbar-nav">--}}
                                    {{--<li id="areas"><a id="areasNav" href="/areas">Dynamic</a></li>--}}
                                    {{--<li id="posts"><a id="postsNav" href="/posts" class="active">Find</a></li>--}}
                                    {{--<li id="phones"><a id="phonesNav" href="/phones">Topic</a></li>--}}
                                    {{--<li id="upload">--}}
                                        {{--<a id="uploadNav" href="/admin/upload" class="">Notice</a>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}
                            {{--</nav>--}}
                        {{--</div>--}}
                    {{--</li>--}}
                {{--</ul>--}}

                {{--<ul class="nav navbar-nav navbar-right">--}}
                    {{--@if (Auth::guest())--}}
                        {{--<li><a href="{{ url('/login') }}">Login</a></li>--}}
                        {{--<li><a href="{{ url('/register') }}">Register</a></li>--}}
                    {{--@else--}}
                        {{--<li class="dropdown">--}}
                            {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">--}}
                                {{--{{ Auth::user()->name }} <span class="caret"></span>--}}
                            {{--</a>--}}

                            {{--<ul class="dropdown-menu" role="menu">--}}
                                {{--<li><a href="/changePassword">修改密码</a></li>--}}
                                {{--<li><a href="{{ url('/logout') }}">Logout</a></li>--}}
                            {{--</ul>--}}
                        {{--</li>--}}
                    {{--@endif--}}
                {{--</ul>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</nav>--}}


<nav class="navbar navbar-inverse navbar-fixed-top" style="height: 50px">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">个人管理系统</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse" style="float: left">
            <ul class="nav navbar-nav">
                <li class="active"><a href="/">主页</a></li>
                <li><a href="/posts">发表文章</a></li>
                <li><a href="#contact">个人总结</a></li>
            </ul>
        </div>

        <div style="float: right">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                            <li><a href="/changePassword">修改密码</a></li>
                            <li><a href="{{ url('/logout') }}">Logout</a></li>
                            {{--<li role="separator" class="divider"></li>--}}
                            {{--<li class="dropdown-header">Nav header</li>--}}
                            {{--<li><a href="#">Separated link</a></li>--}}
                            {{--<li><a href="#">One more separated link</a></li>--}}
                        @endif

                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>


