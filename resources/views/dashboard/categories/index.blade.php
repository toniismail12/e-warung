@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Categories</h1>

  </div>

  @if (session()->has('succes'))

  <div class="alert alert-warning col-lg-8" role="alert">
    {{ session('succes') }}
  </div>

  @endif

  <div class="table-responsive">
      <a href="/dashboard/categories/create" class="btn btn-success mb-3"> New Category </a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Category Name</th>
          <th scope="col">Action</th>

        </tr>
      </thead>
      <tbody>
@foreach ($categories as $x)

    <tr>
        <td>{{ $loop->iteration }} </td>
        <td>{{ $x->name }} </td>
        <td>
            {{-- <a href="/dashboard/categories/{{ $x->slug }}" class="btn btn-success text-white text-decoration-none"><i class="bi bi-eye"></i> </a> --}}
            <a href="/dashboard/categories/{{ $x->slug }}/edit" class="btn btn-warning text-dark text-decoration-none"><i class="bi bi-pencil-square"></i> </a>
            <form action="/dashboard/categories/{{ $x->slug }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger" onclick="return confirm('anda yakin ingin menghapus ini?')"> <i class="bi bi-x-octagon-fill"></i> </button>

            </form>
        </td>
    </tr>

@endforeach


      </tbody>
    </table>
  </div>

@endsection
