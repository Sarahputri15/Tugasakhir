@extends('Keuangan.layout.main')

@section('container')
<div class="row my-3 justify-content-start">
  <div class="col-2 card text-bg-secondary mx-3" style="width: 14rem; height:140px">
    <div class="card-header">Total Data</div>
    <div class="card-body">
      <h6 class="card-title">Persiapan Kontrak:</h6>
      <h5 class="card-text">{{ $hitung3 }}</h5>
    </div>
  </div>
  <div class="col-2 card text-bg-secondary mx-3" style="width: 14rem; height:140px">
    <div class="card-header">Total Data</div>
    <div class="card-body">
      <h6 class="card-title">Realisasi Pembayaran:</h6>
      <h5 class="card-text">Rp. {{ number_format($pembayaran,1) }}</h5>
    </div>
  </div>
</div>
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
    <h4 class="h2">Tabel Persiapan Kontrak</h4>
  </div>
  <div class="justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
  <table class="table table-sm table-bordered" id="myTable">
      <thead>
        <tr>
          <th scope="col">no</th>
          <th scope="col">Judul Kontrak</th>
          <th scope="col">Penyedia</th>
          <th scope="col">Nilai Kontrak</th>
          <th scope="col">Status</th>
          <th scope="col">Kode Akun</th>
          <th scope="col">Keterangan</th>
        </tr>
      </thead>
      <tbody>
        @foreach($keuangans as $k)
        @if($current > $k->akhir)
        <tr class="table-danger">
          <td scope="row">{{ $loop->iteration }}</td>
          <td>{{ $k->judul }}</td>
          <td>{{ $k->penyedia }}</td>
          <td>{{ $k->nilai_kontrak }}</td>
          <td>{{ $k->status }}</td>
          <td>{{ $k->akun }}</td>
          <td class="text-danger">Melebihi tanggal akhir kontrak <i class="bi bi-exclamation-diamond-fill"></i></td>
        </tr>
        @else
        <tr>
          <td scope="row">{{ $loop->iteration }}</td>
          <td>{{ $k->judul }}</td>
          <td>{{ $k->penyedia }}</td>
          <td>{{ $k->nilai_kontrak }}</td>
          <td>{{ $k->status }}</td>
          <td>{{ $k->akun }}</td>
          <td></td>
        </tr>
        @endif
        @endforeach
      </tbody>
    </table>
  </div>
@endsection