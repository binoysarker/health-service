@extends('front_end.layouts.master')
@section('title')
  Health Service | Home
@endsection
@section('main_content')
  {{-- navbar column section --}}
  @include('front_end/layouts/partials/Navbar')
  <section class="section">
    {{-- main content section of profile start --}}
    <div class="columns">
      {{-- profile section --}}
      <div class="column is-10">
        <div class="columns">
          {{-- show profile picture start --}}
          <div class="column">
            <profile-picture auth_name="{{auth()->user()->name}}" auth_photo_url="{{auth()->user()->photo_url}}" auth_id="{{auth()->user()->id}}"></profile-picture>
          </div>
          {{-- show profile picture end --}}
          <edit-profile-modal></edit-profile-modal>
        </div>
        {{-- second section with timeline,photo,friends start --}}
        <div class="column">
          <sub-navbar></sub-navbar>
        </div>
        {{-- second section with timeline,photo,friends end --}}
        {{-- this row is to show intro on the left and making post section on the right --}}
        <div class="columns">
          {{-- intro section --}}
          <div class="column is-6">
            <intro-section></intro-section>
          </div>
          {{-- making post, photo/video section  --}}
          <div class="column is-6">
            <post-section auth_photo_url="{{auth()->user()->photo_url}}"></post-section>
          </div>
        </div>
      </div>

      {{-- donners online --}}
      <div class="column">
        <donner-online auth_name="{{auth()->user()->name}}"></donner-online>
      </div>
      {{-- chat box start --}}

      <div class="container is-fullhd">
        <chat-box auth_id="{{auth()->id()}}" auth_name="{{auth()->user()->name}}"></chat-box>
      </div>
    </div>
    {{-- chat box end --}}
    <div class="container is-fullhd">
      <footer-section></footer-section>
    </div>
  </div>
  {{-- main content section of profile end --}}
  </section>
@endsection
