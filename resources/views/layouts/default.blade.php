<!DOCTYPE html>
<html>
  <head>
    <title>@yield('title', 'Weibo App') - Laravel 入门教程</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
  </head>
  <body>

    @include('layouts._header')
    @include('shared._messages')
    <div class="container">
      @yield('content')
      @include('layouts._footer')
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
  </body>
</html>