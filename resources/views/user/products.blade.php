@extends('layouts.main')

@section('title', 'BeatyBigBan')

@section('content')
  @include('partials.header')
  @include('partials.subheader')
  <div class="deal__container">
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
  </div>
@endsection