@extends('Pengadaan.layout.main')

@section('container')
<div class="container">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{ $title }} : Edit Data</h1>
  </div>
  <form action="{{ url('/Home/pbj/Edit') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{ $paket->id }}">

    <div class="mb-3 visually-hidden-focusable">
      <label for="tahun" class="form-label">Tahun Pengadaan</label>
      <select class="form-select" name="tahun" aria-label="Default select example" id="tahun" value="">
        <option value="{{ $years }}">{{ Bantuan::get_tahun(Auth::user()->id) }}</option>
      </select>
    </div>
    
    <div class="mb-3 mt-3">
      <label for="paket" class="form-label">Judul Paket</label>
      <input type="text" class="form-control" id="paket" name="paket" value="{{ $paket->paket }}" >
    </div>
  
    <div class="mb-3">
        <label for="mak" class="form-label">MAK</label>
        <input type="text" class="form-control" id="mak" name="ak" value="{{ $paket->mak }}">
    </div>
  
    <div class="mb-3">
        <label for="pagu" class="form-label">Pagu</label>
        <input type="text" class="form-control" id="pagu" name="agu" value="{{ $paket->pagu }}">
    </div>
  
      <div class="mb-3">
        <label for="metode" class="form-label">Metode Pengadaan</label>
        <input type="text" class="form-control" id="metode" name="etode" value="{{ $paket->metode }}">
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