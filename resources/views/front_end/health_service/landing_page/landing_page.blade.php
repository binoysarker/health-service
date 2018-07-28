<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script type="text/javascript">
      window.Laravel = {csrfToken: '{{ csrf_token() }}'};
    </script>
    <title>Health Service</title>
    <link rel="stylesheet" href="{{asset('public/css/app.css')}}">
  </head>
  <body>
    <div id="app">
      {{-- landing page view --}}
      <landing-component></landing-component>
    </div>
    <script type="text/javascript" src="{{asset('public/js/app.js')}}"></script>
  </body>
</html>
