@extends('layouts.main')

@section('title', 'BeatyBigBan')

@section('content')
  @include('partials.header')
  @include('partials.subheader')
  <div class="deal__container">
    <div class="deal__container-pub">
      <div class="deal__pub">
      </div>
      <div class="deal__pub">
      </div>
    </div> 
    <div class="deal__shop">
      @foreach ($products as $product)
        <div class="deal__shop-col">
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
    <div class="deal__container-pub">
      <div class="deal__pub">
      </div>
    </div>
    <div class="deal__shop">
      @for ($i = 0; $i < 8; $i++)
        <div class="deal__shop-col">
          <div class="deal__shop-item">
            ITEM
          </div>
        </div>
      @endfor
    </div> 
  </div>
@endsection
