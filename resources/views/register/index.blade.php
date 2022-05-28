@extends('layouts.main')

@section('container')

<div class="row justify-content-center">
    <div class="col-lg-4">



<main class="form-signin">
    <form action="/register" method="post">
        @csrf
      {{-- <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> --}}
      <h1 class="h3 mb-3 fw-normal text-center">Form Pendaftaran</h1>

      <div class="form-floating mb-3">
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Nama" required value="{{ old('name') }}">
        <label for="name">Nama</label>
        @error('name')
        <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
      </div>

      <div class="form-floating mb-3">
        <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Nama" required value="{{ old('username') }}">
        <label for="username">username</label>
        @error('username')
        <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
      </div>

      <div class="form-floating mb-3">
        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" required value="{{ old('email') }}">
        <label for="floatingInput">Email address</label>
        @error('email')
        <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
      </div>

      <div class="form-floating">
        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" required >
        <label for="password">Password</label>
        @error('password')
        <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
      </div>

      <button class="w-100 btn btn-lg btn-primary mt-2" type="submit">Daftar</button>
      {{-- <p class="mt-5 mb-3 text-muted">Laravel Login Toni &copy; 2021</p> --}}
    </form>
    <small class="d-block text-center mt-3" > Sudah Daftar ? Silahkah Login <a href="/login" >Disini.</a></small>
  </main>
    </div>
</div>


@endsection
