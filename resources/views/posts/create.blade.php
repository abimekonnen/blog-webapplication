@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-end m-2">
    <a href={{ route('post.create') }} class="btn btn btn-success float-right">Add Posts</a> 
</div>
<div class="card" >
    <div class="card-header bg-transparent border-success">
      {{ isset($post)? 'Edit Post':'Creat Post' }}
    </div>
    <div class="card-body">
      @include('partials.error')
        <form action="{{ isset($post)? route('post.update',$post->id): route('post.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if (isset($post))
              @method('PUT')
            @endif
          
            <div class="row mb-3">
                <label for="title" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-10">
                  <input type="txt" class="form-control" id="title" name="title" value="{{ isset($post)? $post->title:''}}">
                </div>
            </div>
            <div class="row mb-3">
                <label for="discription" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                  <textarea type="txt" class="form-control" id="discription"  name="discription"  >{{ isset($post)? $post->discription:''}}</textarea>
                </div>
            </div>
            <div class="row mb-3">
                <label for="content" class="col-sm-2 col-form-label" >Content</label>
                <div class="col-sm-10">
                  <input id="content" value="{{ isset($post)? $post->content:''}}" type="hidden" name="content">
                  <trix-editor input="content"></trix-editor>
                </div>
            </div>
            <div class="row mb-3">
                <label for="pdescriptionublished_at" class="col-sm-2 col-form-label">Published At </label>
                <div class="col-sm-10">
                  <input  type="text" class="form-control" id="published_at" name="published_at" value="{{ isset($post)? $post->published_at:''}}" >
                </div>
            </div>
            @if (isset($post))
              <div class="row mb-3">
                <img src="  {{ asset($src = 'storage/'. str_replace('public/', '', $post->image)) }}"
                width="100%" height="60px" alt="test">  
              </div>
            @endif
            <div class="row mb-3">
                <label for="image" class="col-sm-2 col-form-label">Image</label>
                <div class="col-sm-10">
                  <input  type="file" class="form-control" id="image" name="image" >
                </div>
            </div>
              <div class="row mb-3">
                <label for="category" class="col-sm-2 col-form-label">Category</label>
                <div class="col-sm-10">
                  <select  id="category" name="category"  class="form-control" >
                      @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                          @if (isset($post))
                            @if ($category->id == $post->category_id)
                              selected
                            @endif
                          @endif
                          >
                          {{ $category->name }}
                        </option>
                      @endforeach
                  </select>
                </div>
              </div>
              <div class="row mb-3">
                @if ($tags->count())
                  <label for="category" class="col-sm-2 col-form-label">Tags</label>
                  <div class="col-sm-10">
                    <select  id="tags" name="tags[]"  class="form-control tags-selector" multiple="multiple">
                        @foreach ($tags as $tag)
                          <option value="{{ $tag->id }}"
                            @if (isset($post))
                              @if ($post->hasTag($tag->id))
                                selected
                              @endif
                            @endif
                              >
                            {{ $tag->name }}
                          </option>
                        @endforeach
                    </select>
                  </div>
                @endif
                
              </div>
            <button type="submit" class="btn btn-success"> 
             
              {{ isset($post)?'Update Post' : ' Create Post'}}
            </button>
        </form>
    </div>
</div>

@endsection

@section("scripts")
  <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js" integrity="sha512-2RLMQRNr+D47nbLnsbEqtEmgKy67OSCpWJjJM394czt99xj3jJJJBQ43K7lJpfYAYtvekeyzqfZTx2mqoDh7vg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <script>
    flatpickr("#published_at",{
      enableTime: true
    });

    $(document).ready(function() {
        $('.tags-selector').select2();
    });
  </script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

@endsection
@section("css")
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css" integrity="sha512-5m1IeUDKtuFGvfgz32VVD0Jd/ySGX7xdLxhqemTmThxHdgqlgPdupWoSN8ThtUSLpAGBvA8DY2oO7jJCrGdxoA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection