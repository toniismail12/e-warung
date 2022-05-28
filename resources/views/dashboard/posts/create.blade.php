@extends('dashboard.layouts.main')

@section('container')


<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"><b>Tambah Data</b></h1>
</div>

<div class="col-lg-8">

<form method="post" action="/dashboard/posts/" enctype="multipart/form-data">
    @csrf
    <!-- <div class="mb-3">
        <label for="image" class="form-label"><b>Foto</b></label>

        <img class="img-preview img-fluid col-sm-5 mb-3 d-block">

        <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">

        @error('image')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div> -->
    
    <div class="mb-3">
      <label for="title" class="form-label"><b>Nama</b></label>
      <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required value="{{ old('title') }}">
      @error('title')
        <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
      </div>
 

    <div class="mb-3">
        <label for="slug" class="form-label"><b>NIK</b></label>
        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug') }}" required maxlength="16" minlength="16">
        @error('slug')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror

    </div>

    <div class="mb-3">
        <label for="ewarung" class="form-label"><b>E - Warung Pencairan</b></label>

        <select name="ewarung" class="form-control">
            <option value="">Pilih</option>
            @foreach($ewarung as $e)
                <option value="{{ $e->ewarung }}"> {{ $e->ewarung }}</option>
            @endforeach
            
        </select>
        
        @error('ewarung')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror

    </div>

      {{-- <div class="mb-3">

        <label for="category" class="form-label"><b>Category</b></label>

        <select class="form-select @error('category_id') is-invalid @enderror" name="category_id" >
            @foreach ($categories as $category)

            @if (old('category_id') == $category->id )

            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
            @else
            <option value="{{ $category->id }}">{{ $category->name }}</option>

            @endif
            @endforeach
        </select>

        </div> --}}

        <div class="mb-3">

            <label for="body" class="form-label"><b>Alamat</b></label>

            @error('body')

                <p class="text-danger">{{ $message }}</p>

              @enderror

            <input id="body" type="hidden" name="body" value="{{ old('body') }}">
            <trix-editor input="body"></trix-editor>

        </div>

        <style>
            trix-toolbar [data-trix-button-group="file-tools"]{
                display: none;
            }
        </style>

    <button type="submit" class="btn btn-primary mb-5">Simpan</button>
  </form>

</div>

<script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function()
    {
        fetch('/dashboard/posts/checkSlug?title=' + title.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)

    });

    document.addEventListener('trix-file-accept', function(e){
        e.preventDefault();
    });

    function previewImage()
    {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview')

        imgPreview.style.display = 'block';

        const ofReader = new FileReader();
        ofReader.readAsDataURL(image.files[0]);

        ofReader.onload = function(oFREvent)
        {
            imgPreview.src = oFREvent.target.result;
        }
    }



</script>

  @endsection
