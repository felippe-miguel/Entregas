<html>
  <head>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <title>Entregas - @yield('title')</title>
  </head>
  <body>
    @include('partials.navbar')

    <div class="container">
      @if(Session::has('message'))
        <div class="alert alert-{{Session::get('status')}} mt-5" role="alert">
          {{ Session::get('message') }}
        </div>
      @endif
    </div>

    @yield('content')
  </body>
</html>