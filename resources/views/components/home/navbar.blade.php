<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">
      <a href="/" class="logo d-flex align-items-center me-auto me-lg-0">
        <h1>Auction<span>.</span></h1>
      </a>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="#lists">Lelang</a></li>
          <li><a href="#history">History</a></li>
        </ul>
      </nav>
      <div class="auth">
        <div class="dropdown">
          @if (Auth::guard('petugas')->check() || Auth::guard('masyarakat')->check())
          <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Halo, {{ Auth::guard('petugas')->check() ? Auth::guard('petugas')->user()->nama_petugas : (Auth::guard('masyarakat')->check() ? Auth::guard('masyarakat')->user()->nama_lengkap : '') }}
          </button>
          <ul class="dropdown-menu">
            @if (Auth::guard('petugas')->check())
              <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-sidebar-reverse"></i> Dashboard</a></li>
            @else 
              <li><a class="dropdown-item" href="/histories/won"><i class="bi bi-trophy"></i> History menang</a></li>
            @endif
            <li>
              <form action="/logout" method="post">
                @csrf
                <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Logout</button>
              </form>
            </li>
          </ul>
          @else
              <a class="bg-primary text-white p-3 badge" href="/auth/login">Login</a>
          @endif
        </div>
      </div>
      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
    </div>
</header>