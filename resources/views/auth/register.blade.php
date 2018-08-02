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
      <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" aria-label="{{ __('Register') }}">
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
          <label class="label">Date Of Birth</label>
          <div class="control has-icons-left has-icons-right">
            <input class="input {{ $errors->has('date_of_birth') ? ' is-danger' : '' }}" name="date_of_birth" type="date" placeholder="Date Of Birth " value="{{ old('date_of_birth') }}" required>
            <span class="icon is-small is-left">
              <i class="fas fa-user"></i>
            </span>
            @if ($errors->has('date_of_birth'))
              <span class="icon is-small is-right">
                <i class="fas fa-exclamation-triangle"></i>
              </span>
            @endif
          </div>
          @if ($errors->has('date_of_birth'))
            <p class="help is-danger">{{ $errors->first('date_of_birth') }}</p>
          @endif
        </div>
        <div class="field">
          <label class="label">Gender</label>
          <div class="select {{ $errors->has('gender') ? ' is-danger' : '' }}">
            <select name="gender">
              <option value="male">Male</option>
              <option value="female">Female</option>
            </select>
            @if ($errors->has('gender'))
              <span class="icon is-small is-right">
                <i class="fas fa-exclamation-triangle"></i>
              </span>
            @endif
          </div>
          @if ($errors->has('gender'))
            <p class="help is-danger">{{ $errors->first('gender') }}</p>
          @endif
        </div>
        <div class="field">
          <label class="label">Mobile Number</label>
          <div class="control has-icons-left has-icons-right">
            <input class="input {{ $errors->has('mobile_number') ? ' is-danger' : '' }}" name="mobile_number" type="number" placeholder="Mobile Number " value="{{ old('mobile_number') }}" required>
            <span class="icon is-small is-left">
              <i class="fas fa-user"></i>
            </span>
            @if ($errors->has('mobile_number'))
              <span class="icon is-small is-right">
                <i class="fas fa-exclamation-triangle"></i>
              </span>
            @endif
          </div>
          @if ($errors->has('mobile_number'))
            <p class="help is-danger">{{ $errors->first('mobile_number') }}</p>
          @endif
        </div>
        <div class="field">
          <label class="label">Weight</label>
          <div class="control has-icons-left has-icons-right">
            <input class="input {{ $errors->has('weight') ? ' is-danger' : '' }}" name="weight" type="number" step="any" placeholder="Weight " value="{{ old('weight') }}" required>
            <span class="icon is-small is-left">
              <i class="fas fa-user"></i>
            </span>
            @if ($errors->has('weight'))
              <span class="icon is-small is-right">
                <i class="fas fa-exclamation-triangle"></i>
              </span>
            @endif
          </div>
          @if ($errors->has('weight'))
            <p class="help is-danger">{{ $errors->first('weight') }}</p>
          @endif
        </div>
        <div class="field">
          <label class="label">Height</label>
          <div class="control has-icons-left has-icons-right">
            <input class="input {{ $errors->has('height') ? ' is-danger' : '' }}" name="height" type="number" step="any" placeholder="Height " value="{{ old('height') }}" required>
            <span class="icon is-small is-left">
              <i class="fas fa-user"></i>
            </span>
            @if ($errors->has('height'))
              <span class="icon is-small is-right">
                <i class="fas fa-exclamation-triangle"></i>
              </span>
            @endif
          </div>
          @if ($errors->has('height'))
            <p class="help is-danger">{{ $errors->first('height') }}</p>
          @endif
        </div>
        <div class="field">
          <label class="label">Blood Group</label>
          <div class="select {{ $errors->has('blood_group') ? ' is-danger' : '' }}">
            <select name="blood_group">
              <option value="a+">A+</option>
              <option value="b+">B+</option>
              <option value="o+">O+</option>
              <option value="o-">O-</option>
              <option value="ab+">AB+</option>
            </select>
            @if ($errors->has('blood_group'))
              <span class="icon is-small is-right">
                <i class="fas fa-exclamation-triangle"></i>
              </span>
            @endif
            @if ($errors->has('blood_group'))
              <p class="help is-danger">{{ $errors->first('blood_group') }}</p>
            @endif
          </div>
        </div>
        <div class="field">
          <label class="label">Address</label>
          <div class="control">
            <textarea class="textarea" name="address" placeholder="Address"></textarea>
            @if ($errors->has('address'))
              <span class="icon is-small is-right">
                <i class="fas fa-exclamation-triangle"></i>
              </span>
            @endif
            @if ($errors->has('address'))
              <p class="help is-danger">{{ $errors->first('address') }}</p>
            @endif
          </div>
        </div>
        <div class="field">
          <label class="label">Occupation</label>
          <div class="select {{ $errors->has('occupation') ? ' is-danger' : '' }}">
            <select name="occupation">
              <option value="Student">Student</option>
              <option value="Employee">Employee</option>
              <option value="HouseWife">HouseWife</option>
              <option value="Others">Others</option>
            </select>
            @if ($errors->has('occupation'))
              <span class="icon is-small is-right">
                <i class="fas fa-exclamation-triangle"></i>
              </span>
            @endif
          </div>
          @if ($errors->has('occupation'))
            <p class="help is-danger">{{ $errors->first('occupation') }}</p>
          @endif
        </div>
        <div class="field">
          <div class="file has-name is-primary">
            <label class="file-label">
              <input class="file-input"id="file" type="file" name="photo_url">
              <span class="file-cta">
                <span class="file-icon">
                  <i class="fas fa-upload"></i>
                </span>
                <span class="file-label">
                  Choose a file…
                </span>
              </span>
              <span class="file-name" id="file_name">
                {{-- file name will be here --}}
              </span>
              @if ($errors->has('photo_url'))
                <span class="icon is-small is-right">
                  <i class="fas fa-exclamation-triangle"></i>
                </span>
              @endif
            </label>
            @if ($errors->has('photo_url'))
              <p class="help is-danger">{{ $errors->first('photo_url') }}</p>
            @endif
          </div>
        </div>
        <div class="field">
          <label class="label">Want to donate blood</label>
          <div class="select {{ $errors->has('blood_donate_status') ? ' is-danger' : '' }}">
            <select name="blood_donate_status">
              <option value="1">Yes</option>
              <option value="0">No</option>
            </select>
            @if ($errors->has('blood_donate_status'))
              <span class="icon is-small is-right">
                <i class="fas fa-exclamation-triangle"></i>
              </span>
            @endif
          </div>
          @if ($errors->has('blood_donate_status'))
            <p class="help is-danger">{{ $errors->first('blood_donate_status') }}</p>
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
