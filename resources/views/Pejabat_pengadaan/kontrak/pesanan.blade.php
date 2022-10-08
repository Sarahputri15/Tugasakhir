@extends('Pejabat_pengadaan.layout.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom container">
  <h1 class="h2 ">{{ $title }}</h1>
</div>
<div class="container">
  <div class="row">
    <div class="col-9">
        <a href="{{ url('pesanan/create') }}" class="btn btn-success my-3"><i class="bi bi-plus"></i>Tambah</a>
    </div>
  </div>
  <div class="justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
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
        @foreach ($pesanan as $p)
        <tr>
          <th>{{ $loop->iteration }}</th>
          <td>{{ $p->judul }}</td>
          <td>{{ $p->updated_at }}</td>
          <td>{{ $p->status }}</td>
          <td>
            <a href="{{ url('pesanan/show/'.$p->id) }}" class="badge bg-info" target="_blank"><i class="bi bi-eye"></i> Lihat</a>
          </td>
          <td><a href="{{ url('pesanan/show2/'.$p->id) }}" class="badge bg-info" target="_blank"><i class="bi bi-eye"></i> Lihat</a></td>
          <td>
            <a href="{{ url('pesanan/detail/'.$p->id) }}" class="badge bg-info"> Detail</a>
            <a href="{{ url('pesanan/edit/'.$p->id) }}" class="badge bg-warning"><i class="bi bi-pencil"></i> Edit</span></a>
            <a href="{{ url('pesanan/hapus/'.$p->id) }}" onclick="return confirm(' Apakah anda yakin ingin menghapus data ini? ')" class="badge bg-danger"><i class="bi bi-x-circle"></i> Hapus</span></a>
        </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection