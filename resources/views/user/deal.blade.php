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
      @for ($i = 0; $i < 8; $i++)
        <div class="deal__shop-col">
          <div class="deal__shop-item">
            ITEM
          </div>
        </div>
      @endfor
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
