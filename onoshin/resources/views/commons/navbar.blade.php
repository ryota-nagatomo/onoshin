<header>
    <nav class="navbar navbar-original navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-left" href="/"><img src="{{ secure_asset("images/logo2.jpg") }}" alt="onoshin"></a>
            </div>
            <div class="collapse navbar-collapse navbar_original" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::check())

                        <!--<li>-->
                        <!--    <a href= "{{ route('users.index')}}" class="jet">-->
                        <!--    Users-->
                        <!--    </a>-->
                        <!--</li>-->
                        <li>

                            <a href= "{{ route('goals.search')}}" class="jet">
                                <span class = "glyphicon glyphicon-search" area-hidden="true"></span>
                                search for Goals
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('goals.review') }}" class="jet">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                Goals (review&add)
                            </a>
                        </li>
                        

                        <li>
                            <a href="{{ route('ranking.good') }}" class="jet">
                                <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                                Keeps
                            </a>

                        </li>
                        
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle jet" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <span class="gravatar">
                                    <img src="{{ Gravatar::src(Auth::user()->name, 20) . '&d=mm' }}" alt="" class="img-circle">
                                </span>
                                {{ Auth::user()->name }}
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>{!! link_to_route('users.show', 'My profile', ['id' => Auth::id()]) !!}</li>
                                <!--<li>{!! link_to_route('users.collection, 'Kinoko Collection, ['id' => Auth::id()]) !!} </li>-->
                                <li role="separator" class="divider"></li>
                                <li>{!! link_to_route('logout.get', 'Logout') !!}</li>
                            </ul>
                        </li>
                    @else
                        <li><a href="{{ route('signup.get') }}"  class="jet">sign up</a></li>
                        <li><a href="{{ route('login') }}" class="jet">login</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>