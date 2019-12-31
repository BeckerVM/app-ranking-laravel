@extends('layouts.main')

@section('title', 'BeatyBigBan')

@section('content')
  @include('partials.header')
  <div class="favorites" id="appFavorites">
    <div class="favorites__shop">
      <h4>MIS TIENDAS FAVORITAS</h4>

      <div class="favorites__search-container">
        <form action="" class="favorites__search">
          <input type="text" placeholder="Nombre de la Tienda">
          <button type="submit"><i class="fas fa-search"></i></button>
        </form>
      </div>

      <div class="favorites__stores">
        <div class="favorites__store" v-for="i in 5" :key="i">
          <div class="favorites__store-left">
            <h5>Tienda: Bing Bang</h5>
            <p>Ropas</p>
            <a href="#" class="favorites__link-store">Ver Tienda</a>
            <a href="#" class="favorites__link-trash"><i class="fas fa-trash"></i></a>
          </div>
          <div class="favorites__store-right">
            <a href="#" class="favorites__product" v-for="i in 5" :key="i">
              <img width="142" height="142" src="https://ae01.alicdn.com/kf/HTB1VQPqayDxK1RjSsphq6zHrpXaL/Original-New-Arrival-Adidas-CF-ALL-COURT-Men-s-Tennis-Shoes-Sneakers.jpg" alt="">
              <p>S/. 99.99 / <span>Precio</span></p>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
  <script src="/js/appFavorites.js"></script>
@endsection