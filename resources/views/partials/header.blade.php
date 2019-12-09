<header class="header @if($toggle_class)b-transparent shandow-none h-90 @endif ">
  <div class="header__container-left">
    @if(!$toggle_class)
      <i class="fa fa-bars header__icon-bar"></i>
    @endif
    @if(!$auth)
      <h1 class="header__logo">M</h1>
    @endif
    <form action="" class="header__form">
      <button type="submit" class="header__form-btn"><i class="fa fa-search"></i></button>
      <input class="header__form-input" type="text" placeholder="Busca en M&M"/>
    </form>
  </div>
  <div className="header__container-right">
    @if(!$auth)
      @if($login)
        <a href="" class="header__btn-auth">Registrarse</a>
      @endif 
      @if(!$login)
        <a href="" class="header__btn-auth">Inciar sesión</a>
      @endif 
    @else
      <a href="" class="header__btn-auth">Registrarse</a>
      <a href="" class="header__btn-auth">Inciar sesión</a>
    @endif
  </div>
</header>