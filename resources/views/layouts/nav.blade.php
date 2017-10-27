<nav>
  <div class="nav-wrapper">
    <a href="#" class="brand-logo">Logo</a>
    <ul id="nav-mobile" class="right hide-on-med-and-down">
    @Auth
      @if(Auth::user()->role == 3)
      <li><a href="{{ url('/client') }}">Dashboard</a></li>
      <li><a href="">Settings</a></li>
      <li><a href="{{ url('/client/logout') }}">Logout</a></li>
      @else
      <li><a href="{{ url('/admin') }}">Home</a></li>
      <li><a href="{{ url('/admin/studios') }}">Studios</a></li>
      <li><a href="{{ url('/admin/equipment') }}">Equipment</a></li>
      {{--  <li><a href="">Bookings</a></li>  --}}
      <li><a href="{{ url('/admin/users') }}">Users</a></li>
      <li>
        @auth
        <a href="{{ url('admin/logout') }}">{{ Auth::user()->name }}</a> 
        @else
        <a href="{{ url('admin/login') }}">Login</a> 
        @endauth
      </li>
      @endif
      @else
      <li><a href="{{ url('/client/login') }}">Login</a></li>
    @endauth
    </ul>
  </div>
</nav>