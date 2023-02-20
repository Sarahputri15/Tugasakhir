@extends('Pengadaan.layout.main')

@section('container')
<div class="container">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{ $title }} : Edit Data</h1>
</div>
<form action="{{ url('/Home/Pembayaran1/Edit') }}" method="post" enctype="multipart/form-data"> 
  @csrf
    <input type="hidden" name="id" value="{{ $edit->id }}">

    <div class="mb-3">
      <label for="Judul" class="form-label">Judul</label>
      <input type="text" class="form-control" id="Judul" name="title" value="{{ $edit->judul }}">
    </div>

    <div class="mb-3 mt-3">
      <label for="Nomor" class="form-label">Nomor Kontrak</label>
      <input type="text" class="form-control" id="Nomor" name="nomor" value="{{ $edit->nomor_kontrak }}">
    </div>
    
    <div class="row">
      <div class="col-6 mb-3">
        <label for="Awal" class="form-label">Awal Kontrak</label>
        <input type="date" class="form-control" id="Awal" name="awal" value="{{ $edit->awal }}">
      </div>
      <div class="col-6 mb-3">
        <label for="akhir" class="form-label">Akhir Kontrak</label>
        <input type="date" class="form-control" id="akhir" name="akhir" value="{{ $edit->akhir }}">
      </div>
    </div>

    <div class="mb-3">
      <label for="penyedia" class="form-label">Penyedia</label>
      <input type="text" class="form-control" id="penyedia" name="penyedia" value="{{ $edit->penyedia }}">
    </div>

    <div class="mb-3">
      <label for="alamat" class="form-label">Alamat</label>
      <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $edit->alamat }}">
    </div>

    <div class="mb-3">
      <label for="nilai" class="form-label">Nilai Kontrak</label>
      <input type="text" class="form-control" placeholder="Harap diisi dengan angka" id="nilai" name="nilai" value="{{ $edit->nilai_kontrak }}">
    </div>

    <div class="mb-3">
      <label for="akun" class="form-label">Kode Akun</label>
      <input type="text" class="form-control" id="akun" name="akun" value="{{ $edit->akun }}">
    </div>

    <div class="mb-3">
      <label for="bank" class="form-label">Nama Bank</label>
      <input type="text" class="form-control" id="bank" name="bank" value="{{ $edit->bank }}">
    </div>

    <div class="mb-3">
      <label for="real_pekerjaan" class="form-label">Realisasi Pekerjaan</label>
      <input type="text" class="form-control" id="real_pekerjaan" name="real_pekerjaan" value="{{ $edit->realisasi_pekerjaan }}">
    </div>

    <input type="hidden" id="custId" name="pembayaran" value="{{ $edit->realisasi_pembayaran }}">

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
      <label for="adendum" class="form-label">Adendum</label>
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
        <input type="text" class="form-control" placeholder="Harap diisi dengan angka" id="no_npwp" name="no_npwp" value="{{ $edit->no_NPWP }}">
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
        <input type="text" class="form-control" placeholder="Harap diisi dengan angka" id="no_rekening" name="no_rekening" value="{{ $edit->no_rekening }}">
      </div>
    </div>

    <div class="mb-3">
      <label for="Pengesahan" class="form-label">Dokumen Pengesahan</label>
      <input type="file" class="form-control" id="Pengesahan" name="pengesahan">
      <p class="fs-6 text-danger fst-italic">Dokumen dalam format PDF</p>
    </div>

    <div class="mb-3">
      <label for="Pemeriksaan" class="form-label">Berita Acara Pemeriksaan</label>
      <input type="file" class="form-control" id="Pemeriksaan" name="pemeriksaan"> 
      <p class="fs-6 text-danger fst-italic">Dokumen dalam format PDF</p>
    </div>

    <div class="mb-3">
      <label for="Administrasi" class="form-label">Berita Acara Administrasi</label>
      <input type="file" class="form-control" id="Administrasi" name="administrasi">
      <p class="fs-6 text-danger fst-italic">Dokumen dalam format PDF</p>
    </div>

    <div class="mb-3">
      <label for="Pembayaran" class="form-label">Berita Acara Pembayaran</label>
      <input type="file" class="form-control" id="Pembayaran" name="pembayaran">
      <p class="fs-6 text-danger fst-italic">Dokumen dalam format PDF</p>
    </div>

    <div class="mb-3">
      <label for="jaminan" class="form-label">Dokumen Jaminan</label>
      <input type="file" class="form-control" id="jaminan" name="jaminan">
      <p class="fs-6 text-danger fst-italic">Dokumen dalam format PDF</p>
    </div>

    <div class="mb-3">
      <label for="pemeliharaan" class="form-label">Dokumen Pemeliharaan</label>
      <input type="file" class="form-control" id="pemeliharaan" name="pemeliharaan">
      <p class="fs-6 text-danger fst-italic">Dokumen dalam format PDF</p>
    </div>

    <div class="mb-3">
      <label for="pekerjaan" class="form-label">Dokumen Jaminan Pelaksanaan Pemeliharaan</label>
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