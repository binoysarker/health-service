@extends('front_end.layouts.master')
@section('title')
  Health Service | Register
@endsection

@section('main_content')
  {{-- navbar column section --}}
  @include('front_end/layouts/partials/Navbar')

  {{-- Register form section start --}}
  <section class="columns is-mobile is-centered">
    <div class="column is-half">
      <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
        <legend class="title">{{ __('Register Form') }}</legend>
        @csrf
        <div class="field">
          <label class="label">Name</label>
          <div class="control has-icons-left has-icons-right">
            <input class="input {{ $errors->has('name') ? ' is-danger' : '' }}" name="name" type="text" placeholder="Name " value="{{ old('name') }}" required>
            <span class="icon is-small is-left">
              <i class="fas fa-user"></i>
            </span>
            @if ($errors->has('name'))
              <span class="icon is-small is-right">
                <i class="fas fa-exclamation-triangle"></i>
              </span>
            @endif
          </div>
          @if ($errors->has('name'))
            <p class="help is-danger">{{ $errors->first('name') }}</p>
          @endif
        </div>
        <div class="field">
          <label class="label">Email</label>
          <div class="control has-icons-left has-icons-right">
            <input class="input {{ $errors->has('email') ? ' is-danger' : '' }}" name="email" type="email" placeholder="Email " value="{{ old('email') }}" required>
            <span class="icon is-small is-left">
              <i class="fas fa-envelope"></i>
            </span>
            @if ($errors->has('email'))
              <span class="icon is-small is-right">
                <i class="fas fa-exclamation-triangle"></i>
              </span>
            @endif
          </div>
          @if ($errors->has('email'))
            <p class="help is-danger">{{ $errors->first('email') }}</p>
          @endif
        </div>
        <div class="field">
          <label class="label">Password</label>
          <div class="control has-icons-left has-icons-right">
            <input class="input {{ $errors->has('password') ? ' is-danger' : '' }}" type="password" name="password" placeholder="Password" value="" required>
            <span class="icon is-small is-left">
              <i class="fas fa-key"></i>
            </span>
            @if ($errors->has('password'))
              <span class="icon is-small is-right">
                <i class="fas fa-exclamation-triangle"></i>
              </span>
            @endif
          </div>
          @if ($errors->has('password'))
            <p class="help is-danger">{{ $errors->first('password') }}</p>
          @endif
        </div>
        <div class="field">
          <label class="label">{{ __('Confirm Password') }}</label>
          <div class="control has-icons-left has-icons-right">
            <input class="input {{ $errors->has('password') ? ' is-danger' : '' }}" type="password" name="password_confirmation" placeholder="{{ __('Confirm Password') }}" value="" required>
            <span class="icon is-small is-left">
              <i class="fas fa-key"></i>
            </span>
          </div>
        </div>
        <div class="field">
          <div class="control">
            <button type="submit" class="button is-link">{{ __('Register') }}</button>
          </div>
        </div>
      </form>
    </div>
  </section>
  {{-- Register form section end --}}

@endsection
