@extends('dashboard.layouts.main')

@section('container')

<div class="container">
    <div class="row mb-5 mt-5">
        <div class="col-lg-8 ">

            <h1 class="mb-5"> {{ $post->title }}</h1>

            <a href="/dashboard/posts" class="btn btn-success"><i class="bi bi-arrow-left-square"></i> Back </a>

            <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning"> <i class="bi bi-pencil-square"></i> Edit </a>
            <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger" onclick="return confirm('anda yakin ingin menghapus ini?')"> <i class="bi bi-x-octagon-fill"></i> </button>

            </form>

            @if ($post->image)
                <div style="max-height: 350px; overflow:hidden">
                <img src="{{ asset('/storage/'.$post->image) }}" alt="{{ $post->category->name }}" class="img-fluid mt-3">
                </div>
            @else
               <img src="https://source.unsplash.com/1200x400/?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid mt-3">
            @endif

            <article class="my-3 fs-5">
                {!! $post->body !!}
            </article>

        </div>
    </div>
</div>

@endsection
