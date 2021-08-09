@extends('layouts.app')

@section('content')
<div class="card mt-5">
    <div class="card-header">My profile</div>

    <div class="card-body">
        @include('partials.error')
        <form action="{{ route('user.update-profile', $user) }}" method="POST">
            @csrf
            @method('Put')
            <div class="row mb-3">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                  <input type="txt" class="form-control" id="name" name="name" value="{{ $user->name }}">
                </div>
            </div>
            <div class="row mb-3">
                <label for="Password" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                  <input type="txt" class="form-control" id="Password" name="Password" value="{{ $user->password }}">
                </div>
            </div>
            <div class="row mb-3">
                <label for="discription" class="col-sm-2 col-form-label">About Me</label>
                <div class="col-sm-10">
                  <textarea type="txt" class="form-control" id="discription" name="about"  value="{{ $user->about }}">{{ $user->about }}</textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-success"> 
                Updte Profile
              </button>
        </form>
    </div>
</div>
@endsection
