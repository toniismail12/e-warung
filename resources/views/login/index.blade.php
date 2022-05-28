@extends('layouts.main')

@section('container')

<div class="row justify-content-center">
    <div class="col-md-4">

        @if (session()->has('succes'))

        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            {{ session('succes') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>

        @endif

        @if (session()->has('login_error'))

        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('login_error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>

        @endif
 
<main class="form-signin">

<div class="col-lg-12 mb-2 mb-md-0 text-center">
      
      <img src="/img/log.jpg" alt="foto" width="50%" class="img-thumbnail">
 </div>

    <form action="/login" method="post">
        @csrf
      {{-- <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> --}}
      <h1 class="h3 mb-3 fw-normal text-center">Please Login</h1>

      <div class="form-floating mb-3">
        <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="floatingInput" placeholder="Username" autofocus required value="{{ old('username') }}">
        <label for="floatingInput">Username</label>
        @error('username')
        <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
      </div>
      <div class="form-floating">
        <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
        <label for="floatingPassword">Password</label>
         @error('password')
        <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
      </div>

      <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
      {{-- <p class="mt-5 mb-3 text-muted">Laravel Login cantik &copy; 2021</p> --}}
    </form>
    <!-- <small class="d-block text-center mt-3" > Belum Daftar ? Silahkah Daftar <a href="/register" >Disini.</a></small> -->
  </main>
    </div>
</div>


@endsection
