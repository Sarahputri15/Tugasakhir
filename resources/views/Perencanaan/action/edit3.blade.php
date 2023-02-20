@extends('Perencanaan.layout.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{ $title }} : Edit Data</h1>
</div>
<form action="{{ url('/Home/RKKS/Edit') }}" method="post" enctype="multipart/form-data">
  @csrf
  <input type="hidden" name="id" value="{{ $perencanaan->id }}">
  
  <div class="mb-3">
    <label for="tahun" class="form-label">Tahun Pengadaan</label>
    <select class="form-select" name="tahun" aria-label="Default select example" id="tahun" value="">
      @foreach($years as $y)
      <option value="{{ $y->id }}" @if($y->id == $perencanaan->tahun_id) selected @endif>{{ $y->years }}</option>
      @endforeach
    </select>
  </div>

    <div class="mb-3 mt-3">
      <label for="Dokumen" class="form-label">Dokumen</label>
      <select class="form-select" name="dokumen_id">
        @foreach($dokumens as $dokumen)
            <option value={{ $dokumen->id }} @if($perencanaan->Dokumen_id == $dokumen->id) selected @endif><!-- if nya untuk apa? fungsi selected untuk apa? -->
              {{ $dokumen->dokumen }}</option>
        @endforeach
      </select>
    </div>
    
    <div class="mb-3">
      <label for="Edisi" class="form-label">Edisi</label>
      <input type="text" class="form-control" id="Edisi" name="edisi" value="{{ $perencanaan->edisi }}">
    </div>
  
      {{-- <div class="col-6 mb-3">
        <label for="Upload" class="form-label">Tanggal Upload</label>
        <input type="date" class="form-control" id="Upload" name="upload" value="{{ $perencanaan->tanggal_upload }}">
      </div> --}}
      <div class="mb-3">
        <label for="pengesahan" class="form-label">Tanggal Pengesahan</label>
        <input type="date" class="form-control" id="pengesahan" name="pengesahan" value="{{ $perencanaan->tanggal_pengesahan}}">
      </div>
  
    <div class="mb-3">
      <label for="dokumen" class="form-label">Dokumen</label>
      <input type="file" class="form-control" id="dokumen" name="dokumen">
      <p class="fs-6 text-danger fst-italic">Dokumen dalam format PDF</p>
    </div>
      <button type="submit" class="btn btn-primary">Simpan</button>
  </form>
@endsection