@extends('layouts.main')

@section('title', 'BeatyBigBan')

@section('content')
    @include('partials.header')
    @include('partials.subheader')
    <div class="product" id="appProduct">
        <input type="hidden" id="user" value="@if(Session::has('user')) {{ Session::get('user')['id'] }} @endif">
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
                    <div class="product__wishe" v-if="userId">
                        <a v-if="!wish" @click.prevent="saveWish" href="#">Añadir a mis deseos <i class="fas fa-gift"></i></a>
                        <a v-if="wish" href="#">Eliminar de mis deseos <i class="fas fa-gift"></i></a>
                    </div>
                </div>
            </div>
            <div class="product__center">
                <span>Recomendado para ti</span>
                <div class="product__product" v-for="i in 3" :key="i">
                    <img width="133" height="133" src="https://ae01.alicdn.com/kf/H87a5b2e7430a484bad2f754a852b0148X.jpg_220x220q90.jpg_.webp" alt="Product">
                </div>
            </div>
        </div>
        <div class="product__container-description" v-if="product !== null">
            <div class="product__options">
                <a href="#" @click.prevent="selectOption('description')">Descripcion</a>
                <a href="#" @click.prevent="selectOption('commentaries')">Valoraciones</a>
                <a href="#" @click.prevent="selectOption('detail')">Detalles</a>
            </div>
            <div class="product__option-content">
                <div v-if="selectedOption === 'description'" class="product__description2">
                    @{{ product.description2 }}
                </div>
                <div v-if="selectedOption === 'commentaries'" class="product__commentaries">
                    <h5>Valoraciones (11)</h5>
                    <div class="product__valoration-container">
                        <div class="product__valoration-left">
                            <div class="product__valoration">
                                <span>5 Estrellas</span>
                                <div class="product__valoration-line">
                                    <div v-bind:style="{ width: 82 + '%' }" class="product__valoration-line-color"></div>
                                </div>
                                <span class="product__valoration-porc">82%</span>
                            </div>
                            <div class="product__valoration">
                                <span>4 Estrellas</span>
                                <div class="product__valoration-line">
                                    <div v-bind:style="{ width: 18 + '%' }" class="product__valoration-line-color"></div>
                                </div>
                                <span class="product__valoration-porc">18%</span>
                            </div>
                            <div class="product__valoration">
                                <span>3 Estrellas</span>
                                <div class="product__valoration-line">
                                    <div v-bind:style="{ width: 0 + '%' }" class="product__valoration-line-color"></div>
                                </div>
                                <span class="product__valoration-porc">0%</span>
                            </div>
                            <div class="product__valoration">
                                <span>2 Estrellas</span>
                                <div class="product__valoration-line">
                                    <div v-bind:style="{ width: 0 + '%' }" class="product__valoration-line-color"></div>
                                </div>
                                <span class="product__valoration-porc">0%</span>
                            </div>
                            <div class="product__valoration">
                                <span>1 Estrella</span>
                                <div class="product__valoration-line">
                                    <div v-bind:style="{ width: 0 + '%' }" class="product__valoration-line-color"></div>
                                </div>
                                <span class="product__valoration-porc">82%</span>
                            </div>
                        </div>
                        <div class="product__valoration-right">
                            <div class="product__stars">
                                <span>4.8 / 5.0</span>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <div class="product__comentary" v-for="i in 10" :key="i">
                        <div class="product__comentary-left">
                            <img class="product__comentary-user" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQTMXrsFHeVVEaWkCc5Ex10ysdwqK3ukMUmG1MRaAOSuVUq-zC9&s" alt="">
                            <span>RekceBVM</span>
                        </div>
                        <div class="product__comentary-right">
                            <div class="product__stars mb-1">
                                <span>Valoracion: 5.0 -></span>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="product__comentary-text">
                                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptas iste laboriosam in, debitis architecto laborum fuga exercitationem, quibusdam, nostrum fugiat iusto repudiandae eum corrupti. Praesentium, delectus nesciunt? Illum tempora voluptatum eius possimus voluptatibus. Alias fugiat ullam praesentium vel commodi ad non nobis enim minima deserunt rerum asperiores sunt esse culpa at necessitatibus corrupti possimus illum nulla magni, quasi dicta perspiciatis.
                            </div>
                        </div>
                    </div>
                </div>
            <div v-if="selectedOption === 'detail'" class="product__detail">@{{ product.detail }}</div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
  <script src="/js/appProduct.js"></script>
@endsection