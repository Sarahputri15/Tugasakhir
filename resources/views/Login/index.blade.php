@extends('Login.layout.main')

@section('container')

<div class="row justify-content-center">
  <div class="col-md-4">
    @if(session()->has('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('status') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if(session()->has('info'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('info') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if(session()->has('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{ session('error') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <main class="form-signin">
      <form action="{{ url('/login') }}" method="post">
        @csrf
        <img class="mb-3 rounded mx-auto d-block" src="/gambar/Lambang_ITK.png" alt="" width="72" height="75">
        <h1 class="h3 mb-3 fw-normal text-center" style="color:white">Sistem Informasi Monitoring Pengadaan Barang dan Jasa</h1>
        <div class="form-floating">
          <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput" placeholder="name@example.com" required value="{{ old('email') }}">
          <label for="floatingInput">Email address</label>
          @error('email')
          <div id="validationServerUsernameFeedback" class="invalid-feedback">
              Email harap diisi terlebih dahulu
          </div>
          @enderror
        </div>
        <div class="form-floating">
          <div class="form-group input-group">
            <input name="password" type="password" class="form-control" id="pass" placeholder="Password" required style="border-right: 0px; hight:60px">
            <div class="input-group-prepend">
              <div class="input-group-text bg-white" style="border-radius: 0 0 5px 0;  border-left: 0px">
                <i class="bi bi-eye text-dark pass-icon" id="pass-icon"></i>
              </div>
            </div>
          </div>
          {{-- <label for="floatingPassword">Password</label> --}}
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
      </form>
    </main>
  </div>
  <small class="d-block text-center mt-3" style="color:white; width: 100%">Lupa Password? <a href="{{ url('password.forgot') }}"> Silahkan ubah password sekarang </a>| Belum Register? <a href="{{ url('/register2') }}">Silahkan register sekarang</a></small>
</div>
@endsection