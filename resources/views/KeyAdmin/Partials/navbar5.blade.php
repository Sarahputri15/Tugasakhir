  <nav class="navbar navbar-expand-lg navbar-dark bg-primary" style="width: 100%; height:55px">
    <div class="container">
      <a class="navbar-brand" href="{{ url('User') }}">Data User</a>
      <form class="nav-link active" style="margin-right:-1.8%" action="/Logout" method="post">
        @csrf
        <button class="navbar-brand bg-primary border-0" href="{{ url('/Login') }}">Logout <i class="bi bi-door-closed"></i></button>
      </form>
    </div>
  </nav>