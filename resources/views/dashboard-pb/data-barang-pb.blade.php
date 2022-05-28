@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data Barang</h1>

  </div>

  @if (session()->has('succes'))

    <div class="alert alert-warning col-lg-8" role="alert">
      {{ session('succes') }}
    </div>

  @endif

  @if (session()->has('success'))

    <div class="alert alert-success col-lg-12" role="alert">
        {{ session('success') }}
    </div>

  @endif

  <a href="/keranjang-saya" class="btn btn-sm btn-success mb-2"><i class="bi bi-basket"></i> Keranjang</a>
  <div class="table-responsive">
    
    <table class="table table-striped table-sm table-bordered">
      <thead>
        <tr>

          <th scope="col">#</th>
          <th scope="col">Nama Barang</th>
          <th scope="col">Harga</th>
          <th>Act</th>

        </tr>
      </thead>
      @foreach ($barang as $data)
      <tbody>

        <tr>
            <td>{{ $loop->iteration }} </td>
            <td>{{ $data->nama_barang }} </td>
            <td>{{ $data->harga }} </td>
            <td><a href="/add-keranjang/{{ $data->id }}" class="btn btn-sm btn-primary">Add</a></td>
        </tr>

      </tbody>
      @endforeach
    </table>
  </div>

@endsection
