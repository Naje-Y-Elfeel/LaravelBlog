<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/extra.css') }}" rel="stylesheet">


</head>
<body>
    <div id="app">
      @include('elements.navbar')


        <div class="container">
          <br>
          @include('elements.flash')

          @yield('content')

        </div>
      </div>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="/blog/resources/js/ckeditor-4.11.4-standard/ckeditor/ckeditor.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

  </body>
</html>
