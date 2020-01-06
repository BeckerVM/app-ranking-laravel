<header id="appHeader" class="header @if($toggle_class)b-transparent shandow-none h-90 @endif ">
  <div class="header__container-left">
      <a href="{{ route('home') }}"  class="header__logo">M</a>
    <form action="" class="header__form">
      <button type="submit" class="header__form-btn"><i class="fa fa-search"></i></button>
      <input class="header__form-input" type="text" placeholder="Busca en M&M"/>
    </form>
  </div>
  <div class="header__container-right">
    @if(!$toggle_class && Session::has('user'))
      <i @click="openOrCloseModal" class="fa fa-bars header__icon-bar"></i>
    @endif
    @if(Session::has('user'))
      <img src="{{ Session::get('user')['profile'] }}" alt="Usuario" width="30" height="30">
      <a href="#" class="header__user">{{ Session::get('user')['username'] }}</a>
      <a href="{{ route('logout') }}" class="header__btn-auth">Cerrar sesion</a>
    @else
      <a v-if="url === urlLogin || url !== urlLogin && url !== urlRegister" href="{{ route('register') }}" class="header__btn-auth">Registrarse</a>
      <a v-if="url === urlRegister || url !== urlLogin && url !== urlRegister" href="{{ route('login') }}" class="header__btn-auth">Incia sesion</a>
    @endif
  </div>
  <aside class="header__aside" :class="{ 'active': openedModal }">
    <nav>
      <a href="{{ route('account') }}"><i class="fas fa-user-circle"></i> MI CUENTA</a>
      <a href="{{ route('favorites') }}"><i class="fas fa-store"></i> MIS TIENDAS FAVORITAS</a>
      <a href="{{ route('wishes') }}"><i class="fas fa-gift"></i> MIS DESEOS</a>
    </nav>
  </aside>
</header>