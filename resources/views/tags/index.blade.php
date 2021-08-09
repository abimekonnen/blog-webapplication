

@extends('layouts.app')
  
@section('content')

        <!-- Styles -->
        {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

        <!-- Scripts -->
        {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> --}}
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/bootstrap.min.js') }}" defer></script>

<div class="d-flex justify-content-end m-2">
    <a href={{ route('tags.create') }} class="btn btn btn-success float-right">Add Tags</a> 
</div>    
<div class="card" >  
    <div class="card-header bg-transparent border-success"> Tags</div>
    <div class="card-body"> 
        <table class="table table-hover">
            <thead>
                <th>Name</th>
                <th>Posts Count</th>
                <th></th>
                <th></th>
            </thead> 
            <tbody>
               @foreach ($tags as $tag )
                   <tr>
                       <td>
                           {{ $tag->name }}
                       </td>
                       <td>
                           {{ $tag->posts->count() }}
                       </td>
                       <td>
                           <a href="{{ route('tags.edit',$tag->id) }}" class="btn btn-primary btn-sm">
                               Edit
                           </a>
                       </td>
                       <td>
                            <a  class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal"
                                onclick="handleDelete({{ $tag->id }} ) ">
                                Delete
                            </a>
                        </td>
                   </tr>
               @endforeach 
            </tbody>

        </table>
        <form action="" method="POST" id="deleteCategoryForm">
            @csrf
            @method('DELETE')
            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <p class="text-center text-denger text-bold" id="deleteMessage">
                        Are You Sure Want to Delete 
                      </p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-primary" data-bs-dismiss="modal">No Go back </button>
                      <button type="submit" class="btn btn-danger">Yes Delete</button>
                    </div>
                  </div>
                </div>
            </div>
        </form>

    </div>
</div>   

@endsection

@section('scripts')
<script>
    function handleDelete(id){
        var form = document.getElementById('deleteCategoryForm');
        var message = document.getElementById('deleteMessage');
        //message.innerText = ' Are You Sure Want to Delete ' + name;
        form.action ='tags/' + id;
        console.log(form);
    }
</script>
@endsection