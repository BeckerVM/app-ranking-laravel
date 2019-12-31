@extends('layouts.main')

@section('title', 'BeatyBigBan')

@section('content')
    @include('partials.header')
    <div class="profile" id="appProfile">
      <div class="profile__container">
        <div class="profile__left">
          <nav class="profile__nav">
            <h5>OPCIONES</h5>
            <div class="profile__menu">
              <a href="">Mis Tiendas Favoritas</a>
              <a href="">Mis Deseos</a>
            </div>
          </nav>
        </div>
        <div class="profile__right">
          <div class="profile__profile">
            <div class="profile__user">
              <img height="80" width="80" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQTMXrsFHeVVEaWkCc5Ex10ysdwqK3ukMUmG1MRaAOSuVUq-zC9&s" alt="Profile">
              <span>Becker Antonello Vega Maceda</span>
            </div>
            <div class="profile__options">
              <div class="profile__option">
                <span>09</span>
                <span>Comentarios</span>
              </div>
              <div class="profile__option">
                <span>09</span>
                <span>Lista de deseos</span>
              </div>
              <div class="profile__option">
                <span>09</span>
                <span>Tiendas Favoritas</span>
              </div>
            </div>
          </div>
          <div class="profile__stores">
            <div class="favorites">
                <h4>MIS TIENDAS FAVORITAS</h4>
                <div class="favorites__stores">
                  <div class="favorites__store" v-for="i in 3" :key="i">
                    <div class="favorites__store-left">
                      <h5>Tienda: Bing Bang</h5>
                      <p>Ropas</p>
                      <a href="#" class="favorites__link-store">Ver Tienda</a>
                    </div>
                    <div class="favorites__store-right">
                      <a href="#" class="favorites__product" v-for="i in 3" :key="i">
                        <img width="142" height="142" src="https://ae01.alicdn.com/kf/HTB1VQPqayDxK1RjSsphq6zHrpXaL/Original-New-Arrival-Adidas-CF-ALL-COURT-Men-s-Tennis-Shoes-Sneakers.jpg" alt="">
                        <p>S/. 99.99 / <span>Precio</span></p>
                      </a>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection

@section('scripts')
  <script src="/js/appProfile.js"></script>
@endsection