<nav class="navbar navbar-default navbar-fixed-top">
    <div class="aw-top-menu-wrap">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">LaravelForum</a>
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
                                    <li><a href="/"><i class="icon icon-home"></i>Dynamic</a></li>
                                    <li><a href="/posts" class="active"><i class="icon icon-ul"></i> Find</a></li>
                                    <li><a href="/"><i class="icon icon-topic"></i> Topic</a></li>
                                    <li>
                                        <a href="/" class=""><i class="icon icon-bell"></i> Notice</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </li>
                </ul>

                @if(Auth::check())
                    <p class="navbar-text navbar-right">
                        Hello,{{ Auth::user()->name }}
                    </p>
                @endif
            </div><!--/.nav-collapse -->
        </div>
    </div>
</nav>