<nav>
    <div class="nav-wrapper">
      <a href="#" class="brand-logo">Logo</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="/admin">Home</a></li>
        <li><a href="/admin/studios">Studios</a></li>
        <li><a href="">Bookings</a></li>
        <li><a href="/admin/users">Users</a></li>
        @if (Auth::check())
        <li>
          <a href="">
            {{ Auth::user()->name }}
          </a>
        </li>
        @endif
      </ul>
    </div>
</nav>