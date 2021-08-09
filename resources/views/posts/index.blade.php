@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-end m-2">
    <a href={{ route('post.create') }} class="btn btn btn-success float-right">Add Posts</a> 
</div>
<div class="card">
    <div class="card-header bg-transparent border-success">Posts</div>
    <div class="card-body">
        @if ($posts->count()>0)
        <table class="table table-hover">
            <thead>
                <th>image</th>
                <th>Title</th>
                <th>Category</th>
                <th></th>
                <th></th>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>
                            <img src="  {{ asset($src = 'storage/'. str_replace('public/', '', $post->image)) }}"
                            width="110px" height="60px" alt="test">  
                        </td>
                        <td>
                    
                            {{ $post->title }}
                        </td>
                        <td>
                            <a href="{{ route('categories.edit',$post->category->id) }}">
                                {{ $post->category->name }}
                            </a>
                        </td>
                        <td>
                            @if (!$post->trashed())
                                <a href="{{ route('post.edit',$post->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            @else
                                <form action="{{ route('restore-post',$post->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button  class="btn btn-primary btn-sm">Restore</button>
                                </form>
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('post.destroy',$post->id) }}" method="POST">
                                @csrf 
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    {{ $post->trashed()? 'Delete' : 'Trash'}}
                                </button>
                            </form>
                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @else
            {{-- @foreach ($posts as $post )
                @if (!$post->trashed())
                    <h3 class="text-center">No Posts Yet</h3>
                @else 
                    <h3 class="text-center">No Trash Posts Yet</h3>
                @endif 
            @endforeach --}}
            <h3 class="text-center">No Posts Yet</h3>
           
        @endif

    </div>
</div>

@endsection