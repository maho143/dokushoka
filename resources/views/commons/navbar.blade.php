<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand h1" href="/">DOKUSHOKA</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav ml-auto h5">
      @if (Auth::check())
      <li class="nav-item">
        <a class="nav-link" href="{{ route('books.create') }}"><i class="fas fa-book-open"></i>   add</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fas fa-chart-line"></i>    Ranking</a>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="gravatar">
                <img src="{{ Gravatar::src(Auth::user()->email, 20) . '&d=mm' }}" alt="" class="img-circle">
          </span>
          {{ Auth::user()->name }}
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="{{ route('users.show', Auth::user()->id) }}">My Page</a>
          <a class="dropdown-item" href="{{ route('logout.get') }}">ログアウト</a>
        </div>
      </li>
      @else
      <a class="nav-link" href="{{ route('login') }}">Login</a>
      <a class="nav-link" href="{{ route('signup.get') }}">Signup</a>
      @endif
    </ul>
  </div>
</nav>