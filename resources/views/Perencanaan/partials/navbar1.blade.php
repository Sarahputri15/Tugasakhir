<nav class="navbar navbar-expand-lg navbar-dark bg-primary zindex" style="width: 100%; height:55px">
    <div class="container">
      <a class="navbar-brand" href="{{ url('/Dashboard') }}">Dashboard</a>
      <button class="navbar-toggler nav" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            @if(Request::is('Home/DIPA*'))

            <a class="nav-link dropdown-toggle {{Request::is('Home/DIPA*') ?'active':''}}" id="navbarDropdownMenuLink" data-bs-toggle="dropdown">
              Perencanaan
            </a>
            
            @elseif(Request::is('Home/RKKS*'))
  
            <a class="nav-link dropdown-toggle {{Request::is('Home/RKKS*') ?'active':''}}" id="navbarDropdownMenuLink" data-bs-toggle="dropdown">
              Perencanaan
            </a>
  
            @else
  
            <a class="nav-link dropdown-toggle {{Request::is('Home/pbj2*') ?'active':''}}" id="navbarDropdownMenuLink" data-bs-toggle="dropdown">
              Perencanaan
            </a>
  
            @endif
            <ul class="dropdown-menu dropdown-menu-dark bg-success">
              <li><a class="dropdown-item {{Request::is('Home/DIPA*') ?'active':''}}" href="{{ url('/Home/DIPA') }}">DIPA</a></li>
              <li><a class="dropdown-item {{Request::is('Home/RKKS*') ?'active':''}}" href="{{ url('/Home/RKKS') }}">RKKS</a></li>
              <li><a class="dropdown-item {{Request::is('Home/pbj2*') ?'active':''}}" href="{{ url('/Home/pbj2') }}">Usulan Pemaketan PBJ</a></li>
            </ul>
          </li>
        </ul>
      </div>
      <div class="justify-content-end">
        <div class="row">
          <ul class="col-3 navbar-nav collapse navbar-collapse" id="navbarNavDropdown">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-light fs-5" id="navbarDropdownMenuLink" data-bs-toggle="dropdown">
                <i class="bi bi-bell"></i>
                <span>Notifikasi</span>              
              </a>
              <ul class="dropdown-menu dropdown-menu-dark bg-success" id="isinotif" style="margin-left: -150%">
              </ul>
            </li>
          </ul>
          <form class="col-2 nav-link active collapse navbar-collapse" action="/Logout" method="post" id="navbarNavDropdown">
            @csrf
            <button class="navbar-brand bg-primary border-0" href="{{ url('/Login') }}">Logout <i class="bi bi-door-closed"></i></button>
          </form>
        </div>
      </div>      
    </div>
</nav>