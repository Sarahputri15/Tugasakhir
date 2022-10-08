@extends('Pengadaan.layout.main')

@section('container')
<div class="container">
  <div style="overflow: auto">
    <div class="row my-3 justify-content-start pb-3" style="width: 160%">
      <div class="col-2 card text-bg-secondary mx-3" style="width: 15rem; height:140px">
        <div class="card-header">Total Data</div>
        <div class="card-body">
          <h6 class="card-title">Realisasi Pekerjaan: </h6>
          <h5 class="card-text">{{ number_format($pekerjaan,1) }}%</h5>
        </div>
      </div>
      <div class="col-2 card text-bg-secondary mx-3" style="width: 15rem; height:140px">
        <div class="card-header">Total Data</div>
        <div class="card-body">
          <h6 class="card-title">Realisasi Pembayaran: </h6>
          <h5 class="card-text">Rp.{{ number_format($pembayaran, '0','.','.') }}</h5>
        </div>
      </div>
      <div class="col-2 card text-bg-secondary mx-3" style="width: 11rem; height:140px">
        <div class="card-header" style="width:100%">Total Data</div>
        <div class="card-body">
          <h6 class="card-title">DIPA:</h6>
          <h5 class="card-text">{{ $hitung1 }}</h5>
        </div>
      </div>
      <div class="col-2 card text-bg-secondary mx-3" style="width: 11rem; height:140px">
        <div class="card-header">Total Data</div>
        <div class="card-body">
          <h6 class="card-title">RKKS:</h6>
          <h5 class="card-text">{{ $hitung2 }}</h5>
        </div>
      </div>
      <div class="col-2 card text-bg-secondary mx-3" style="width: 11rem; height:140px">
        <div class="card-header">Total Data</div>
        <div class="card-body">
          <h6 class="card-title">Surat Pesanan:</h6>
          <h5 class="card-text">{{ $hitung4 }}</h5>
        </div>
      </div>
      <div class="col-2 card text-bg-secondary mx-3" style="width: 13rem; height:140px">
        <div class="card-header">Total Data</div>
        <div class="card-body">
          <h6 class="card-title">Persiapan Kontrak:</h6>
          <h5 class="card-text">{{ $hitung3 }}</h5>
        </div>
      </div>
      <div class="col-2 card text-bg-secondary mx-3" style="width: 15rem; height:140px">
        <div class="card-header">Total Data</div>
        <div class="card-body">
          <h6 class="card-title">Paket Barang dan Jasa: </h6>
          <h5 class="card-text">{{ $hitung5 }}</h5>
        </div>
      </div>
    </div>
  </div>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3">
      <h1 class="h2">Tabel Persiapan Kontrak</h1>
    </div>
    <div class="justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-5 border-bottom">
    <table class="table table-sm table-bordered table-responsive" id="myTable">
        <thead>
            <th scope="col">no</th>
            <th scope="col">Judul Kontrak</th>
            <th scope="col">Penyedia</th>
            <th scope="col">Nilai Kontrak</th>
            <th scope="col">Status</th>
            <th scope="col">Kode Akun</th>
            <th scope="col">Keterangan</th>
        </thead>
        <tbody>
          @foreach($pengadaan as $p)
          @if($current > $p->akhir)
          <tr class="table-danger">
            <td>{{ $loop->iteration }}</td>
            <td>{{ $p->judul }}</td>
            <td>{{ $p->penyedia }}</td>
            <td>{{ $p->nilai_kontrak }}</td>
            <td>{{ $p->status }}</td>
            <td>{{ $p->akun }}</td>
            <td class="text-danger">Melebihi tanggal akhir kontrak <i class="bi bi-exclamation-diamond-fill"></i></td>
          </tr>
          @else
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $p->judul }}</td>
            <td>{{ $p->penyedia }}</td>
            <td>{{ $p->nilai_kontrak }}</td>
            <td>{{ $p->status }}</td>
            <td>{{ $p->akun }}</td>
            <td></td>
          </tr>
          @endif
          @endforeach
        </tbody>
      </table>
    </div>
</div>
@endsection