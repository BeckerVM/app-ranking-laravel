<div class="subheader">
  <div class="subheader__superior">
    <div class="subheader__superior-content">
    <Strong>Tienda: {{ $store->name }}</Strong>
      <span>Abierto: 2 años</span>
      <span>98.8% Comentarios positivos</span>
      <span>Seguidores: 200
        <a href="{{ route('save-favorite', ['store_id' => $store->id ]) }}" class="subheader__btn">Seguir</a>
        </div>
      </span>
    </div>
    <div class="subheader__mid">
      <h2>{{ $store->name }}</h2>
    </div>
    <div class="subheader__inferior">
      <nav class="subheader__menu">
        <a href="{{ route('shop', ['id' => $store->id]) }}">Pagina principal</a>
        <a href="{{ route('products', ['id' => $store->id]) }}">Productos</a>
        <a href="#">Mas vendidos</a>
        <a href="#">Comentarios</a>
      </nav>
    </div>
  </div>
</div>