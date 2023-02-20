@extends('Perencanaan.layout.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{ $title }} : Tambah Data</h1>
</div>
<form action="{{ url('/Home/DIPA') }}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="mb-3">
    <label for="tahun" class="form-label">Tahun Pengadaan</label>
    <select class="form-select @error('tahun') is-invalid @enderror" name="tahun" aria-label="Default select example" id="tahun" value="" required>
      <option value="">-- Pilih Tahun --</option>
      @foreach($years as $y)
      <option value="{{ $y->id }}" {{ Request::get('tahun') == $y->id ? 'selected':'' }}>{{ $y->years }}</option>
      @endforeach
    </select>
  </div>

    <div class="mb-3 mt-3">
      <label for="Dokumen" class="form-label">Dokumen</label>
      <select class="form-control" name="dokumen_id" >
            <option value={{ $dokumens->id }}>{{ $dokumens->dokumen }}</option>
      </select>
    </div>
    <div class="mb-3">
      <label for="Edisi" class="form-label">Edisi</label>
      <input type="text" class="form-control" id="Edisi" name="edisi">
    </div>
    
      {{-- <div class="col-6 mb-3">
        <label for="Upload" class="form-label">Tanggal Upload</label>
        <input type="date" class="form-control" id="Upload" name="upload">
      </div> --}}
      <div class="mb-3">
        <label for="pengesahan" class="form-label">Tanggal Pengesahan</label>
        <input type="date" class="form-control" id="pengesahan" name="pengesahan">
      </div>
    
    <div class="mb-3">
      <label for="dokumen" class="form-label">Dokumen</label>
      <input type="file" class="form-control" id="dokumen" name="dokumen">
      <p class="fs-6 text-danger fst-italic">Dokumen dalam format PDF</p>
    </div>
      <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
  </form>
@endsection