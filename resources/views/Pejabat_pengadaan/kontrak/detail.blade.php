@extends('Pejabat_pengadaan.layout.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom container">
  <h1 class="h2 ">{{ $title }}</h1>
</div>
<div class="container">
  <a href="{{ url('pesanan') }}" class="btn btn-primary my-3"><i class="bi bi-chevron-left"></i> Kembali</a>
  <div class="justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <table class="table table-striped table-sm table-bordered">
      <thead>
        <tr>
          <th scope="col">no</th>
          <th scope="col">Judul Pesanan</th>
          <th scope="col">Catatan</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th>1</th>
          <td>{{ $pesanan->judul }}</td>
          <td>{{ $pesanan->catatan }}</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
@endsection