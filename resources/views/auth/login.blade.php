@extends('front_end.layouts.master')
@section('title')
  Health Service | Login
@endsection

@section('main_content')
  {{-- navbar column section --}}
  @include('front_end/layouts/partials/Navbar')

  {{-- login form section start --}}
  <section class="columns is-mobile is-centered">
    <div class="column is-half">
      <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
        <legend class="title">{{ __('Login Form') }}</legend>
        @csrf
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
          <label class="label">{{ __('Password') }}</label>
          <div class="control has-icons-left has-icons-right">
            <input class="input {{ $errors->has('password') ? ' is-danger' : '' }}" type="password" name="password" placeholder="{{ __('Password') }}" value="" required>
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
          <div class="control">
            <label class="checkbox">
              <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
              {{ __('Remember Me') }}
            </label>
          </div>
        </div>

        <div class="field">
          <div class="control">
            <button type="submit" class="button is-link">{{ __('Login') }}</button>
          </div>
        </div>
        <div class="control">
          <a class="button is-link" href="{{ route('password.request') }}">
            {{ __('Forgot Your Password?') }}
          </a>
        </div>
      </form>
    </div>
  </section>
  {{-- login form section end --}}
@endsection
