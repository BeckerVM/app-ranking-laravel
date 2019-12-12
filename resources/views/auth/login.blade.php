@extends('layouts.main')

@section('title', 'Login')

@section('content')
  @include('partials.header')
  <div class="login" id="appLogin">
    <form class="login__form">
      <h1 class="login__title">M&M</h1>
      <input class="login__input" type="text" placeholder="Correo electronico">
      <div class="login__alert">
        Se ha producido un error. Por favor, vuelve a intentarlo.
      </div>
      <button class="login__btn-form">Siguiente</button>
    </form>
  </div>
@endsection

@section('scripts')
  <script src="/js/appLogin.js"></script>
@endsection