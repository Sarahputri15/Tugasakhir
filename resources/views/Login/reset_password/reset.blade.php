@extends('Login.layout.main')

@section('container')

<div class="row justify-content-center">
    <div class="col-md-4">
        <main class="form-registrasi">
            <form  action="{{ url('/register2') }}" method="post">
              @csrf
              <img class="mb-3 rounded mx-auto d-block" src="/gambar/Lambang_ITK.png" alt="" width="72" height="75">
              <h1 class="h3 mb-3 fw-normal text-center" style="color:white">Ubah Password</h1>
              <div class="form-floating">
                <input required type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email" value="{{ old('email') }}">
                <label for="email">Email</label>
                @if($errors->any())
                @error('email')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    Email yang anda masukan belum sesuai
                </div>
                @enderror
                @endif 
              </div>
              <div class="form-floating">
                <input type="password" name="password" class="form-control rounded-bottom @error('password') is-invalid @enderror" id="password" placeholder="Password" required>
                <label for="password">Password</label>
                @error('password')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    Password harap diisi 
                </div>
                @enderror
              </div>
              <div class="form-floating">
                <input type="password" name="password" class="form-control rounded-bottom @error('password') is-invalid @enderror" id="password" placeholder="Password" required>
                <label for="password">Password Baru</label>
                @error('password')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    Password baru harap diisi 
                </div>
                @enderror
              </div>
              <button class="w-100 btn btn-lg btn-primary my-3" type="submit">Ubah Password</button>
            </form>
            <small class="d-block text-center mt-3" style="color:white">Sudah Register? <a href="{{ url('/Login') }}">Login Sekarang</a></small>
        </main>
    </div>
</div>

@endsection