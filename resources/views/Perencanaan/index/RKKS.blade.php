@extends('Perencanaan.layout.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">{{ $title }}</h1>
</div>
<div class="row">
  <div class="col-9">
    <a href="{{ url('/Home/RKKS/Create') }}" class="btn btn-success mb-4 mt-3"><i class="bi bi-plus"></i>Tambah</a>
  </div>
</div>
<div class="mb-1" style="float:right">
  <form action="" method="get">
    <label for="tahun">Tahun Anggaran:</label> 
    <select class="border border-dark-subtle" name="years" id="tahun" style="width:150px; height:31px; border-radius:5px">
      <option value="pilih_tahun">-- Pilih Tahun --</option>
      @foreach($years as $y)
      <option value="{{ $y->id }}" {{ Request::get('years') == $y->id ? 'selected':'' }}>{{ $y->years }}</option>
      @endforeach
    </select>
    <button class="border border-success bg-success text-white" type="submit" style="height:31px; border-radius:5px">Filter</button>
  </form>
</div>
<br>
<br>
<div class="justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
<table class="table table-striped table-sm table-bordered" id="myTable">
    <thead>
      <tr>
        <th scope="col">no</th>
        <th scope="col">Dokumen</th>
        <th scope="col">Edisi</th>
        <th scope="col">Tanggal Upload</th>
        <th scope="col">Tanggal Pengesahan</th>
        <th scope="col">Tahun Anggaran</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($perencanaan as $rencana)
      <tr>
        <th>{{ $loop->iteration }}</th>
        <td>{{ $rencana->dokumen}}</td>
        <td>{{ $rencana->edisi }}</td>
        <td>{{ $rencana->updated_at}}</td>
        <td>{{ $rencana->tanggal_pengesahan }}</td>
        <td>{{ $rencana->years}}</td>
        <td>
          <a href="{{ url('/Home/RKKS/show/'.$rencana->id) }}" class="badge bg-info" target="_blank"><i class="bi bi-eye"></i> Lihat</a>
          <a href="{{ url('/Home/RKKS/Edit/'.$rencana->id) }}" class="badge bg-warning"><i class="bi bi-pencil"></i> Edit</span></a>
          <a href="{{ url('/Home/RKKS/hapus/'.$rencana->id) }}" onclick="return confirm(' Apakah anda yakin ingin menghapus data ini? ')" class="badge bg-danger"><i class="bi bi-x-circle"></i> Hapus</span></a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection