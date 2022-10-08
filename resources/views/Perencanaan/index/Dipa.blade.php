@extends('Perencanaan.layout.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">{{ $title }}</h1>
</div>
<div class="row">
  <div class="col-9">
    <a href="{{ url('/Home/DIPA/Create') }}" class="btn btn-success my-3"><i class="bi bi-plus"></i>Tambah</a>
  </div>
</div>
<div class="justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<table class="table table-striped table-sm table-bordered" id="myTable">
    <thead>
      <tr>
        <th scope="col">no</th>
        <th scope="col">Dokumen</th>
        <th scope="col">Edisi</th>
        <th scope="col">Tanggal Upload</th>
        <th scope="col">Tanggal Pengesahan</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($perencanaan as $rencana)
      <tr>
        <th>{{ $loop->iteration }}</th>
        <td>{{ $rencana->dokumen}}</td>
        <td>{{ $rencana->edisi }}</td>
        <td>{{ $rencana->updated_at }}</td>
        <td>{{ $rencana->tanggal_pengesahan }}</td>
        <td>
          <a href="{{ url('/Home/DIPA/show/'.$rencana->id) }}" class="badge bg-info" target="_blank"><i class="bi bi-eye"></i> Lihat</a>
          <a href="{{ url('/Home/DIPA/Edit/'.$rencana->id) }}" class="badge bg-warning"><i class="bi bi-pencil"></i> Edit</span></a>
          <a href="{{ url('/Home/DIPA/hapus/'.$rencana->id) }}" onclick="return confirm(' Apakah anda yakin ingin menghapus data ini? ')" class="badge bg-danger"><i class="bi bi-x-circle"></i> Hapus</span></a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection