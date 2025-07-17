<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/provinsi">Provinsi</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->is('kabupaten*') ? 'active' : '' }}" href="/kabupaten">Kabupaten</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->is('penduduk*') ? 'active' : '' }}" href="/penduduk">Penduduk</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->is('laporan') ? 'active' : '' }}" href="/laporan">Laporan Provinsi</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->is('laporan/kabupaten') ? 'active' : '' }}" href="/laporan/kabupaten">Laporan Kabupaten</a>
    </li>
</ul>

    </div>
  </div>
</nav>
@yield('content')

@yield('scripts')
</body>
</html>