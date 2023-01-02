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

    @if(session()->has('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{ session('error') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <img class="mb-3 rounded mx-auto d-block" src="/gambar/Lambang_ITK.png" alt="" width="72" height="75">
    <h1 class="h3 mb-3 fw-normal text-center" style="color:white">Reset Password</h1>
    <div class="card">
      <div class="card-body">
        <main class="form-signin">
          <form action="{{ url('password.reset') }}" method="post">
            @csrf
            <div class="form-floating">
              <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput" placeholder="name@example.com" required value="{{ old('email') }}" style="border-bottom-left-radius: 5px;border-bottom-right-radius: 5px">
              <label for="floatingInput">Email address</label>
              @error('email')
              <div id="validationServerUsernameFeedback" class="invalid-feedback">
                  Email Belum Terdaftar
              </div>
              @enderror
            </div>
            <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Verifikasi Email</button>
          </form>
          <small class="d-block text-center mt-3" style="color:white; width: 100%"><a href="{{ url('/Login') }}">Kembali ke halaman Login</a></small>
        </main>
      </div>
    </div>
  </div>
</div>

@endsection