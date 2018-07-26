<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script type="text/javascript">
      window.Laravel = {csrfToken: '{{ csrf_token() }}'};
    </script>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('public/css/app.css')}}">
  </head>
  <body>
    <div  id="app">
      @yield('main_content')
    </div>
    <script type="text/javascript" src="{{asset('public/js/app.js')}}"></script>
  </body>
</html>
