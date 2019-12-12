@extends('layouts.main')

@section('title', 'Login')

@section('content')
  @include('partials.header')
  <div class="register" id="appRegister">
    <form class="register__form">
      <h1 class="register__title">M&M</h1>
      <input class="register__input" type="text" placeholder="Correo electronico">
      <div class="register__alert">
        Se ha producido un error. Por favor, vuelve a intentarlo.
      </div>
      <button class="register__btn-form">Siguiente</button>
    </form>
  </div>
@endsection

@section('scripts')
  <script src="/js/appRegister.js"></script>
@endsection