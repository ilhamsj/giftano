<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>
    <link rel="stylesheet" href="{{ secure_url('css/app.css') }}">
    @stack('styles')

  </head>

  <body>

    @yield('content')
  
    <script src="{{ secure_url('js/app.js') }}"></script>
    <script src="{{ secure_url('js/holder.js') }}"></script>
    @stack('scripts')
  </body>
</html>
