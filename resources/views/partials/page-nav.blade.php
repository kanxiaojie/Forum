<nav class="navbar navbar-default navbar-fixed-top">
    <div class="aw-top-menu-wrap">
        <div class="container">

            <div class="navbar-header">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">LaravelForum</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav">
                    <li>
                        <a href="/contact">Contact</a>
                    </li>
                </ul>
            </div>

            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <div class="aw-search-box  hidden-xs hidden-sm">
                            <form class="navbar-search" action="" id="global_search_form" method="post">
                                <div class="form-inline">
                                    <input class="form-control" type="text" placeholder="Search Keyword" id="aw-search-query">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </li>
                    <li>
                        <div class="aw-top-nav navbar">
                            <div class="navbar-header">
                                <button class="navbar-toggle pull-left">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <nav role="navigation" class="collapse navbar-collapse bs-navbar-collapse">
                                <ul class="nav navbar-nav">
                                    <li><a href="/areas"><i class="icon icon-home"></i>Dynamic</a></li>
                                    <li><a href="/posts" class="active"><i class="icon icon-ul"></i> Find</a></li>
                                    <li><a href="/phones"><i class="icon icon-topic"></i> Topic</a></li>
                                    <li>
                                        <a href="/admin/upload" class=""><i class="icon icon-bell"></i> Notice</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>
</nav>