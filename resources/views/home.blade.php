@extends('layouts.main')

@section('title', 'Bienvenido a M&M')

@section('content')
  @include('partials.header')
  <div class="banner">
  </div>
  <div class="home__container">
    <nav class="home__menu">
      <a href="#">Tiendas</a>
      <a href="#">Descuentos</a>
      <a href="#">Super Ventas</a>
      <a href="#">Novedades</a>
    </nav>
    <h3 class="text-title">Tiendas</h3>
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
    <h3 class="text-title mt-30">Novedades</h3>
    <div class="home__shop">
      @foreach ($new_products as $product)
        <div class="home__shop-col">
          <a href="{{ route('product', ['id' => $product->id]) }}" class="home__shop-item">
            <img src="{{ $product->images[0]->img_url }}" alt="">
            <div class="d-flex j-c-between">
              <p>{{ $product->name }}</p>
              <p class="price"><strong>S/. {{ $product->price }}</strong></p>
            </div>
          </a>
        </div>
      @endforeach
    </div>
  </div>
@endsection
