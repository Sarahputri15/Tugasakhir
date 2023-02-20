@extends('Pengadaan.layout.main')

@section('container')
<div class="container">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{ $title }} : Tambah Data</h1>
</div>
<form action="{{ url('/Home/Pembayaran1') }}" method="post" enctype="multipart/form-data"> 
  @csrf
    <div class="mb-3">
      <label for="Judul" class="form-label">Judul</label>
      <input type="text" class="form-control" id="Judul" name="title">
    </div>
  
    <div class="mb-3 mt-3">
      <label for="Nomor" class="form-label">Nomor Kontrak</label>
      <input type="text" class="form-control" id="Nomor" name="nomor">
    </div>

    <div class="row">
      <div class="col-6 mb-3">
        <label for="Awal" class="form-label">Awal Kontrak</label>
        <input type="date" class="form-control" id="Awal" name="awal">
      </div>
  
      <div class="col-6 mb-3">
        <label for="akhir" class="form-label">Akhir Kontrak</label>
        <input type="date" class="form-control" id="akhir" name="akhir">
      </div>
    </div>

    <div class="mb-3">
      <label for="penyedia" class="form-label">Penyedia</label>
      <input type="text" class="form-control" id="penyedia" name="penyedia">
    </div>

    <div class="mb-3">
      <label for="alamat" class="form-label">Alamat</label>
      <input type="text" class="form-control" id="alamat" name="alamat">
    </div>
    
    <div class="mb-3">
      <label for="nilai" class="form-label">Nilai Kontrak</label>
      <input type="text" class="form-control" id="nilai" name="nilai" placeholder="Harap diisi dengan angka" aria-label="Harap diisi dengan angka">
    </div>

    <div class="mb-3">
      <label for="akun" class="form-label">Kode Akun</label>
      <input type="text" class="form-control" id="akun" name="akun">
    </div>

    <div class="mb-3">
      <label for="bank" class="form-label">Nama Bank</label>
      <input type="text" class="form-control" id="bank" name="bank">
    </div>

    <div class="mb-3">
      <label for="real_pekerjaan" class="form-label">Realisasi Pekerjaan</label>
      <input type="text" class="form-control" placeholder="Isi angka dalam skala 1-100" id="real_pekerjaan" name="real_pekerjaan">
    </div>

    <div class="mb-3">
      <label for="judul" class="form-label">Dokumen Kontrak</label>
      <input type="file" class="form-control" id="judul" name="judul">
      <p class="fs-6 text-danger fst-italic">Dokumen dalam format PDF</p>
    </div>

    <div class="mb-3">
      <label for="resume" class="form-label">Resume Kontrak</label>
      <input type="file" class="form-control" id="resume" name="resume">
      <p class="fs-6 text-danger fst-italic">Dokumen dalam format PDF</p>
    </div>

    <div class="mb-3">
      <label for="adendum" class="form-label">Addendum</label>
      <input type="file" class="form-control" id="adendum" name="adendum">
      <p class="fs-6 text-danger fst-italic">Dokumen dalam format PDF</p>
    </div>

    <div class="row mb-3">
      <div class="col-6">
        <label for="npwp" class="form-label">Dokumen NPWP</label>
        <input type="file" class="form-control" id="npwp" name="npwp">
        <p class="fs-6 text-danger fst-italic">Dokumen dalam format PDF</p>
      </div>
      <div class="col-6">
        <label for="no_npwp" class="form-label">Nomor NPWP</label>
        <input type="text" class="form-control" placeholder="Harap diisi dengan angka"  id="no_npwp" name="no_npwp">
      </div>
    </div>

    <div class="row mb-3">
      <div class="col-6">
        <label for="rekening" class="form-label">Dokumen Rekening</label>
        <input type="file" class="form-control" id="rekening" name="rekening">
        <p class="fs-6 text-danger fst-italic">Dokumen dalam format PDF</p>
      </div>
      <div class="col-6">
        <label for="no_rekening" class="form-label">Nomor Rekening</label>
        <input type="text" class="form-control" placeholder="Harap diisi dengan angka" id="no_rekening" name="no_rekening">
      </div>
    </div>

    <div class="mb-3">
      <label for="pemeliharaan" class="form-label">Jaminan Pemeliharaan</label>
      <input type="file" class="form-control" id="pemeliharaan" name="pemeliharaan">
      <p class="fs-6 text-danger fst-italic">Dokumen dalam format PDF</p>
    </div>

    <div class="mb-3">
      <label for="pekerjaan" class="form-label">Jaminan Pelaksanaan Pekerjaan</label>
      <input type="file" class="form-control" id="pekerjaan" name="pekerjaan">
      <p class="fs-6 text-danger fst-italic">Dokumen dalam format PDF</p>
    </div>

    <div class="mb-3">
      <label for="muka" class="form-label">Jaminan Uang Muka</label>
      <input type="file" class="form-control" id="muka" name="muka">
      <p class="fs-6 text-danger fst-italic">Dokumen dalam format PDF</p>
    </div>

    <div class="mb-3">
      <label for="dat" class="form-label">Dokumen Akhir Tahun</label>
      <input type="file" class="form-control" id="dat" name="dat">
      <p class="fs-6 text-danger fst-italic">Dokumen dalam format PDF</p>
    </div>

    <button type="submit" class="btn btn-primary my-3">Simpan</button>
  </form>
</div>

@endsection