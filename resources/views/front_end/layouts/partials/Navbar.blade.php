<div class="container is-fullhd ">
  <vue-navbar>
    {{-- if user is guest then show the guest section and if registered then show the profile section --}}
    @guest
      <template slot="guest_name">
        <div class="level-item has-text-centered">
          <a class="navbar-link" href="/documentation/overview/start/">
            <div>
              <p class="heading"><i class="fas fa-user" aria-hidden="true"></i></p>
              <p class="title">Guest</p>
            </div>
          </a>
        </div>
      </template>
      <template slot="guest_section">
        <a class="navbar-item " href="{{route('login')}}">
          <div class="level-item has-text-centered">
            <div>
              <p class="heading"><i class="fas fa-male" aria-hidden="true"></i></p>
              <p class="title">Login</p>
            </div>
          </div>
        </a>
        <a class="navbar-item " href="{{route('register')}}">
          <div class="level-item has-text-centered">
            <div>
              <p class="heading"><i class="fas fa-sign-out-alt" aria-hidden="true"></i></p>
              <p class="title">Register</p>
            </div>
          </div>
        </a>
      </template>
    @else
      <template slot="user_name">
        <a class="navbar-link" href="/documentation/overview/start/">
          <div class="level-item has-text-centered">
            <div>
              <p class="heading">
                <img src="{{asset('public'.Storage::url(auth()->user()->photo_url))}}" alt="Bulma: a modern CSS framework based on Flexbox">
              </p>
              <p class="title">{{ Auth::user()->name }}</p>
            </div>
          </div>
        </a>
      </template>
      <template slot="user_section">
        <a class="navbar-item " href="">
          <div class="level-item has-text-centered">
            <div>
              <p class="heading"><i class="fas fa-male" aria-hidden="true"></i></p>
              <p class="title">Profile</p>
            </div>
          </div>
        </a>
        <a class="navbar-item " href="{{'logout'}}" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
        <div class="level-item has-text-centered">
          <div>
            <p class="heading"><i class="fas fa-sign-out-alt" aria-hidden="true"></i></p>
            <p class="title">Log Out</p>
          </div>
        </div>
      </a>
    </template>
    @endguest

</vue-navbar>
</div>
