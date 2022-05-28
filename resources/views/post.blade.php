

@extends('layouts.main')

@section('container')

<h1 class="text-center mb-3"> Cek Data Penerima </h1>

<div class="container">
    <div class="row justify-content-center mb-3">
        <div class="col-md-5">
        <form action="/blog" method='get'>
            @csrf
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="masukkan nik" name="nik">
                <button class="btn btn-primary" type="submit">Cari</button>
              </div>

        </form>
        </div>
    </div>



<div class="row justify-content-center mb-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="body">
                    @if($nama !== "" && $p == "oke")
                    <div class="row">
                        <div class="col-lg-12 mb-3">
                            <center><label for="">Anda Terdaftar Sebagai Penerima Bantuan, Berikut Data Anda:</label></center>
                        </div>
                        <div class="col-lg-6">
                            <label for=""> Nama</label>
                            <input type="text" class="form-control" disabled value="{{ $nama }}">
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for=""> Alamat</label>
                            <input type="text" class="form-control" disabled value="{{ $alamat }}">
                        </div>
                    </div>
                    @elseif($p == "nil")
                    <div class="col-lg-12 mb-3">
                        <center><label for="">Data Tidak Di Temukan</label></center>
                    </div>
                    @endif
                </div>
            </div>
       
        </div>
    </div>


   
</div>



@endsection

