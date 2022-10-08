<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    @yield('css')
  </head>
  <body>
    @auth
    <div class="row zindex" style="height:55px;">
      <div class="col-7">
        <div class="mx-2" style="float:left;">
          <img style="height:40px; margin-top: 8px; " src="/gambar/Lambang_ITK.png" alt="Lambang ITK">
        </div>  
        <h3 class="mt-3" ><span class="text-success float:left;">SIM</span><span class="text-primary">PBJ</span></</h3>
      </div>
      <div class="col-5 text-end" style="margin-top: 13px;">
        <h3 class="me-2 textt">{{ auth()->user()->name }}</h3>
      </div>
    </div>
    @endauth
    @include('KeyAdmin.partials.navbar5')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <div class="container">
      @yield('container')
    </div>
      <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
      <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
      <script>
        $(document).ready( function () {
          $('#myTable').DataTable();
        } );
      </script>
    </body>
</html>