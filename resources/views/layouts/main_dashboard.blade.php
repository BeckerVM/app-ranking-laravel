<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>M&M - @yield('title')</title>
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" integrity="sha256-+N4/V/SbAFiW1MPBCXnfnP9QSN3+Keu+NlB+0ev/YKQ=" crossorigin="anonymous" />
  <link href="/css/app.css" rel="stylesheet">
</head>
<body>
    <div class="dashboard">
      <div class="dashboard__container">
        <header class="dashboard__header">
          <h1 class="dashboard__title">MyM - <span>Dashboard</span></h1>
          <div class="dashboard__user">
            @if(Session::has('user'))
              <img src="{{ Session::get('user')['profile'] }}" alt="Usuario" width="40" height="40">
              <span href="#" class="header__user">{{ Session::get('user')['username'] }}</span>
              <a href="{{ route('logout') }}"><i class="fas fa-power-off"></i></a>
            @endif
          </div>
        </header>
        <div class="dashboard__content">
          <aside class="dashboard__aside">
            <h4>PANEL ADMINSTRATIVO</h4>
            <div class="dashboard__menu">
              <a href="{{ route('dashboard') }}" class="dashboard__menu-link"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
              <a href="{{ route('users') }}" class="dashboard__menu-link"><i class="fas fa-users"></i> Usuarios</a>
            </div>
          </aside>
          <main class="dashboard__main">
            @yield('content')
          </main>
        </div>
      </div>
    </div>
    <script src="/js/app.js"></script>
    @yield('scripts')
  
</body>
</html>