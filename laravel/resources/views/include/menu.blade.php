<div class="navigation-wrap" id="filters">
    <nav class="navbar navbar-expand-lg navbar-light"> <a class="navbar-brand" href="#">Menu</a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <button class="close-toggler" type="button" data-toggle="offcanvas"> <span><i class="fas fa-times-circle" aria-hidden="true"></i></span> </button>
        <ul class="navbar-nav mr-auto">
        <li class="nav-item"> <a class="nav-link" href="{{url('')}}">Home</a> </li>
        <li class="nav-item"><a class="nav-link" href="{{url('syarat')}}">Persyaratan</a></li>
        @guest
        <li class="nav-item"><a class="nav-link" href="{{url('pendaftaran')}}">Pendaftaran</a></li>
        @endguest
        @auth
            @if(Auth::user()->level==1 || Auth::user()->level==3)
                <li class="nav-item"><a class="nav-link" href="classes.html">Data</a> <i class="fas fa-caret-down"></i>
                  <ul class="submenu">
                    <li><a href="{{url('data/pendaftaran')}}">Pendaftaran</a></li>
                    <li><a href="{{url('data/pembayaran')}}">Pembayaran</a></li>
                    <li><a href="{{url('data/jadwal')}}">Jadwal Interview</a></li>
                  </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="{{url('user')}}">User</a></li>
            @elseif(Auth::user()->level==2)
                <li class="nav-item"><a class="nav-link" href="{{url('pendaftaran')}}">Pendaftaran</a></li>
                <li class="nav-item"><a class="nav-link" href="{{url('pesertadidik')}}">Peserta Didik</a></li>
            @endif
        @endauth
        </ul>
    </div>
    </nav>
</div>
