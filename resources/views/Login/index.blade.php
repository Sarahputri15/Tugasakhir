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
          <select class="form-select" name="tahun" aria-label="Default select example" id="admin" style="border-radius: 0%">
            @foreach($years as $y)
            <option value="{{ $y->id }}">{{ $y->years }}</option>
            @endforeach
          </select>
          <label for="admin">Tahun Pengadaan</label>
        </div>
        <div class="form-floating">
          <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password" required>
          <label for="floatingPassword">Password</label>
        </div>
        
        <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
      </form>
      <!--<small class="d-block text-center mt-3" style="color:white">Belum Register? <a href="{{ url('/register2') }}">Silahkan register sekarang</a></small>-->
    </main>
  </div>
</div>

@endsection