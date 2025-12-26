<!doctype html>
<html lang="id">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin') - GoTour</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}"> <!-- reuse styles where helpful -->
    @stack('styles')
  </head>

  <body>
    <div class="admin-shell">
      <aside class="admin-sidebar">
        <h2>GOTOUR</h2>
        <nav class="admin-nav">
          <a href="{{ route('admin.dashboard') }}">Dashboard</a>
          <a href="{{ route('admin.packages.index') }}">Wisata</a>
          <a href="{{ route('admin.users.index') }}">Users</a>
          <a href="{{ route('admin.packages.index') }}#reviews">Review</a>
          <a href="{{ route('admin.services.index') }}">Layanan_admin</a>
          <a href="#">Rekomendasi Foto</a>
        </nav>
      </aside>

      <main class="admin-main">
        <div class="admin-header">
          <div class="admin-search">
            <form method="GET">
              <input type="search" placeholder="Cari" name="q" value="{{ request('q') ?? '' }}" class="form-input" />
            </form>
          </div>

          <div class="admin-actions">
            <div class="text-sm text-gray-700">Halo, {{ auth()->user()?->name ?? 'Tamu' }}</div>
            @if(auth()->check())
                <a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="btn btn-ghost">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none">@csrf</form>
            @else
                <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
            @endif
          </div>
        </div>

        <div class="content">
          @if(session('success'))
            <div class="card" style="margin-bottom:1rem; border-left:4px solid #0ea5a2">{{ session('success') }}</div>
          @endif

          @yield('content')
        </div>
      </main>
    </div>

    @stack('scripts')
  </body>
</html>
