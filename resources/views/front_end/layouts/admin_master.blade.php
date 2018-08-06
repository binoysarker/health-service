<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  {{-- <script type="text/javascript">
  window.Laravel = {csrfToken: '{{ csrf_token() }}'};
  </script> --}}
  <meta http-equiv="Access-Control-Allow-Origin" content="*" />
  <meta http-equiv="Access-Control-Allow-Headers" content="X-Requested-With" />
  <title>@yield('title')</title>
  <link rel="stylesheet" href="{{asset('public/css/app.css')}}">
  <link rel="stylesheet" href="{{asset('public/css/myCustomCss.css')}}">
</head>
<body class="has-navbar-fixed-bottom"> {{--this class is used to show the chat box at bottom--}}
  <div  id="app">
    <div class="columns">
      <div class="column">
        {{-- admin-navbar start --}}
        <admin-navbar></admin-navbar>
        {{-- admin-navbar end --}}
      </div>
    </div>
    {{-- dashboard section start --}}
    <section class="sectio">
      <div class="columns">
        {{-- admin sidebar section start --}}
        <div class="column is-2">
          <admin-sidebar></admin-sidebar>
        </div>
        {{-- admin sidebar section end --}}
        {{-- admin main_content section start --}}
        <div class="column">
          @yield('main_content')
        </div>
        {{-- admin main_content section end --}}

      </div>
    </section>
    {{-- dashboard section end --}}
  </div>
  <script type="text/javascript" src="{{asset('public/js/app.js')}}"></script>
</body>
</html>
