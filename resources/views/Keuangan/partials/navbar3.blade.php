<nav class="navbar navbar-expand-lg navbar-dark bg-primary" style="width: 100%; height:55px">
    <div class="container">
      <a class="navbar-brand" href="{{ url('/Dashboard_Keuangan') }}">Dashboard</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item dropdown ">
            <a class="nav-link " href="{{ url('/Home/Pembayarankeu1') }}" >Persiapan Kontrak</a>
          </li>
        </ul>
      </div>
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-light fs-5" id="navbarDropdownMenuLink" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            Notifikasi              
          </a>
          <ul class="dropdown-menu dropdown-menu-dark bg-success" id="isinotif" style="margin-left: -150%">
          </ul>
        </li>
      </ul>
      <form class="nav-link active" style="margin-right:-1.8%" action="/Logout" method="post">
        @csrf
        <button class="navbar-brand bg-primary border-0" href="{{ url('/Login') }}">Logout <i class="bi bi-door-closed"></i></button>
      </form>
    </div>
  </nav>