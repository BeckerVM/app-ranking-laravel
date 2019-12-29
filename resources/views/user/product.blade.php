@extends('layouts.main')

@section('title', 'BeatyBigBan')

@section('content')
    @include('partials.header')
    @include('partials.subheader')
    <div class="product" id="appProduct">
        <div class="product__container">
            <div class="product__left">
                <div class="product__img-container">
                    <img v-if="productImages.length > 0" :src="productImages[0].img_url" alt="Producto">
                </div>
                <div class="product__others">
                    <div v-for="product in productImages" :key="product.id" class="product__other">
                        <img :src="product.img_url" alt="Producto">
                    </div>
                </div>
            </div>
            <div class="product__right" v-if="product !== null">
                <div class="product__description">
                    <strong>@{{ product.name }}</strong>
                    <p>@{{ product.description }}</p>
                    <div class="product__evaluation">
                        <div class="product__stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <span>5.00</span>
                        </div>
                        <span>@{{ product.sold }} vendidos</span>
                    </div>
                    <p class="product__price">Precio: <span>S/. @{{ product.price }}</span></p>
                    <p class="product__price">Otros:</p>
                    <div class="product__oplus">
                        <div class="product__plus" v-for="product in productImages" :key="product.id">
                            <img :src="product.img_url">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product__container-description" v-if="product !== null">
            <div class="product__options">
                <a href="#">Descripcion</a>
                <a href="#">Valoraciones</a>
                <a href="#">Detalles</a>
            </div>
            <div class="product__option-content">
                <p>@{{ product.description2 }}</p>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
  <script src="/js/appProduct.js"></script>
@endsection