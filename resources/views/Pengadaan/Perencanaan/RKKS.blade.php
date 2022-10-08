@extends('Pengadaan.layout.main')

@section('container')
<div class="container">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{ $title }}</h1>
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
        @foreach ($perencanaan as $rencana)
        <tr>
          <th>{{ $loop->iteration }}</th>
          <td>{{ $rencana->dokumen}}</td>
          <td>{{ $rencana->edisi }}</td>
          <td>{{ $rencana->updated_at }}</td>
          <td>{{ $rencana->tanggal_pengesahan }}</td>
          <td>
            <a href="{{ url('/Home/RKKS2/show/'.$rencana->id) }}" class="badge bg-info" target="_blank"><i class="bi bi-eye"></i> Lihat</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection