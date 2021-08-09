@extends('layouts.app')

@section('content')

<div class="card mt-5">
    <div class="card-header bg-transparent border-success ">Posts</div>
    <div class="card-body">
        @if ($users->count()>0)
        <table class="table table-hover">
            <thead>
                {{-- <th>image</th> --}}
                <th>Name</th>
                <th>Email</th>
                <th></th>
                <th></th>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        {{-- <td>
                            <img width="40px" hehight="40px" style="border-redios: 50%" src="{{ Gravatar::src($user->image) }}">
                        </td> --}}
                        <td>
                    
                            {{ $user->name }}
                        </td>
                        <td>
                            {{ $user->email }}
                        </td>
                        <td>
                    
                        </td>
                        {{-- <td>
                            <form action="{{ route('users.make-admin',$user) }}" method="POST">
                                @csrf
                                @if ($user->isAdmin())
                                    <button type="submit" class="btn btn-success btn-sm">Make writer</button>
                                @else
                                    <button  type="submit"  class="btn btn-success btn-sm">Make admin</button>
                                @endif
                            </form>
                       
                           
                        </td> --}}
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
            <h3 class="text-center">No user Yet</h3>
           
        @endif

    </div>
</div>

@endsection 