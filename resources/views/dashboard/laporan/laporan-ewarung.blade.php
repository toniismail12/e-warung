@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Laporan E-Warung</h1>

  </div>

  @if (session()->has('succes'))

  <div class="alert alert-warning col-lg-8" role="alert">
    {{ session('succes') }}
  </div>

  @endif

  <div class="table-responsive">

   @can('admin')
  <a href="/export-data" class="btn btn-primary mb-3"> Download Laporan</a>
  @endcan   

    <table class="table table-striped table-sm">
      <thead>
        <tr>
        <th scope="col">Action</th>
          <th scope="col">#</th>
          <th scope="col">Nama</th>
          <th>Keterangan</th>
          <th scope="col">Category</th>
          <th scope="col">alamat</th>
          <th>Barang</th>
        </tr>
      </thead>
      <tbody>
    
@foreach ($data as $post)

    <tr>
        <td>

            <a href="/selesai-pencairan/{{$post->id}}" class="btn btn-success text-white text-decoration-none"><span class="iconify" data-icon="bi:check-circle"></span> </a>
          
        </td>
        <td>{{ $loop->iteration }} </td>
        <td>{{ $post->title }} <br>
        {{$post->slug}}
        </td>
        <td>{{ $post->keterangan}}</td>
        {{-- <td>{{ $post->category->name }} </td> --}}
        <td>{!! $post->body !!} </td>
        <td><a href="/lihat-keranjang/{{ $post->slug }}">Lihat Barang</a></td>
       
    </tr>

@endforeach


      </tbody>
    </table>
  </div>

@endsection
