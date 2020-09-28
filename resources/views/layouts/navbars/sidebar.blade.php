<div class="sidebar" data-image="{{ asset('light-bootstrap/img/sidebar-5.jpg') }}">
    <!--
Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

Tip 2: you can also add an image using data-image tag
-->
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="{{url('/')}}" class="simple-text">
                {{ __("SKILL INSTITUTE") }}
            </a>
        </div>
        <ul class="nav">
            <li class="nav-item @if($activePage == 'dashboard') active @endif">
                <a class="nav-link" href="{{route('dashboard')}}">
                    <i class="nc-icon nc-chart-pie-35"></i>
                    <p>{{ __("Dashboard") }}</p>
                </a>
            </li>
           
            {{-- PESERTA --}}
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#peserta" @if($activeButton =='peserta') aria-expanded="true" @endif>
                    <i>
                        <img src="{{ asset('light-bootstrap/img/laravel.svg') }}" style="width:25px">
                    </i>
                    <p>
                        {{ __('Peserta') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse @if($activeButton =='peserta') show @endif" id="peserta">
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

            {{-- Kategori dan Level --}}
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#kategori-level" @if($activeButton =='kategori-level') aria-expanded="true" @endif>
                    <i>
                        <img src="{{ asset('light-bootstrap/img/laravel.svg') }}" style="width:25px">
                    </i>
                    <p>
                        {{ __('Kategori Dan Level') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse @if($activeButton =='kategori-level') show @endif" id="kategori-level">
                    <ul class="nav">
                        <li class="nav-item @if($activePage == 'create-level') active @endif">
                            <a class="nav-link" href="{{route('create-level')}}">
                                <i class="nc-icon nc-circle-09"></i>
                                <p>{{ __("Tambah Level") }}</p>
                            </a>
                        </li>
                        <li class="nav-item @if($activePage == 'table-level') active @endif">
                            <a class="nav-link" href="{{route('table-level')}}">
                                <i class="nc-icon nc-single-02"></i>
                                <p>{{ __("List Level") }}</p>
                            </a>
                        </li>
                        <li class="nav-item @if($activePage == 'create-kategori') active @endif">
                            <a class="nav-link" href="{{route('create-kategori')}}">
                                <i class="nc-icon nc-notes"></i>
                                <p>{{ __("Tambah Kategori") }}</p>
                            </a>
                        </li>
                        <li class="nav-item @if($activePage == 'table-kategori') active @endif">
                            <a class="nav-link" href="{{route('table-kategori')}}">
                                <i class="nc-icon nc-notes"></i>
                                <p>{{ __("List Kategori") }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

             {{-- Pelatihan --}}
             <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#training" @if($activeButton =='training') aria-expanded="true" @endif>
                    <i>
                        <img src="{{ asset('light-bootstrap/img/laravel.svg') }}" style="width:25px">
                    </i>
                    <p>
                        {{ __('Pelatihan') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse @if($activeButton =='training') show @endif" id="training">
                    <ul class="nav">
                        <li class="nav-item @if($activePage == 'training') active @endif">
                            <a class="nav-link" href="{{route('data-training')}}">
                                <i class="nc-icon nc-single-02"></i>
                                <p>{{ __("Semua Pelatihan") }}</p>
                            </a>
                        </li>
                        <li class="nav-item @if($activePage == 'create-training') active @endif">
                            <a class="nav-link" href="{{route('create-training')}}">
                                <i class="nc-icon nc-circle-09"></i>
                                <p>{{ __("Tambah Pelatihan") }}</p>
                            </a>
                        </li>
            
                        <li class="nav-item @if($activePage == 'publish-training') active @endif">
                            <a class="nav-link" href="{{route('publish-training')}}">
                                <i class="nc-icon nc-notes"></i>
                                <p>{{ __("Published Training") }}</p>
                            </a>
                        </li>

                        <li class="nav-item @if($activePage == 'populer-pelatihan') active @endif">
                            <a class="nav-link" href="{{route('popular-training')}}">
                                <i class="nc-icon nc-notes"></i>
                                <p>{{ __("Pelatihan Terpopuler") }}</p>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>

             {{-- Voucher Pelatihan --}}
             <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#voucher" @if($activeButton =='voucher') aria-expanded="true" @endif>
                    <i>
                        <img src="{{ asset('light-bootstrap/img/laravel.svg') }}" style="width:25px">
                    </i>
                    <p>
                        {{ __('Voucher') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse @if($activeButton =='voucher') show @endif" id="voucher">
                    <ul class="nav">
                        <li class="nav-item @if($activePage == 'create-voucher') active @endif">
                            <a class="nav-link" href="{{route('create-voucher')}}">
                                <i class="nc-icon nc-single-02"></i>
                                <p>{{ __("Tambah Voucher") }}</p>
                            </a>
                        </li>
                        <li class="nav-item @if($activePage == 'used-voucher') active @endif">
                            <a class="nav-link" href="{{route('used-voucher')}}">
                                <i class="nc-icon nc-circle-09"></i>
                                <p>{{ __("Voucher Terpakai") }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

              {{-- WEBINAR --}}
              <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#webinar" @if($activeButton =='webinar') aria-expanded="true" @endif>
                    <i>
                        <img src="{{ asset('light-bootstrap/img/laravel.svg') }}" style="width:25px">
                    </i>
                    <p>
                        {{ __('Webinar') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse @if($activeButton =='webinar') show @endif" id="webinar">
                    <ul class="nav">
                        <li class="nav-item @if($activePage == 'webinar') active @endif">
                            <a class="nav-link" href="{{route('table-webinar')}}">
                                <i class="nc-icon nc-single-02"></i>
                                <p>{{ __("Semua Webinar") }}</p>
                            </a>
                        </li>
                        <li class="nav-item @if($activePage == 'create-webinar') active @endif">
                            <a class="nav-link" href="{{route('create-webinar')}}">
                                <i class="nc-icon nc-circle-09"></i>
                                <p>{{ __("Tambah Webinar") }}</p>
                            </a>
                        </li>

                        <li class="nav-item @if($activePage == 'publish-webinar') active @endif">
                            <a class="nav-link" href="{{route('publish-index-webinar')}}">
                                <i class="nc-icon nc-circle-09"></i>
                                <p>{{ __("Publish Webinar") }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

        </ul>
    </div>
</div>
