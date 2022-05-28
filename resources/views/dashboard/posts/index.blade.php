@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Penerima bantuan</h1>

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

  <div class="table-responsive">
    @can("admin")
     <a href="/dashboard/posts/create" class="btn btn-success mb-3"> Tambah Data </a>
     @endcan
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama</th>
          <th>E-Warung Pencairan</th>
          {{-- <th scope="col">Category</th> --}}
          <th scope="col">alamat</th>
          @can("admin")
          <th scope="col">Action</th>
          @endcan 

        </tr>
      </thead>
      <tbody>
    
@foreach ($posts as $post)

    <tr>
        <td>{{ $loop->iteration }} </td>
        <td>{{ $post->title }} <br>
        {{$post->slug}}
        </td>
        <td>{{ $post->ewarung }}</td>
        {{-- <td>{{ $post->category->name }} </td> --}}
        <td>{!! $post->body !!} </td>
        
        @can("admin")
        <td>
            <!-- <a href="/dashboard/posts/{{ $post->slug }}" class="btn btn-success text-white text-decoration-none"><i class="bi bi-eye"></i> </a> -->
            <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning text-dark text-decoration-none"><i class="bi bi-pencil-square"></i> </a>
            <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger" onclick="return confirm('anda yakin ingin menghapus ini?')"> <i class="bi bi-x-octagon-fill"></i> </button>

            </form>
            <a href="/reset-password/{{ $post->slug }}" class="btn btn-primary" onclick="return confirm('anda yakin ingin reset password?')"> <i class="bi bi-key"></i> </a>
        </td>
        @endcan
    </tr>

@endforeach


      </tbody>
    </table>
  </div>

@endsection
