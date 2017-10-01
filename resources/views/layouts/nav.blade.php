<nav>
  <div class="nav-wrapper">
    <a href="#" class="brand-logo">Logo</a>
    <ul id="nav-mobile" class="right hide-on-med-and-down">
      <li><a href="{{ url('/admin') }}">Home</a></li>
      <li><a href="{{ url('/admin/studios') }}">Studios</a></li>
      <li><a href="{{ url('/admin/equipment') }}">Equipment</a></li>
      <li><a href="">Bookings</a></li>
      <li><a href="{{ url('/admin/users') }}">Users</a></li>
      <li>
      {{--  Check if user is logged in or not --}}
        @if (Auth::check())
        <a href="{{ url('admin/logout') }}">
            {{ Auth::user()->name }}
          </a> @else
        <a href="{{ url('admin/login') }}">
            Login
          </a> @endif
      </li>
    </ul>
  </div>
</nav>