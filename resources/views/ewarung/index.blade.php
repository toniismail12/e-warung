@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">E Warung</h1>

  </div>

  @if (session()->has('succes'))

  <div class="alert alert-warning col-lg-8" role="alert">
    {{ session('succes') }}
  </div>

  @endif

  <div class="table-responsive">
    @can("admin")
     {{-- <a href="/dashboard/posts/create" class="btn btn-success mb-3"> Tambah Data </a> --}}
    @endcan
    
  </div>

@endsection
