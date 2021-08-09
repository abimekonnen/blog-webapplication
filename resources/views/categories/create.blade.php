@extends('layouts.app')
  
@section('content')

<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="{{ asset('js/bootstrap.min.js') }}" defer></script>

  
<div class="card mt-12" > 

    <div class="card-header bg-transparent border-success">
       {{ isset($category) ? 'Edit Category': 'Create Category' }}
    </div>
    <div class="card-body"> 
        @include('partials.error')
        <form action="{{ isset($category) ?route('categories.update',$category->id) : route('categories.store') }}" method="POST">
            @csrf
            @if (isset($category))
                 @method('PUT')
            @endif   
            <div class="row mb-3">
              <label for="name" class="col-sm-2 col-form-label">Name</label>
              <div class="col-sm-10">
                <input type="txt" class="form-control" id="name" name="name" value=" {{ isset($category) ? $category->name: '' }}">
              </div>
            </div>
            <button type="submit" class="btn btn-success"> {{ isset($category) ? 'Update Category': 'Add Category' }}
            </button>
        </form>
    
    </div>
</div>   

@endsection