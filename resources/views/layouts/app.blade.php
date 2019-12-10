<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ env('APP_NAME') }}</title>
  <link rel="stylesheet" href="{{ secure_url('css/app.css') }}">
  @stack('styles')
</head>

<body>

  <nav class="navbar navbar-expand-sm navbar-light bg-light py-2">
    <div class="container">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
          aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
            <div class="dropdown-menu" aria-labelledby="dropdownId">
              <a class="dropdown-item" href="#">Action 1</a>
              <a class="dropdown-item" href="#">Action 2</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <main class="">
    @yield('content')
  </main>

  <footer class="py-4 border-top">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md mb-4">
          <h1>{{ env('APP_NAME') }}</h1>
            © 2019 {{ env('APP_NAME') }}. All rights reserved.
        </div>
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
      </div>
    </div>
  </footer>

  <script src="{{ secure_url('js/app.js') }}"></script>
  <script src="{{ secure_url('js/holder.js') }}"></script>
  @stack('scripts')
</body>

</html>