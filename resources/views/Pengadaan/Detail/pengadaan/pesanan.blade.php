@extends('Pengadaan.layout.main')

@section('container')
<div class="container">
  <a href="{{ url('/Home/pesanan') }}" class="btn btn-primary my-3"><i class="bi bi-chevron-left"></i> Kembali</a>
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom container">
    <h1 class="h2 ">{{ $title }}</h1>
  </div>
  <div class="justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <table class="table table-striped table-sm table-bordered">
      <thead>
        <tr>
          <th scope="col">no</th>
          <th scope="col">Judul Pesanan</th>
          <th scope="col">Catatan</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th>1</th>
          <td>{{ $pesanan->judul }}</td>
          <td>{!! $pesanan->catatan !!}</td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom container">
    <h1 class="h2 ">{{ $title2 }}</h1>
  </div>
  <form method="post" action="{{ url('/Home/pesanan/detail') }}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{ $pesanan->id }}">
    <div class="mb-3">
      <label for="status" class="form-label">Status</label>
      <select class="form-select" name="status" aria-label="Default select example" id="status">
        @if($pesanan->status == "Belum disetujui")
        <option value="Belum disetujui" selected>Belum disetujui</option>
        <option value="Telah disetujui">Telah disetujui</option>
        @else
        <option value="Belum disetujui">Belum disetujui</option>
        <option value="Telah disetujui" selected>Telah disetujui</option>
        @endif
      </select>
    </div>
    <input id="body" type="hidden" name="catatan">
    <trix-editor input="body"></trix-editor>

    <button type="submit" class="btn btn-primary my-3">Simpan</button>
  </form>
</div>
@endsection