
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <title>
     @yield('title')
    
    </title>

    <!-- Styles -->
    <link href="{{ asset('css/page.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="{{ asset('img/apple-touch-icon.png') }}">
    <link rel="icon" href=" {{ asset('img/favicon.png') }}">
  </head>

  <body >


    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light navbar-stick-dark" data-navbar="sticky">
      <div class="container">

        <div class="navbar-left">
          <button class="navbar-toggler" type="button">&#9776;</button>
          <a class="navbar-brand" href="{{ route('home') }}">
            <img class="logo-dark" src="{{ asset('img/logo-dark.png') }}" alt="logo">
            <img class="logo-light" src="{{ asset('img/logo-light.png') }}" alt="logo">
          </a>
        </div>

        <section class="navbar-mobile">
          <span class="navbar-divider d-mobile-none"></span>

          <ul class="nav nav-navbar">
           
          </ul>
        </section>
        @if (Route::has('login'))
          
                @auth
                    <a href="{{ url('/dashboard') }}" class="btn btn-xs btn-round btn-success">home</a>
                    <form method="POST" action="{{ route('logout') }}" class="btn btn-xs btn-round btn-success ml-2">
                      @csrf
                      <a  :href="route('logout')"
                              onclick="event.preventDefault();
                                          this.closest('form').submit();">
                         Log Out
                      </a >
                  </form>
                @else
                    <a class="btn btn-xs btn-round btn-success ml-2" href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                      <a class="btn btn-xs btn-round btn-success ml-2" href="{{ route('register') }}">Registor</a>
                    @endif
                @endauth
            </div>
        @endif
     
     

      </div>
    </nav><!-- /.navbar -->


    <!-- Header -->
    @yield('header')
  <!-- /.header -->


    <!-- Main Content -->
     @yield('content')

    <!-- Footer -->
    <footer class="footer" style="height: 20vmin">
      <div class="container">
        <div class="row gap-y align-items-center">

          <div class="col-6 col-lg-3">
            <a href="#"><img src="{{ asset('img/logo-dark.png') }}" alt="logo"></a>
          </div>

          <div class="col-6 col-lg-3 text-right order-lg-last">
            <div class="social">
              <a class="social-facebook" href="https://www.facebook.com/thethemeio"><i class="fa fa-facebook"></i></a>
              <a class="social-twitter" href="https://twitter.com/thethemeio"><i class="fa fa-twitter"></i></a>
              <a class="social-instagram" href="https://www.instagram.com/thethemeio/"><i class="fa fa-instagram"></i></a>
              <a class="social-dribbble" href="https://dribbble.com/thethemeio"><i class="fa fa-dribbble"></i></a>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="nav nav-bold nav-uppercase nav-trim justify-content-lg-center">
              <a class="nav-link" href="../uikit/index.html">Elements</a>
              <a class="nav-link" href="../block/index.html">Blocks</a>
              <a class="nav-link" href="../page/about-1.html">About</a>
              <a class="nav-link" href="../blog/grid.html">Blog</a>
              <a class="nav-link" href="../page/contact-1.html">Contact</a>
            </div>
          </div>

        </div>
      </div>
    </footer ><!-- /.footer -->


    <!-- Scripts -->
    <script src="{{ asset('js/page.min.js"') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>

  </body>
</html>


