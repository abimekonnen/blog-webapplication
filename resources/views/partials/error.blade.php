@if ($errors->any)
            
<ul class="list-group">
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">
            <li class="list-group-item text-danger ">
                {{ $error }}
            </li>    
        </div> 
    @endforeach
</ul>

@endif