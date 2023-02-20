@extends('Pengadaan.layout.main')

@section('container')
<div class="container">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{ $title }} : Tambah Data</h1>
  </div>
  <form action="{{ url('/Home/pbj') }}" method="post" enctype="multipart/form-data">
  @csrf
    <div class="mb-3 mt-3">
      <label for="paket" class="form-label">Judul Paket</label>
      <input type="text" class="form-control" id="paket" name="paket">
    </div>
  
    <div class="mb-3">
        <label for="mak" class="form-label">MAK</label>
        <input type="text" class="form-control" id="mak" name="mak">
    </div>
  
    <div class="mb-3">
        <label for="pagu" class="form-label">Pagu</label>
        <input type="text" class="form-control" id="pagu" name="pagu" placeholder="Harap diisi dengan angka" aria-label="Harap diisi dengan angka">
    </div>
  
      <div class="mb-3">
        <label for="metode" class="form-label">Metode Pengadaan</label>
        <input type="text" class="form-control" id="metode" name="metode">
      </div>
  
      <div class="mb-3">
        <label for="rab" class="form-label">RAB</label>
        <input type="file" class="form-control" id="rab" name="rab">
        <p class="fs-6 text-danger fst-italic">Dokumen dalam format PDF</p>
      </div>
  
      <div class="mb-3">
        <label for="hps" class="form-label">HPS</label>
        <input type="file" class="form-control" id="hps" name="hps">
        <p class="fs-6 text-danger fst-italic">Dokumen dalam format PDF</p>
      </div>
  
      <div class="mb-3">
        <label for="kak" class="form-label">KAK</label>
        <input type="file" class="form-control" id="kak" name="kak">
        <p class="fs-6 text-danger fst-italic">Dokumen dalam format PDF</p>
      </div>
  
      <button type="submit" class="btn btn-primary my-3">Simpan</button>
  </form>
</div>

@endsection