@extends('layouts.main')

@section('title', 'BeatyBigBan')

@section('content')
  @include('partials.header')
  <div class="favorites" id="appFavorites">
    <input type="hidden" id="user" value="@if(Session::has('user')) {{ Session::get('user')['id'] }} @endif">
    <div class="favorites__shop">
      <h4>MIS TIENDAS FAVORITAS</h4>
      <div class="favorites__search-container">
        <form action="" class="favorites__search">
          <input type="text" placeholder="Nombre de la Tienda">
          <button type="submit"><i class="fas fa-search"></i></button>
        </form>
      </div>

      <div class="favorites__stores">
        <div class="favorites__store" v-for="store in stores" :key="store.store.id">
          <div class="favorites__store-left">
          <h5>Tienda: @{{ store.store.name }}</h5>
            <p>Ropas</p>
            <a href="#" class="favorites__link-store">Ver Tienda</a>
            <a href="#" class="favorites__link-trash"><i class="fas fa-trash"></i></a>
          </div>
          <div class="favorites__store-right">
            <a :href="product.url" class="favorites__product" v-for="product in store.products" :key="product.id">
              <img width="142" height="142" :src="product.image" alt="Producto">
              <p>S/. @{{ product.price }} / <span>Precio</span></p>
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