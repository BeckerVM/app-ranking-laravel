@extends('layouts.main')

@section('title', 'Login')

@section('content')
  @include('partials.header')
  <div class="register" id="appRegister">
    <form @submit.prevent="submitRegisterForm" class="register__form" v-if="!registered">
      <h1 class="register__title">M&M</h1>
      <transition
        enter-active-class="animated tada"
      >
        <div class="register__content-inputs" v-if="showInputs">
          <div class="register__content-input">
            <input v-model="email" class="register__input" type="text" placeholder="Correo electronico"> 
          </div>
          <div class="register__content-input">
            <input v-model="username" class="register__input" type="text" placeholder="Nombre de usuario"> 
          </div>
          <div class="register__content-input">
            <input v-model="password" class="register__input" type="password" placeholder="Contraseña"> 
          </div>
          <div class="register__content-input">
            <select v-model="rol" class="register__input">
              <option value="normal">Cliente</option>
              <option value="comerciante">Vendedor</option>
            </select>
          </div>
      </div>
      </transition>
      
      <div class="register__alert" v-if="error">
        @{{ error }}
      </div>
      <button type="button" @click.prevent="setShowInputs" class="register__btn-form register__btn-form--1" v-if="!showInputs">Empezar</button>
      <transition
        enter-active-class="animated tada"
      >
        <button class="register__btn-form register__btn-form--2" v-if="showInputs">Registrarse</button>
      </transition>
    </form>
    <transition
        enter-active-class="animated tada"
    >
      <div v-if="registered" class="register__registered">
        <h3>SU CUENTA HA SIDO REGISTRADA CORRECTAMENTE</h3>
        <p>@{{ message }}</p>
      </div>
    </transition>
  </div>
@endsection

@section('scripts')
  <script src="/js/appRegister.js"></script>
@endsection