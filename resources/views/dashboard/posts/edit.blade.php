@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Post</h1>
</div>

<div class="col-lg-8">
    <form method="post" action="/dashboard/posts/{{ $post->slug }}" enctype="multipart/form-data">
      @method('put')  
      @csrf
        <div class="mb-3">
          <label for="tittle" class="form-label">Tittle</label>
          <input type="text" name="tittle" class="form-control @error('tittle') is-invalid @enderror" id="tittle" autofocus value="{{ old('tittle', $post->tittle) }}">
          @error('tittle')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="slug" class="form-label">Slug</label>
          <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" id="slug" value="{{ old('slug', $post->slug) }}" required>
          @error('slug')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="categpry" class="form-label">Category</label>
          <select class="form-select" name="category_id" aria-label="Default select example">
            @foreach ($categories as $category)
            @if (old('category_id', $post->category_id) == $category->id)
              <option value="{{ $category->id }}" selected>{{ $category->name }}</option>  
            @else
              <option value="{{ $category->id }}">{{ $category->name }}</option> 
            @endif
            @endforeach  
          </select>
        </div>
        <div class="mb-3">
          <label for="image" class="form-label">Image Post</label>
          <input type="hidden" name="oldImage" value="{{ $post->image }}">
          @if ($post->image)
          <img src="{{ asset('storage/' . $post->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
          @else
          <img class="img-preview img-fluid mb-3 col-sm-5">
          @endif    
          <input class="form-control @error('image') is-invalid @enderror" type="file" name="image" id="gambar" onchange="previewImage()">
          @error('image')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="body" class="form-label">Body</label>
          @error('body')
              <p class="text-danger">{{ $message }}</p>
          @enderror
          <input id="body" type="hidden" name="body" value="{{ old('body', $post->body )}}" required>
          <trix-editor input="body"></trix-editor>
        </div>
        <button type="submit" class="btn btn-primary">Update Post</button>
    </form>
</div>

<script>
  const tittle = document.querySelector('#tittle');
  const slug = document.querySelector('#slug');

  tittle.addEventListener('change', function(){
    fetch('/dashboard/posts/checkSlug?tittle=' + tittle.value)
      .then(response => response.json())
      .then(data => slug.value = data.slug)
  });


  document.addEventListener('trix-file-accept', function(e){
    e.preventDefault();
  })


  function previewImage(){
    const image = document.querySelector('#gambar');
    const imgPreview = document.querySelector('.img-preview');

    imgPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent){
      imgPreview.src = oFREvent.target.result;
    }
  }
</script>
@endsection
