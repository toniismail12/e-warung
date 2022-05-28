@extends('dashboard.layouts.main')

@section('container')


    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><b>Tambah Barang</b></h1>
    </div>

    @if (session()->has('success'))

        <div class="alert alert-warning col-lg-12" role="alert">
            {{ session('success') }}
        </div>

    @endif

    <div class="col-lg-8">

        <form method="post" action="/tambah-barang-proses" enctype="multipart/form-data">
            @csrf
        
            <div class="mb-3">
                <label for="title" class="form-label"><b>Nama Barang</b></label>
                <input type="text" class="form-control shadow @error('nama_barang') is-invalid @enderror" id="nama_barang" name="nama_barang" required value="{{ old('nama_barang') }}">
                @error('nama_barang')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="title" class="form-label"><b>Harga</b></label>
                <input type="text" class="form-control shadow @error('harga') is-invalid @enderror" id="harga" name="harga" required value="{{ old('harga') }}">
                @error('harga')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary mb-5">Simpan</button>
        </form>

    </div>

    


  @endsection

