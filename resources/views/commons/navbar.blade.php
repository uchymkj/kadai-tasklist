<header>
    <nav class="navbar navbar-inverse navbar-static-top">
        <div class "container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <h3 style="color:white;">Tasklist</h3>
            </div>
            <div class"collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                    @if (Auth::check())
                        <li>{!! link_to_route('tasklists.create', '新規タスクの投稿') !!}</li>
                        <li>{!! link_to_route('tasklists.index', 'タスク一覧') !!}</li>
                            <!--<ul class="nav navbar-nav navbar-right">-->
                                <!--<li role="separator" class="divider"></li>-->
                        <li>{!! link_to_route('logout.get', 'Logout') !!}</li>
                    </ul>
                
                    @else
                        <li>{!! link_to_route('signup.get', 'Signup') !!}</li>
                        <li>{!! link_to_route('login.get', 'Login') !!}</li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>