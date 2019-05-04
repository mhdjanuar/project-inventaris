<nav class="navbar navbar-expand-lg navbar-light bg-primary">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Master Data
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          @if(auth()->user()->id_level == 1)
          <a class="dropdown-item" href="{{ route('inventaris.index') }}">Inventaris</a>
          <!-- <a class="dropdown-item" href="{{ route('laporan.index') }}">Laporan</a> -->
          @endif

          <a class="dropdown-item" href="{{ route('peminjaman.create') }}">Peminjaman</a>

          @if(auth()->user()->id_level == 1 || auth()->user()->id_level == 2)
          <a class="dropdown-item" href="{{ route('peminjaman.index') }}">Pengembalian</a>
          @endif
        </div>
      </li>
    </ul>
    <span class="navbar-text">
      <a href="{{ route('logout') }}">Logout</a>
    </span>
  </div>
</nav>
