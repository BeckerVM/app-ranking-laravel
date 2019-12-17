<header id="appHeader" class="header @if($toggle_class)b-transparent shandow-none h-90 @endif ">
  <div class="header__container-left">
    @if(!$toggle_class)
      <i class="fa fa-bars header__icon-bar"></i>
    @endif
      <a href="{{ route('home') }}"  class="header__logo">M</a>
    <form action="" class="header__form">
      <button type="submit" class="header__form-btn"><i class="fa fa-search"></i></button>
      <input class="header__form-input" type="text" placeholder="Busca en M&M"/>
    </form>
  </div>
  <div className="header__container-right">
    @if(Session::has('user'))
      <a href="#" class="header__user">{{ Session::get('user')['email'] }}</a>
      <a href="{{ route('logout') }}" class="header__btn-auth">Cerrar sesion</a>
    @else
      <a v-if="url === urlLogin || url !== urlLogin && url !== urlRegister" href="{{ route('register') }}" class="header__btn-auth">Registrarse</a>
      <a v-if="url === urlRegister || url !== urlLogin && url !== urlRegister" href="{{ route('login') }}" class="header__btn-auth">Inciar sesión</a>
    @endif
  </div>
</header>