<div class="sidebar" data-image="{{ asset('light-bootstrap/img/sidebar-5.jpg') }}">
    <!--
Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

Tip 2: you can also add an image using data-image tag
-->
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="http://www.creative-tim.com" class="simple-text">
                {{ __("Creative Tim") }}
            </a>
        </div>
        <ul class="nav">
            <li class="nav-item @if($activePage == 'dashboard') active @endif">
                <a class="nav-link" href="{{route('dashboard')}}">
                    <i class="nc-icon nc-chart-pie-35"></i>
                    <p>{{ __("Dashboard") }}</p>
                </a>
            </li>
           
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#laravelExamples" @if($activeButton =='laravel') aria-expanded="true" @endif>
                    <i>
                        <img src="{{ asset('light-bootstrap/img/laravel.svg') }}" style="width:25px">
                    </i>
                    <p>
                        {{ __('Data Peserta') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse @if($activeButton =='laravel') show @endif" id="laravelExamples">
                    <ul class="nav">
                        <li class="nav-item @if($activePage == 'data-peserta') active @endif">
                            <a class="nav-link" href="{{route('data-peserta')}}">
                                <i class="nc-icon nc-single-02"></i>
                                <p>{{ __("Semua Peserta") }}</p>
                            </a>
                        </li>
                        <li class="nav-item @if($activePage == 'subscribed-peserta') active @endif">
                            <a class="nav-link" href="{{route('subscribed-peserta')}}">
                                <i class="nc-icon nc-circle-09"></i>
                                <p>{{ __("Subscribed") }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            {{-- <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#laravelExamples" @if($activeButton =='laravel') aria-expanded="true" @endif>
                    <i>
                        <img src="{{ asset('light-bootstrap/img/laravel.svg') }}" style="width:25px">
                    </i>
                    <p>
                        {{ __('Pelatihan') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse @if($activeButton =='laravel') show @endif" id="laravelExamples">
                    <ul class="nav">
                        <li class="nav-item @if($activePage == 'data-peserta') active @endif">
                            <a class="nav-link" href="{{route('data-peserta')}}">
                                <i class="nc-icon nc-single-02"></i>
                                <p>{{ __("Semua Peserta") }}</p>
                            </a>
                        </li>
                        <li class="nav-item @if($activePage == 'subscribed-peserta') active @endif">
                            <a class="nav-link" href="{{route('subscribed-peserta')}}">
                                <i class="nc-icon nc-circle-09"></i>
                                <p>{{ __("Subscribed") }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li> --}}

            <li class="nav-item @if($activePage == 'table') active @endif">
                <a class="nav-link" href="{{route('page.index', 'table')}}">
                    <i class="nc-icon nc-notes"></i>
                    <p>{{ __("Table List") }}</p>
                </a>
            </li>

            <li class="nav-item @if($activePage == 'products-details') active @endif">
                <a class="nav-link" href="{{route('product-details')}}">
                    <i class="nc-icon nc-notes"></i>
                    <p>{{ __("Produk") }}</p>
                </a>
            </li>

            
            <li class="nav-item @if($activePage == 'webinar') active @endif">
                <a class="nav-link" href="{{route('table-webinar')}}">
                    <i class="nc-icon nc-notes"></i>
                    <p>{{ __("Data Webinar") }}</p>
                </a>
            </li>

            <li class="nav-item @if($activePage == 'create-webinar') active @endif">
                <a class="nav-link" href="{{route('create-webinar')}}">
                    <i class="nc-icon nc-notes"></i>
                    <p>{{ __("Create Webinar") }}</p>
                </a>
            </li>

        </ul>
    </div>
</div>
