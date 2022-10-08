<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body>
    <h1 class="text-center mt-3">Daftar Paket Pengadaan Barang dan Jasa</h1>
    <div class="flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom mx-auto" style="width:900px;">
      <table class="table table-striped table-sm table-bordered">
          <thead>
            <tr>
              <th class="col-1" scope="col">no</th>
              <th scope="col">Paket PBJ</th>
              <th scope="col">ID RUP</th>
              <th scope="col">MAK</th>
              <th scope="col">Pagu</th>
              <th scope="col">Metode Pengadaan</th>
            </tr>
          </thead>
          <tbody>
            @foreach($pbj as $p)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $p->paket }}</td>
              <td>{{ $p->rup }}</td>
              <td>{{ $p->mak }}</td>
              <td>{{ $p->pagu }}</td>
              <td>{{ $p->metode }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>