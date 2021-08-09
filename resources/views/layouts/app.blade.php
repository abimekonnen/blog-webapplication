<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/bootstrap.min.js') }}" defer></script>
        @yield("css")
    </head>
    <body class="font-sans antialiased" style="padding-bottom: 5%">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            {{-- <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header> --}}

            <!-- Page Content -->
            <main>

                <div class="container">
                    @if (session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div> 
                    @endif
                    @if (session()->has('error'))
                        <div class="alert alert-danger">
                            {{ session()->get('error') }}
                        </div> 
                     @endif
                    <div class="row">
                        <div class="col-md-4 mt-5" >
                           <ul class="list-group">
                               @if (auth()->user()->isAdmin())
                                    <li class="list-group-item" >
                                      <a href="{{ route('users.index',) }}" >user</a>
                                    </li>
                               @endif
                               <li class="list-group-item" >
                                   <a href="{{ route('post.index',)}}" >Post</a>
                               </li>
                               <li class="list-group-item">
                                    <a href="{{ route('trashed-posts.index') }}" >Trashed Post</a>
                                </li>
                                @if (auth()->user()->isAdmin())
                                    <li class="list-group-item" >
                                        <a href="{{ route('tags.index',) }}" >Tag</a>
                                    </li>
                                @endif
                                @if (auth()->user()->isAdmin())
                                    <li class="list-group-item" >
                                        <a href="{{ route('categories.index',) }}" >Category</a>
                                    </li>
                                @endif
                           </ul>     
                        </div>
                        <div class="col-md-8">
                            {{-- {{ $slot }} --}}
                            @yield('content')
                        </div>
                    </div>
                </div>

            </main>
        </div>
        
    </body>

    @yield('scripts')
</html>
