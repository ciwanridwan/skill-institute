<header>
    <!-- Header Start -->
    <div class="header-area">
        <div class="main-header header-sticky">
            <div class="container-fluid">
                <div class="menu-wrapper">
                    <!-- Logo -->
                    <div class="logo">
                        <!-- <a href="index.html"><img src="assets/img/logo/logo.png" alt=""></a> -->
                        <a href="#">Skill Institute</a>
                    </div>
                    <!-- Main-menu -->
                    <div class="main-menu d-none d-lg-block">
                        <nav>
                            <ul id="navigation">
                                <li><a href="{{url('/')}}">Home</a></li>
                                <li class="hot"><a href="{{route('trainings-index')}}">Pelatihan</a>
                                    <ul class="submenu">
                                        <li><a href="{{route('training-online')}}">Pelatihan online</a></li>
                                        <li><a href="{{route('training-offline')}}"> Pelatihan offline</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{route('webinar')}}">Webinar</a></li>
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                    <!-- Header Right -->
                    <div class="header-right">
                        <ul>
                            <li>
                                <div class="nav-search search-switch">
                                    <span class="flaticon-search"></span>
                                </div>
                            </li>
                            @if (auth()->guard('peserta')->check())
                            <li><a href="{{ route('dashboard-peserta') }}" style="color: red">Dashboard</a></li>
                            <form id="logout-form" action="{{route('logout-peserta')}}" method="POST">
                                @csrf
                                <a class="text-danger" href="{{route('logout-peserta')}}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Log out </a>
                            </form>
                            @else
                            <li> <a href="{{route('login-peserta')}}"><span class="flaticon-user"></span></a></li>
                            @endif
                        </ul>
                    </div>
                </div>
                <!-- Mobile Menu -->
                <div class="col-12">
                    <div class="mobile_menu d-block d-lg-none"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>