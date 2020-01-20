@extends('layouts.main')

@section('title', 'BeatyBigBan')

@section('content')
    @include('partials.header')
    @include('partials.subheader')
    <div class="product" id="appProduct">
        <input type="hidden" id="user" value="@if(Session::has('user')) {{ Session::get('user')['id'] }} @endif">
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
                            Calificacion: 
                            <span>@{{ finalCalification }}</span>
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
                        <a v-if="wish" @click.prevent="deleteWish" href="#">Eliminar de mis deseos <i class="fas fa-gift"></i></a>
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
                    <h5>Valoraciones (@{{ commentaries.length }})</h5>
                    <div class="product__valoration-container">
                        <div class="product__valoration-left">
                            <div class="product__valoration">
                                <span>5 Estrellas</span>
                                <div class="product__valoration-line">
                                    <div v-bind:style="{ width: porcent.five + '%' }" class="product__valoration-line-color"></div>
                                </div>
                                <span class="product__valoration-porc">@{{ porcent.five }} %</span>
                            </div>
                            <div class="product__valoration">
                                <span>4 Estrellas</span>
                                <div class="product__valoration-line">
                                    <div v-bind:style="{ width: porcent.four + '%' }" class="product__valoration-line-color"></div>
                                </div>
                                <span class="product__valoration-porc">@{{ porcent.four }} %</span>
                            </div>
                            <div class="product__valoration">
                                <span>3 Estrellas</span>
                                <div class="product__valoration-line">
                                    <div v-bind:style="{ width: porcent.three + '%' }" class="product__valoration-line-color"></div>
                                </div>
                                <span class="product__valoration-porc"> @{{ porcent.three }} %</span>
                            </div>
                            <div class="product__valoration">
                                <span>2 Estrellas</span>
                                <div class="product__valoration-line">
                                    <div v-bind:style="{ width: porcent.two + '%' }" class="product__valoration-line-color"></div>
                                </div>
                                <span class="product__valoration-porc"> @{{ porcent.two }} %</span>
                            </div>
                            <div class="product__valoration">
                                <span>1 Estrella</span>
                                <div class="product__valoration-line">
                                    <div v-bind:style="{ width: porcent.one + '%' }" class="product__valoration-line-color"></div>
                                </div>
                                <span class="product__valoration-porc">@{{ porcent.one }} %</span>
                            </div>
                        </div>
                        <div class="product__valoration-right">
                            <div class="product__stars">
                                Calificacion: <span>@{{ finalCalification }} / 5</span>
                            </div>
                        </div>
                    </div>
                    <div class="product__comment-edit" v-if="myComment && !edit">
                        <button @click="changeEdit">Editar mi comentario?</button>
                    </div>
                    <div class="product__comment" v-if="!myComment || edit === true">
                        <textarea v-model="content" type="text" placeholder="Comentar...">
                        </textarea>
                        <select v-model="point">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                        <button @click="saveCommentary" type="button">Comentar</button>
                    </div>
                    <div class="product__comentary" v-for="comment in commentaries" :key="comment.user.id">
                        <div class="product__comentary-left">
                            <img class="product__comentary-user" :src="comment.user.img_profile" alt="profile">
                            <span>@{{ comment.user.username }}</span>
                        </div>
                        <div class="product__comentary-right">
                            <div class="product__stars mb-1">
                                <span>Valoracion: @{{ comment.commentary.calification }} -></span>
                                <i class="fas fa-star mr-5" v-for="i in comment.commentary.calification" :key="i"></i>
                                
                            </div>
                            <div class="product__comentary-text">
                                @{{ comment.commentary.content }}
                            </div>
                        </div>
                    </div>
                    <div v-if="commentaries.length === 0" class="mt-10 text-center">
                        No existen commnetarios
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