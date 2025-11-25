<nav id="navmenu" class="navmenu">
  <ul>
    <li><a href="{{ route('home') }}" class="active">Home</a></li>
    <li><a href="/about">About</a></li>
    <li><a href="{{ route('blogs.index') }}">Blogs</a></li>

    @auth
      <li><a href="/add-blog">Add Blog</a></li>
      <li class="text-white px-2"><strong>{{ Auth::user()->name }}</strong></li>
      <li>
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" style="background:none;border:none;color:white;cursor:pointer;">Logout</button>
        </form>
      </li>
    @endauth

    @guest
      <li><a href="{{ route('login') }}">Login</a></li>
      <li><a href="{{ route('register') }}">Register</a></li>
    @endguest
  </ul>
  <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
</nav>
