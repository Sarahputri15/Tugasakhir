@extends('Pengadaan.layout.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom container">
  <h1 class="h2">{{ $title }}</h1>
</div>
<div class="container">
  <a href="/Home/Pembayaran1" class="btn btn-primary me-3 my-3"><i class="bi bi-chevron-left"></i> kembali</a>
  <a href="#" class="btn btn-success my-3">Unduh <i class="bi bi-file-arrow-down"></i></a>
  <a href="/Home/Pembayaran/print" class="btn btn-success my-3 ms-3"><i class="bi bi-printer"></i> Cetak</a>
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <table class="table table-striped table-sm table-bordered">
      <thead>
        <tr>
          <th scope="col" rowspan="2">no</th>
          <th scope="col" rowspan="2">Nomor Kontrak</th>
          <th scope="col" rowspan="2">Judul</th>
          <th scope="col" colspan="2">Masa Kontrak</th>
          <th scope="col" rowspan="2">Penyedia</th>
          <th scope="col" rowspan="2">Nilai Kontrak</th>
          <th scope="col" rowspan="2">Sumber Dana</th>
          <th scope="col" rowspan="2">Status</th>
          <th scope="col" rowspan="2">% Realisasi Pekerjaan</th>
          <th scope="col" rowspan="2">%Realisasi Pembayaran</th>
        </tr>
        <th scope="col">Awal</th>
        <th scope="col">Akhir</th>
      </thead>
      <tbody>
        <tr>
          <td scope="row">baris 1</td>
          <td>baris 2</td>
          <td>baris 3</td>
          <td>baris 4</td>
          <td>baris 5</td>
          <td>baris 6</td>
          <td>baris 7</td>
          <td>baris 8</td>
          <td>baris 9</td>
          <td>baris 10</td>
          <td>baris 11</td>
        </tr>
        <tr>
          <td scope="row">baris 1</td>
          <td>baris 2</td>
          <td>baris 3</td>
          <td>baris 4</td>
          <td>baris 5</td>
          <td>baris 6</td>
          <td>baris 7</td>
          <td>baris 8</td>
          <td>baris 9</td>
          <td>baris 10</td>
          <td>baris 11</td>
        </tr>
        <tr>
          <td scope="row">baris 1</td>
          <td>baris 2</td>
          <td>baris 3</td>
          <td>baris 4</td>
          <td>baris 5</td>
          <td>baris 6</td>
          <td>baris 7</td>
          <td>baris 8</td>
          <td>baris 9</td>
          <td>baris 10</td>
          <td>baris 11</td>
        <tr>
          <td scope="row" colspan="9">TOTAL</td>
          <td class="text-success">%</td>
          <td class="text-success">%</td>
      </tr>
      </tbody>
    </table>
  </div>
</div>
@endsection