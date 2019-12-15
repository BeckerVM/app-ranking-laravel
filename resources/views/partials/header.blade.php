<header id="appHeader" class="header @if($toggle_class)b-transparent shandow-none h-90 @endif ">
  <div class="header__container-left">
    @if(!$toggle_class)
      <i class="fa fa-bars header__icon-bar"></i>
    @endif
      <h1 class="header__logo">M</h1>
    <form action="" class="header__form">
      <button type="submit" class="header__form-btn"><i class="fa fa-search"></i></button>
      <input class="header__form-input" type="text" placeholder="Busca en M&M"/>
    </form>
  </div>
  <div className="header__container-right">
    @if(Session::has('user'))
      <span>{{ Session::get('user')['email'] }}</span>
    @else
      <a v-if="url === urlLogin || url !== urlLogin && url !== urlRegister" href="{{ route('register') }}" class="header__btn-auth">Registrarse</a>
      <a v-if="url === urlRegister || url !== urlLogin && url !== urlRegister" href="{{ route('login') }}" class="header__btn-auth">Inciar sesión</a>
    @endif
  </div>
</header>