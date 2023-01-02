@extends('Pengadaan.layout.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom container">
  <h1 class="h2 ">{{ $title }}</h1>
</div>
<div class="container">
  <div class="justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom table-responsive">
  {{-- 
  <div class="row mb-2 pb-2 border-bottom">
    <div class="col-2">
    </div>
      <div class="col-md-4">
        <td>Minimum Tanggal:</td>
        <td><input type="text" id="min" name="min"></td>
      </div>
      <div class="col-md-4">
        <td>Maximum Tanggal:</td>
        <td><input type="text" id="max" name="max"></td>
      </div>
    <div class="col-3">
    </div>
  </div>
    --}}
  <table class="table table-striped table-sm table-bordered" id="myTable">
      <thead>
        <tr>
          <th scope="col">no</th>
          <th scope="col">Judul Pesanan</th>
          <th scope="col">Tanggal Upload</th>
          <th scope="col">Status</th>
          <th scope="col">Surat Pesanan</th>
          <th scope="col">Dokumen Penawaran</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($perencanaan as $p)
        <tr>
          <th>{{ $loop->iteration }}</th>
          <td>{{ $p->judul}}</td>
          <td>{{ $p->updated_at}}</td>
          @if($p->status == 'Belum disetujui')
          <td><span class="badge text-bg-danger">{{ $p->status}}</span></td>
          @else
          <td><span class="badge text-bg-success">{{ $p->status}}</span></td>
          @endif
          <td>
            <a href="{{ url('/Home/pesanan/show/'.$p->id) }}" class="badge bg-info" target="_blank"><i class="bi bi-eye"></i> Lihat</a>
          </td>
          <td><a href="{{ url('/Home/pesanan/show2/'.$p->id) }}" class="badge bg-info" target="_blank"><i class="bi bi-eye"></i> Lihat</a></td>
          <td>
            <a href="{{ url('/Home/pesanan/detail/'.$p->id) }}" class="badge bg-info">Detail</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection