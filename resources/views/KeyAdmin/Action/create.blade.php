@extends('KeyAdmin.layout.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah Data User</h1>
</div>
<form action="{{ url('register') }}" method="post">
  @csrf
    <div class="mb-3">
      <label for="name" class="form-label">Nama</label>
      <input required type="text" name="name" class="form-control" id="name">
    </div>

    <div class="mb-3 mt-3">
      <label for="nip" class="form-label">NIP</label>
      <input required type="text" name="nip" placeholder="Harap diisi dengan angka" class="form-control" id="nip">
    </div>

    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input required type="email" name="email" class="form-control" id="email">
    </div>
    
    <div class="mb-3">
      <label for="admin" class="form-label">Mendaftar Sebagai</label>
      <select class="form-select" name="AdminId" aria-label="Default select example" id="tahun" value="">
        @foreach($admins as $a)
        <option value="{{ $a->id }}">{{ $a->admin }}</option>
        @endforeach
      </select>
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input required type="password" name="password" class="form-control" id="password">
    </div>

    <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection