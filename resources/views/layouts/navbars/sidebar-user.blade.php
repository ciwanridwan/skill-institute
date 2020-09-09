<div class="sidebar" data-image="http://localhost/skill-institute/public/light-bootstrap/img/sidebar-5.jpg">
    <!--
 Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"
 
 Tip 2: you can also add an image using data-image tag
 -->
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text">
                Creative Tim
            </a>
        </div>
        <ul class="nav">
            <li class="nav-item @if($activePage == 'dashboard') active @endif">
                <a class="nav-link" href="{{route('dashboard-peserta')}}">
                    <i class="nc-icon nc-chart-pie-35"></i>
                    <p>Dashboard</p>
                </a>
            </li>

            <li class="nav-item @if($activePage == 'user') active @endif">
                <a class="nav-link" href="{{route('edit-peserta')}}">
                    <i class="nc-icon nc-chart-pie-35"></i>
                    <p>Profile</p>
                </a>
            </li>

            {{-- <li class="nav-item @if($activePage == 'pelatihan') active @endif">
                <a class="nav-link" href="#">
                    <i class="nc-icon nc-chart-pie-35"></i>
                    <p>Pelatihan</p>
                </a>
            </li> --}}

            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#peserta" @if($activeButton =='pelatihan') aria-expanded="true" @endif>
                    <i>
                        <img src="{{ asset('light-bootstrap/img/laravel.svg') }}" style="width:25px">
                    </i>
                    <p>
                        {{ __('Pelatihan') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse @if($activeButton =='pelatihan') show @endif" id="peserta">
                    <ul class="nav">
                        <li class="nav-item @if($activePage == 'training') active @endif">
                            <a class="nav-link" href="{{route('user-training')}}">
                                <i class="nc-icon nc-single-02"></i>
                                <p>{{ __("Pelatihan Saya") }}</p>
                            </a>
                        </li>
                        <li class="nav-item @if($activePage == 'history') active @endif">
                            <a class="nav-link" href="{{route('history-training')}}">
                                <i class="nc-icon nc-circle-09"></i>
                                <p>{{ __("Riwayat") }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item @if($activePage == 'webinar') active @endif">
                <a class="nav-link" href="{{ route('user-webinar')}}">
                    <i class="nc-icon nc-chart-pie-35"></i>
                    <p>Webinar</p>
                </a>
            </li>

        </ul>
    </div>
</div>