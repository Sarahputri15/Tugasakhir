@extends('Keuangan.layout.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">{{ $title }} : Edit Data</h1>
</div>
<form action="{{ url('/Home/Pembayarankeu1/Edit') }}" method="post" enctype="multipart/form-data">
  @csrf
  <input type="hidden" name="id" value="{{ $keuangan->id }}">
  
  <div class="mb-3 visually-hidden-focusable">
    <label for="tahun" class="form-label">Tahun Pengadaan</label>
    <select class="form-select" name="tahun" aria-label="Default select example" id="tahun" value="">
      @foreach($years as $y)
      <option value="{{ $y->id }}" @if($y->id == $keuangan->tahun_id) selected @endif>{{ $y->years }}</option>
      @endforeach
    </select>

  </div>
  <fieldset disabled>
    <div class="mb-3 mt-3">
      <label for="judul" class="form-label">Judul Kontrak</label>
      <input type="text" class="form-control" id="judul" value="{{ $keuangan->judul }}">
    </div>
    <div class="my-3">
      <label for="nilai" class="form-label">Nilai Kontrak</label>
      <input type="text" class="form-control" placeholder="Harap diisi dengan angka" id="nilai" value="Rp.{{ number_format($keuangan->nilai_kontrak, '0','.','.') }}">
    </div>
    <div class="mb-3">
      <label for="penyedia" class="form-label">Penyedia</label>
      <input type="text" class="form-control" id="penyedia" value="{{ $keuangan->penyedia }}">
    </div>
  </fieldset>
    <div class="mb-3">
      <label for="status" class="form-label">Status</label>
      <select class="form-select" name="status" aria-label="Default select example" id="admin" value="">
        @if($keuangan->status == "Belum terdaftar")
        <option value="Belum terdaftar" selected>Belum terdaftar</option>
        <option value="Telah Terdaftar">Telah terdaftar</option>
        @else
        <option value="Belum terdaftar">Belum terdaftar</option>
        <option value="Telah Terdaftar" selected>Telah terdaftar</option>
        @endif
      </select>
    </div>

    <div class="row">
      <div class="col-6 mb-3">
        <label for="count" class="form-label" id="count">SP2D</label>
        <input type="file" class="form-control" id="input" name="sp2d">
        <p class="fs-6 text-danger fst-italic">Dokumen dalam format PDF</p>
      </div>
      <div class="col-6 mb-3">
        <label for="no_sp2d" class="form-label">Nilai SP2D</label>
        <input type="text" class="form-control" id="no_sp2d" name="no_sp2d" placeholder="Harap diisi dengan angka" value="{{ $keuangan->nilai_sp2d }}">
      </div>
    </div>
    
    <div class="mb-3">
      <label for="perpajakan" class="form-label">Dokumen Perpajakan</label>
      <input type="file" class="form-control" id="perpajakan" name="perpajakan">
      <p class="fs-6 text-danger fst-italic">Dokumen dalam format PDF</p>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
  </form>
@endsection
