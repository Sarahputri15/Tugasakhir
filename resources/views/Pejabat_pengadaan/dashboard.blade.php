@extends('Pejabat_pengadaan.layout.main')

@section('container')
<div class="row my-3 justify-content-start">
    <div class="col-2 card text-bg-success mx-3" style="max-width: 15rem; height:140px">
        <div class="card-header">Total Data</div>
        <div class="card-body">
          <h6 class="card-title">Surat Pesanan:</h6>
          <h5 class="card-text">{{ $hitung4 }}</h5>
        </div>
      </div>
  </div>
  <h3 class="mt-3">Tabel Data Surat Pesanan</h3>
  <div class="row">
    <div class="col-12">
      <div class="justify-content-between flex-wrap flex-md-nowrap align-items-center pt-1 pb-2 mb-3  border-bottom">
        <table class="table table-striped table-sm table-bordered" id="myTable">
            <thead>
              <tr>
                <th class="col-1" scope="col">no</th>
                <th scope="col">Judul</th>
                <th scope="col">status</th>
                <th scope="col">catatan</th>
              </tr>
            </thead>
            <tbody>
              @foreach($pesanan as $p)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $p->judul }}</td>
                @if($p->status == 'Belum disetujui')
                <td><span class="badge text-bg-danger">{{ $p->status}}</span></td>
                @else
                <td><span class="badge text-bg-success">{{ $p->status}}</span></td>
                @endif
                <td>{!! $p->catatan !!}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
    </div>
  </div>
@endsection