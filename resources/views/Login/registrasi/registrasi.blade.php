@extends('Login.layout.main')

@section('container')

<div class="row justify-content-center">
    <div class="col-md-4">
        <main class="form-registrasi">
          <img class="mb-3 rounded mx-auto d-block" src="/gambar/Lambang_ITK.png" alt="" width="72" height="75">
          <h1 class="h3 mb-3 fw-normal text-center" style="color:white">Registrasi Akun</h1>
            <form  action="{{ url('registrasi') }}" method="post">
              @csrf
              <div class="form-floating">
                <input type="text" name="name" class="form-control rounded-top @error('name') is-invalid @enderror" id="name" placeholder="Name" value="{{ old('name') }}" required>
                <label for="name">Nama</label>
                @error('name')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    Nama harap diisi terlebih dahulu
                </div>
                @enderror
              </div>
              <div class="form-floating">
                <input type="text" name="nip" class="form-control @error('nip') is-invalid @enderror" id="nip" placeholder="nip" value="{{ old('nip') }}" required>
                <label for="nip">NIP/NIPH</label>
                @error('nip')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    NIP/NIPH harap diisi terlebih dahulu
                </div>
                @enderror 
              </div>
              <div class="form-floating">
                <input required type="email" name="email" class="form-control" id="email" placeholder="Email" value="{{ old('email') }}">
                <label for="email">Email</label>
              </div>
              <select class="form-select" name="AdminId" aria-label="Default select example">
                <option selected>--Pilih Posisi Admin--</option>
                <option value="{{ $admins->id=1 }}">Koordinator Rumpun Perencanaan</option>
                <option value="{{ $admins->id=2 }}">Pejabat Pembuat Komitmen</option>
                <option value="{{ $admins->id=3 }}">Keuangan dan BMN</option>
                <option value="{{ $admins->id=4 }}">Pejabat Pengadaan</option>
              </select>
              <div class="form-floating">
                <input type="password" name="password" class="form-control rounded-bottom @error('password') is-invalid @enderror" id="password" placeholder="Password" required>
                <label for="password">Password</label>
                @error('password')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    Password harap diisi terlebih dahulu
                </div>
                @enderror
              </div>
              <button class="w-100 btn btn-lg btn-primary my-3" type="submit">Register</button>
            </form>
            <small class="d-block text-center mt-3" style="color:white">Sudah Register? <a href="{{ url('/Login') }}">Login Sekarang</a></small>
        </main>
    </div>
</div>

@endsection