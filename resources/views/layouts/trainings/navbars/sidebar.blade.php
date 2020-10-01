<div class="sidebar" data-image="http://localhost/skill-institute/public/light-bootstrap/img/sidebar-5.jpg">
    <!--
 Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"
 
 Tip 2: you can also add an image using data-image tag
 -->
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="{{url('/')}}" class="simple-text">
                SKILL INSTITUTE
            </a>
        </div>
        <ul class="nav">
            <li class="nav-item @if($activePage == 'dashboard') active @endif">
                <a class="nav-link" href="#">
                    <i class="nc-icon nc-chart-pie-35"></i>
                    <p>Dashboard Trainings</p>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#materi" @if($activeButton=='materi' )
                    aria-expanded="true" @endif>
                    <i>
                        <img src="{{ asset('light-bootstrap/img/laravel.svg') }}" style="width:25px">
                    </i>
                    <p>
                        {{ __('Materi') }}
                        <b class="caret"></b>
                    </p>
                </a>

                <div class="collapse @if($activeButton =='materi') show @endif" id="materi">
                    <ul class="nav">
                        @foreach ($pelatihan as $item)
                        @foreach ($item->materis as $p)
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('dashboard-pelatihan', $p->id)}}">
                                <i class="nc-icon nc-single-02"></i>
                                <p>{{$p->judul}}</p>
                            </a>
                        </li>
                        @endforeach
                        @endforeach
                    </ul>
                </div>
            </li>

        </ul>
    </div>
</div>