@extends('layouts.main')

@section('title', 'BeatyBigBan')

@section('content')
    @include('partials.header')
    <div class="profile" id="appProfile">
      <input type="hidden" id="user" value="@if(Session::has('user')) {{ Session::get('user')['id'] }} @endif">
      <div class="profile__container">
        <div class="profile__left">
          <nav class="profile__nav">
            <h5>OPCIONES</h5>
            <div class="profile__menu">
              <a href="#" @click.prevent="setOption('stores')">Mis Tiendas Favoritas</a>
              <a href="#" @click.prevent="setOption('wishes')">Mis Deseos</a>
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
                <span>@{{ wishes.length }}</span>
                <span>Lista de deseos</span>
              </div>
              <div class="profile__option">
                <span>@{{ stores.length }}</span>
                <span>Tiendas Favoritas</span>
              </div>
            </div>
          </div>
          <div class="loader2" v-if="loading">Loading...</div>
          <div class="profile__stores" v-if="option === 'stores'">
            <div class="favorites mt-0">
                <h4 class="pr-2">MIS TIENDAS FAVORITAS</h4>
                <div class="favorites__stores">
                  <div class="favorites__store b-black" v-for="store in stores" :key="store.store.id">
                    <div class="favorites__store-left">
                      <h5>Tienda: @{{ store.store.name }}</h5>
                      <p>Telefono: @{{ store.store.phone }}</p>
                      <a :href="'http://localhost:3000/tienda/' + store.store.id" class="favorites__link-store">Ver Tienda</a>
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
          <div class="profile__wishes" v-if="option === 'wishes'">
            <div class="favorites mt-0">
              <h4 class="pr-2">MIS DESEOS</h4>
              <div class="favorites__stores">
                <div class="favorites__store b-black" v-for="wish in wishes" :key="wish.id">
                  <div class="favorites__store-left pb-0">
                    <h5>@{{ wish.name }}</h5>
                    <img class="mb-1" width="142" height="142" :src="wish.image" alt="Product">
                    <a :href="wish.url" class="favorites__link-store">Ver Producto</a>
                  </div>
                  <div class="favorites__store-right pb-0">
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
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection

@section('scripts')
  <script src="/js/appProfile.js"></script>
@endsection