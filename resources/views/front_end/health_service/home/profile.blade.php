@extends('front_end.layouts.master')
@section('title')
  Health Service | Home
@endsection
@section('main_content')
  {{-- navbar column section --}}
  @include('front_end/layouts/partials/Navbar')
  {{-- main content section of profile start --}}
  <div class="columns">
    {{-- profile section --}}
    <div class="column">
      <div class="columns">
        {{-- show profile picture start --}}
        <div class="column">
          <profile-picture></profile-picture>
        </div>
        {{-- show profile picture end --}}
      </div>
      {{-- second section with timeline,photo,friends start --}}
      <div class="column">
        <sub-navbar></sub-navbar>
      </div>
      {{-- second section with timeline,photo,friends end --}}
      {{-- this row is to show intro on the left and making post section on the right --}}
      <div class="columns">
        {{-- intro section --}}
        <div class="column">
          <intro-section></intro-section>
        </div>
        {{-- making post, photo/video section  --}}
        <div class="column">
          <post-section></post-section>
        </div>
      </div>
    </div>

    {{-- donners online start --}}
    <div class="column">
      <donner-online auth_name="{{auth()->user()->name}}"></donner-online>
    </div>
    {{-- donners online end --}}
  </div>
  {{-- main content section of profile end --}}
@endsection  
