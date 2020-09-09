<nav class="navbar navbar-expand-lg " color-on-scroll="500">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"> {{$navName}} </a>
        <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar burger-lines"></span>
            <span class="navbar-toggler-bar burger-lines"></span>
            <span class="navbar-toggler-bar burger-lines"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="nav navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="#" class="nav-link" data-toggle="dropdown">
                        <i class="nc-icon nc-palette"></i>
                        <span class="d-lg-none">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nc-icon nc-zoom-split"></i>
                        <span class="d-lg-block">&nbsp;Search</span>
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav   d-flex align-items-center">
                <li class="nav-item">
                    <a class="nav-link" href=" http://localhost/skill-institute/public/admin/profile ">
                        <span class="no-icon">Account</span>
                    </a>
                </li>
                <li class="nav-item">
                    <form id="logout-form" action="{{route('logout-peserta')}}"
                        method="POST">
                        @csrf
                        <a class="text-danger" href="{{route('logout-peserta')}}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Log out </a>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>