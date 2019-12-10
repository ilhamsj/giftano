<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ env('APP_NAME') }}</title>
  <link rel="stylesheet" href="{{ secure_url('css/app.css') }}">
  <style>
    #mainNav {
      font-size: 12pt;
    }
  </style>
  @stack('styles')
</head>

<body>

@php
    $menu = [
      'Home' => [
        'url' => route('welcome'),
        'icon' => '',
      ],
      'Product' => [
        'url' => route('admin'),
        'icon' => '',
      ],
      'Category' => [
        'url' => route('category.index'),
        'icon' => '',
      ],
      'Service' => [
        'url' => route('category.index'),
        'icon' => '',
      ],
    ];
@endphp

<nav class="navbar navbar-expand-lg navbar-light bg-transparent py-3" id="mainNav">
  <div class="container">
    <a class="navbar-brand font-weight-bold" href="index.html">{{ env('APP_NAME') }}</a>
      <button class="navbar-toggler navbar-toggler-right p-2" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
          @foreach ($menu as $key => $val)
            <li class="nav-item {{ $val['url'] == URL::current() ? '' : ''}}">
                <a class="nav-link" href="{{ $val['url']}}">{{ $key }}</a>
            </li>
          @endforeach
      </ul>
    </div>
  </div>
</nav>

  <main class="">
    @yield('content')
  </main>

  <footer class="py-4 border-top">
    <div class="container">
      <div class="row flex-row-reverse">
        <div class="col col-md-2">
          <h6>{{ env('APP_NAME') }}</h6>
            <a href="#" class="text-muted">About</a><br>
            <a href="#" class="text-muted">Help</a><br>
            <a href="#" class="text-muted">Contact</a><br>
            <a href="#" class="text-muted">Careers</a><br>
            <a href="#" class="text-muted">Terms</a><br>
            <a href="#" class="text-muted">Guidelines</a><br>
            <a href="#" class="text-muted">Privacy</a><br>
            <a href="#" class="text-muted">Playoffs</a><br>
        </div>
        <div class="col col-md-2">
            <h6>Feature</h6>
            <a href="Shop" class="text-muted">Shop</a> <br/>
            <a href="Testimonials" class="text-muted">Testimonials</a> <br/>
            <a href="MediaKit" class="text-muted">MediaKit</a> <br/>
            <a href="Advertise" class="text-muted">Advertise</a> <br/>
            <a href="API" class="text-muted">API</a> <br/>
            <a href="Apps" class="text-muted">Apps</a> <br/>
            <a href="Places" class="text-muted">Places</a> <br/>
        </div>
        <div class="col-12 col-md mb-4">
          <h1>{{ env('APP_NAME') }}</h1>
            © 2019 {{ env('APP_NAME') }}. All rights reserved.
        </div>
      </div>
    </div>
  </footer>

  <script src="{{ secure_url('js/app.js') }}"></script>
  <script src="{{ secure_url('js/holder.js') }}"></script>
  @stack('scripts')
</body>

</html>