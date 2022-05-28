@extends('dashboard.layouts.main')

@section('container')


    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><b>Edit Password</b></h1>
    </div>

    @if (session()->has('success'))

        <div class="alert alert-warning col-lg-12" role="alert">
            {{ session('success') }}
        </div>

    @endif

    <div class="col-lg-8">

        <form method="post" action="/new-password" enctype="multipart/form-data">
            @csrf
        
            <div class="mb-3">
            <label for="title" class="form-label"><b>New Password</b></label>
            <input type="text" class="form-control shadow @error('password') is-invalid @enderror" id="password" name="password" required value="{{ old('password') }}">
            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary mb-5">Simpan</button>
        </form>

    </div>


  @endsection

