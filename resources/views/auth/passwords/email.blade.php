@extends('front_end.layouts.master')
@section('title')
  Health Service | Email
@endsection
@section('main_content')
  {{-- navbar column section --}}
  @include('front_end/layouts/partials/Navbar')

  {{-- Email form section start --}}
  <section class="columns is-mobile is-centered">
    <div class="column is-half">
      @if (session('status'))
        <div class="notification is-primary">
          <button class="delete"></button>
          {{ session('status') }}
        </div>
      @endif
      <form method="POST" action="{{ route('password.email') }}" aria-label="{{ __('Reset Password') }}">
        @csrf
        <div class="field">
          <label class="label">{{ __('E-Mail Address') }}</label>
          <div class="control has-icons-left has-icons-right">
            <input class="input {{ $errors->has('email') ? ' is-danger' : '' }}" name="email" type="email" placeholder="{{ __('E-Mail Address') }} " value="{{ old('email') }}" required>
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
          <div class="control">
            <button type="submit" class="button is-link">{{ __('Send Password Reset Link') }}</button>
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
  {{-- Email form section end --}}

@endsection
