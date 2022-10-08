@extends('Perencanaan.layout.main')

@section('container')
<div style="height: 800px">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{ $title }} : Edit Data</h1>
  </div>
  <form action="{{ url('/Home/pbj2/Edit') }}" method="post" enctype="multipart/form-data">
  @csrf
  <input type="hidden" name="id" value="{{ $pbj->id }}">
  <fieldset disabled>
    <div class="mb-3 mt-3">
      <label for="paket" class="form-label">Judul Paket</label>
      <input type="text" class="form-control" id="paket" name="paket" value="{{ $pbj->paket }}" >
    </div>

    <div class="mb-3">
      <label for="mak" class="form-label">MAK</label>
      <input type="text" class="form-control" id="mak" name="mak" value="{{ $pbj->mak }}">
    </div>

    <div class="mb-3">
        <label for="pagu" class="form-label">Pagu</label>
        <input type="text" class="form-control" id="pagu" name="pagu" value="{{ $pbj->pagu }}">
    </div>

    <div class="mb-3">
      <label for="metode" class="form-label">Metode Pengadaan</label>
      <input type="text" class="form-control" id="metode" name="metode" value="{{ $pbj->metode }}">
    </div>
  </fieldset>
    <div class="mb-3">
      <label for="rup" class="form-label">Id RUP</label>
      <input type="text" class="form-control" id="rup" name="rup" value="{{ $pbj->rup }}">
    </div>

      <button type="submit" class="btn btn-primary my-3">Simpan</button>
  </form>
</div>
@endsection