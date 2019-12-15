@extends('layouts.main')

@section('title', 'Login')

@section('content')
  @include('partials.header')
  <div class="login" id="appLogin">
    <form class="login__form" @submit.prevent="submitLoginForm">
      <h1 class="login__title">M&M</h1>
      <input class="login__input" v-model="email" type="text" placeholder="Correo electronico" v-if="completedEmail == false">
      <input class="login__input" v-model="password" v-if="completedEmail" type="password" placeholder="Contraseña">
      <div class="login__alert" v-if="error">
        @{{ error }}
      </div>
      <button @click.prevent="onPressNext" class="login__btn-form" v-if="completedEmail == false">Siguiente</button>
      <button type="submit" v-if="completedEmail" v-cloak class="login__btn-form">Inicia sesion</button>
    </form>
  </div>
@endsection

@section('scripts')
  <script src="/js/appLogin.js"></script>
@endsection