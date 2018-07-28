@extends('front_end.layouts.master')
@section('title')
  Health Service | Home
@endsection
@section('main_content')
  {{-- navbar column section --}}
  @include('front_end/layouts/partials/Navbar')

  {{-- second column group --}}
  <section class="section">
    <div class="columns">
      {{-- user articles section --}}
      <div class="column is-6">
        <vue-user-article></vue-user-article>
      </div>
      <div class="column">
        {{-- related sponser advertisement --}}
        <section class="section">
          <vue-advertisement></vue-advertisement>
        </section>
        {{-- donner story book section --}}
        <section class="container is-fullhd">
          <donner-story></donner-story>
        </section>
      </div>
      {{-- donners online --}}
      <div class="column">
        <donner-online></donner-online>
      </div>
      {{-- chat box start --}}

      <div class="container is-fullhd">
        <chat-box></chat-box>
      </div>
    </div>
    {{-- chat box end --}}
    <div class="container is-fullhd">
      <footer-section></footer-section>
    </div>

  </section>

@endsection
