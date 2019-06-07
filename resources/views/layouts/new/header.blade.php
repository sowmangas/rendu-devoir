<header id="header">
    <section class="wrap-top clearfix">
        <div class="container">
            <ul class="list-inline  mobile-hide list-social">
                <li><a href="#" class="social-btn-top"> <i class="fa fa-facebook"></i> </a></li>
                <li><a href="#" class="social-btn-top"> <i class="fa fa-twitter"></i> </a></li>
                <li><a href="#" class="social-btn-top"> <i class="fa fa-youtube"></i> </a></li>
            </ul>

            <ul class="list-inline list-contact">
                <li><i class="fa fa-phone"></i> &nbsp +224 620 00 00 00</li>
                <li><i class="fa fa-envelope"></i> &nbsp http://www.rendudevoir-upicardie.com</li>
            </ul>
        </div>
    </section>

    <!-- container start -->
    <div class="container">

        <div class="row">
            <div class="col-sm-4">
                @granted(\App\Enum\UserRole::ADMIN)
                <!-- brand -->
                <a class="brand" href="{{ route('admin.users.index') }}">
                    <img src="https://extra.u-picardie.fr/moodle/upjv/pluginfile.php/1/core_admin/logocompact/0x70/1553712355/Logo_UPJV_navbar.png" class="logo" title="Site logo"/>
                    <div class="logo-text-wrap">
                        <h1 class="sitename">{{ env('APP_NAME') }}</h1>
{{--                        <h2 class="slogan">Notre futur slogan ici</h2>--}}
                    </div>
                </a>
                <!-- brand// -->
                @else
                <!-- brand -->
                <a class="brand" href="{{ url('/home') }}">
                    <img src="https://extra.u-picardie.fr/moodle/upjv/pluginfile.php/1/core_admin/logocompact/0x70/1553712355/Logo_UPJV_navbar.png" class="logo" title="Site logo"/>
                    <div class="logo-text-wrap">
                        <h1 class="sitename">{{ env('APP_NAME') }}</h1>
{{--                        <h2 class="slogan">Notre futur slogan ici</h2>--}}
                    </div>
                </a>
                <!-- brand// -->
                @endgranted
            </div>

            <div class="col-sm-8">

                <!-- navbar -->
                <nav id="navbar" class="navbar navbar-default pull-right" role="navigation">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target="#navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <!--  <a class="navbar-brand" href="#">Home</a> -->
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                            @granted(\App\Enum\UserRole::PROF)
                            <li class="{{ setActiveRoot('prof.devoirs.create') }}">

                                <a href="{{ route('prof.devoirs.create') }}">{{ __('Création d\'un devoir') }}</a>

                            </li>
                            @endgranted

                            {{-- Condition pour verifier si l'utilisateur est connecter sur notre application --}}
                            @guest
                                <li class="{{ setActiveRoot('login') }}">
                                    <a href="{{ route('login') }}">
                                        {{ __('Login') }}
                                    </a>
                                </li>
                            @else
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        {{ Auth::user()->nom }} {{ Auth::user()->role }}
                                        <b class="caret"></b>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                {{ __('Déconnexion') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            @endguest
                            {{-- ./ END Condition pour verifier si l'utilisateur est connecter sur notre application --}}
                        </ul>

{{--                        <ul class="nav navbar-nav navbar-right">--}}
{{--                            <li class="dropdown">--}}
{{--                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">--}}
{{--                                    <i class="glyphicon glyphicon-search"></i>--}}
{{--                                </a>--}}
{{--                                <ul class="dropdown-menu">--}}
{{--                                    <li>--}}
{{--                                        <!-- search form -->--}}
{{--                                        <form method="POST" class="navbar-form" role="search">--}}
{{--                                            {{ csrf_field() }}--}}

{{--                                            <div class="input-group">--}}
{{--                                                <input type="text" name="search" placeholder="Rechercher" class="form-control">--}}
{{--                                                <span class="input-group-btn">--}}
{{--                                                    <button class="btn btn-info" type="submit">--}}
{{--                                                        <i class="glyphicon glyphicon-search"></i>--}}
{{--                                                    </button>--}}
{{--                                                </span>--}}
{{--                                            </div>--}}
{{--                                        </form>--}}
{{--                                        <!-- search form // -->--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
                    </div><!-- /.navbar-collapse -->
                </nav><!-- navbar // -->
            </div><!-- col //  -->
        </div><!-- row //  -->
    </div><!-- container //  -->
</header>
<!-- header //  -->
