@extends('layouts.main')

@section('title', 'Bienvenido a M&M')

@section('content')
  @include('partials.header')
  <div class="banner">
  </div>
  <div class="home__container">
    <nav class="home__menu">
      <a href="#">Tiendas destacadas</a>
      <a href="#">Descuentos</a>
      <a href="#">Super Ventas</a>
      <a href="#">Novedades</a>
    </nav>
    <h3 class="text-title">Tiendas destacadas</h3>
    <div class="home__shop">
      @for ($i = 0; $i < 8; $i++)
        <div class="home__shop-col">
          <div class="home__shop-item">
            ITEM
          </div>
        </div>
      @endfor
    </div>
    <h3 class="text-title mt-30">Descuentos</h3>
    <div class="home__shop">
      @for ($i = 0; $i < 8; $i++)
        <div class="home__shop-col">
          <div class="home__shop-item">
            ITEM
          </div>
        </div>
      @endfor
    </div>
    <h3 class="text-title mt-30">Super Ventas</h3>
    <div class="home__shop">
      @for ($i = 0; $i < 8; $i++)
        <div class="home__shop-col">
          <div class="home__shop-item">
            ITEM
          </div>
        </div>
      @endfor
    </div>
  </div>
@endsection
