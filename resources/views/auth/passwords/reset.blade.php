@extends('front_end.layouts.master')
@section('title')
  Health Service | Reset Password
@endsection
@section('main_content')
  {{-- navbar column section --}}
  @include('front_end/layouts/partials/Navbar')

  {{-- Reset Password form section start --}}
  <section class="columns is-mobile is-centered">
    <div class="column is-half">
      @if (session('status'))
        <div class="notification is-primary">
          <button class="delete"></button>
          {{ session('status') }}
        </div>
      @endif
      <form method="POST" action="{{ route('password.request') }}" aria-label="{{ __('Reset Password') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <div class="field">
          <label class="label">{{ __('Reset Password') }}</label>
          <div class="control has-icons-left has-icons-right">
            <input class="input {{ $errors->has('email') ? ' is-danger' : '' }}" name="email" type="email" placeholder="{{ __('E-Mail Address') }} " value="{{ $email ?? old('email') }}" required>
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
          <label class="label">{{ __('Confirm Password') }}</label>
          <div class="control has-icons-left has-icons-right">
            <input id="password-confirm" type="password" class="input" name="password_confirmation" required>
            <span class="icon is-small is-left">
              <i class="fas fa-key"></i>
            </span>
          </div>
        </div>
        <div class="field">
          <div class="control">
            <button type="submit" class="button is-link">{{ __('Reset Password') }}</button>
          </div>
        </div>
      </form>
    </div>
  </section>
  {{-- Reset Password form section end --}}

@endsection
