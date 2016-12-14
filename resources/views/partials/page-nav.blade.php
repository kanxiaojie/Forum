

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


