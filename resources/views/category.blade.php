

@extends('layouts.main')

@section('container')

<h1 class="mb-5">Post Category : {{ $category }}</h1>

@foreach ($post as $data)

<article class="mb-5">
 <a href="/blog/{{ $data->slug }}">   <h2> {{ $data->title }} </h2> </a>

    {!! $data->excert !!}
</article>

@endforeach



@endsection

