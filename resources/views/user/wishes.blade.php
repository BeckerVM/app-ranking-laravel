@extends('layouts.main')

@section('title', 'BeatyBigBan')

@section('content')
  @include('partials.header')
  <div class="favorites" id="appWishes">
    <input type="hidden" id="user" value="@if(Session::has('user')) {{ Session::get('user')['id'] }} @endif">
    <div class="favorites__shop">
      <h4>MI LISTA DE DESEOS</h4>
      <div class="favorites__search-container">
        <form action="" class="favorites__search">
          <input type="text" placeholder="Nombre del Producto">
          <button type="submit"><i class="fas fa-search"></i></button>
        </form>
      </div>

      <div class="favorites__stores">
        <div class="favorites__store b-black" v-for="wish in wishes" :key="wish.id">
          <div class="favorites__store-left pb-0">
            <h5>@{{ wish.name }}</h5>
            <img class="mb-1" width="142" height="142" :src="wish.image" alt="Producto">
            <a :href="wish.url" class="favorites__link-store">Ver Producto</a>
          </div>
          <div class="favorites__store-right pb-0 flex-start">
            <div class="favorites__container-wishe-text">
              <p>@{{ wish.description2 }}</p>
              <p><strong>Precio:</strong> S/. @{{ wish.price }} </p>
              <div class="product__stars">
                <span class="mr-1">4.8 / 5.0</span>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <span class="ml-1">Vendidos (@{{ wish.sold }})</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="loader2" v-if="loading">Loading...</div>
    </div>
  </div>
  </div>
@endsection

@section('scripts')
  <script src="/js/appWishes.js"></script>
@endsection