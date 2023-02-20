<nav class="navbar navbar-expand-lg navbar-dark bg-primary" style="width: 100%; height:55px">
  <div class="container">
    <a class="navbar-brand" href="{{ url('/Dashboard_Pengadaan') }}">Dashboard</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          @if(Request::is('Home/DIPA2*'))

          <a class="nav-link dropdown-toggle {{Request::is('Home/DIPA2*') ?'active':''}}" id="navbarDropdownMenuLink" data-bs-toggle="dropdown">
            Persiapan Pengadaan
          </a>
          
          @elseif(Request::is('Home/RKKS2*'))

          <a class="nav-link dropdown-toggle {{Request::is('Home/RKKS2*') ?'active':''}}" id="navbarDropdownMenuLink" data-bs-toggle="dropdown">
            Persiapan Pengadaan
          </a>

          @else

          <a class="nav-link dropdown-toggle {{Request::is('Home/pbj*') ?'active':''}}" id="navbarDropdownMenuLink" data-bs-toggle="dropdown">
            Persiapan Pengadaan
          </a>

          @endif
          <ul class="dropdown-menu dropdown-menu-dark bg-success">
            <li><a class="dropdown-item {{Request::is('Home/DIPA2*') ?'active':''}}" href="{{ url('/Home/DIPA2') }}">DIPA</a></li>
            <li><a class="dropdown-item {{Request::is('Home/RKKS2*') ?'active':''}}" href="{{ url('/Home/RKKS2') }}">RKKS</a></li>
            <li><a class="dropdown-item {{Request::is('Home/pbj*') ?'active':''}}" href="{{ url('/Home/pbj') }}">Usulan Pemaketan PBJ</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link {{Request::is('Home/Pembayaran1*') ?'active':''}}" href="{{ url('/Home/Pembayaran1') }}" >Persiapan Kontrak</a>
        </li>
        <li class="nav-item dropdown ">
          <a class="nav-link {{Request::is('Home/pesanan*') ?'active':''}}" href="{{ url('/Home/pesanan') }}">Surat Pesanan</a>
        </li>
      </ul>
    </div>
    <ul class="navbar-nav" id="navbarNavDropdown">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-light fs-5" id="navbarDropdownMenuLink" data-bs-toggle="dropdown">
          <i class="bi bi-bell"></i>
            Notifikasi             
        </a>
        <ul class="dropdown-menu dropdown-menu-dark bg-success" id="isinotif" style="margin-left: -150%">
        </ul>
      </li>
    </ul>
    <form class="nav-link active" style="margin-right:-1.8%" action="/Logout" method="post" id="navbarNavDropdown">
      @csrf
      <button class="navbar-brand bg-primary border-0" href="{{ url('/Login') }}">Logout <i class="bi bi-door-closed"></i></button>
    </form>
  </div>
</nav>