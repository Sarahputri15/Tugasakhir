@extends('Pejabat_pengadaan.layout.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{ $title }} : Tambah Data</h1>
</div>
<form action="{{ url('pesanan') }}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="mb-3 visually-hidden-focusable">
    <label for="tahun" class="form-label">Tahun Pengadaan</label>
    <select class="form-select" name="tahun" aria-label="Default select example" id="tahun" value="">
      <option value="{{ $years }}">{{ Bantuan::get_tahun(Auth::user()->id) }}</option>
    </select>
  </div>

    <div class="mb-3">
      <label for="judul" class="form-label">Judul Pesanan</label>
      <input type="text" class="form-control" id="judul" name="judul">
    </div>
    
    <div class="mb-3">
        <label for="pesanan" class="form-label">Dokumen Pesanan</label>
        <input type="file" class="form-control" id="pesanan" name="pesanan">
        <p class="fs-6 text-danger fst-italic">Dokumen dalam format PDF</p>
      </div>

    <div class="mb-3">
      <label for="penawaran" class="form-label">Dokumen Penawaran</label>
      <input type="file" class="form-control" id="penawaran" name="penawaran">
      <p class="fs-6 text-danger fst-italic">Dokumen dalam format PDF</p>
    </div>
      <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
  </form>
@endsection