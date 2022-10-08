@extends('KeyAdmin.layout.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Data User</h1>
</div>
<form action="{{ url('user/edit') }}" method="post">
  @csrf
    <input type="hidden" name="id" value="{{ $user->id }}">
    <div class="mb-3">
      <label for="name" class="form-label">Nama</label>
      <input required type="text" name="name" class="form-control" id="name" value="{{ $user->name }}">
    </div>

    <div class="mb-3 mt-3">
      <label for="nip" class="form-label">NIP</label>
      <input required type="text" name="nip" class="form-control" placeholder="Harap diisi dengan angka" id="nip" value="{{ $user->nip}}">
    </div>

    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input required type="email" name="email" class="form-control" id="email" value="{{ $user->email }}">
    </div>
    
    <div class="mb-3">
      <label for="admin" class="form-label">Mendaftar Sebagai</label>
      <select class="form-select" name="Admin_id" aria-label="Default select example" id="tahun">
        @foreach($admins as $a)
        <option value="{{ $a->id }}" 
            @if($a->id == $user->Admin_id)
            selected
            @endif>{{ $a->admin }}</option>
        @endforeach
      </select>
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input required type="password" name="password" class="form-control" id="password" value="{{ $user->password }}">
    </div>

    <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection