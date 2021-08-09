@extends('layouts.app')
  
@section('content')

<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="{{ asset('js/bootstrap.min.js') }}" defer></script>

  
<div class="card mt-12" > 

    <div class="card-header bg-transparent border-success">
       {{ isset($tag) ? 'Edit tag': 'Create tag' }}
    </div>
    <div class="card-body"> 
        @include('partials.error')
        <form action="{{ isset($tag) ?route('tags.update',$tag->id) : route('tags.store') }}" method="POST">
            @csrf
            @if (isset($tag))
                 @method('PUT')
            @endif   
            <div class="row mb-3">
              <label for="name" class="col-sm-2 col-form-label">Name</label>
              <div class="col-sm-10">
                <input type="txt" class="form-control" id="name" name="name" value=" {{ isset($tag) ? $tag->name: '' }}">
              </div>
            </div>
            <button type="submit" class="btn btn-success"> {{ isset($tag) ? 'Update tag': 'Add tag' }}
            </button>
        </form>
    
    </div>
</div>   

@endsection