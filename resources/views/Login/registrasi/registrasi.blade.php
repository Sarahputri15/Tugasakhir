@extends('Login.layout.main')

@section('container')

<div class="row justify-content-center">
    <div class="col-md-4">
        <main class="form-registrasi">
            <form  action="{{ url('/register2') }}" method="post">
              @csrf
              <img class="mb-3 rounded mx-auto d-block" src="/gambar/Lambang_ITK.png" alt="" width="72" height="75">
              <h1 class="h3 mb-3 fw-normal text-center" style="color:white">Registrasi Akun</h1>
              <div class="form-floating">
                <input type="text" name="name" class="form-control rounded-top @error('name') is-invalid @enderror" id="name" placeholder="Name" value="{{ old('name') }}">
                <label for="name">Nama</label>
                @error('name')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    Nama harap diisi terlebih dahulu
                </div>
                @enderror
              </div>
              <div class="form-floating">
                <input type="text" name="nip" class="form-control @error('nip') is-invalid @enderror" id="nip" placeholder="nip" value="{{ old('nip') }}">
                <label for="nip">NIP/NIPH</label>
                @error('nip')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    NIP/NIPH harap diisi terlebih dahulu
                </div>
                @enderror 
              </div>
              <div class="form-floating">
                <input required type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email" value="{{ old('email') }}">
                <label for="email">Email</label>
                @if($errors->any())
                @error('email')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    Email sudah digunakan
                </div>
                @enderror
                @endif 
              </div>
              <div class="form-floating">
                <select class="form-select @error('Admin_id') is-invalid @enderror" name="Admin_id" aria-label="Default select example" id="admin" value=" {{ old('admin') }}">
                  @foreach($admins as $admin)
                  <option value={{ $admin->id }}>{{ $admin->admin }}</option>
                  @endforeach
                  @error('Admin_id')
                  <div id="validationServerUsernameFeedback" class="invalid-feedback">
                      Posisi admin harap diisi terlebih dahulu
                  </div>
                  @enderror
                </select>
                <label for="admin">Mendaftar Sebagai</label>
              </div>
              <div class="form-floating">
                <input type="password" name="password" class="form-control rounded-bottom @error('password') is-invalid @enderror" id="password" placeholder="Password">
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