

@extends('layouts.main')

@section('container')

<div class="container">
    <div class="row">
        @foreach ($category as $category)

        <div class="col-md-4">
            <div class="card bg-dark text-white">
                <img src="https://source.unsplash.com/400x300/?{{ $category->name }}" class="card-img" alt="{{ $category->name }}">
                <div class="card-img-overlay d-flex align-items-center">
                  <h5 class="card-title text-center flex-fill p-4 fs-3" style="background-color: rgba(0, 0, 0, 0.7)"><a href="/blog?category={{ $category->slug }}" class="text-white text-decoration-none"> {{ $category->name }} </a></h5>

                </div>
              </div>
        </div>
        @endforeach
    </div>
</div>

{{-- @foreach ($category as $category)

<ul>
    <li>
        <a href="/categories/{{ $category->slug }}">   <h2> {{ $category->name }} </h2> </a>

    </li>
</ul>



@endforeach --}}

@endsection

