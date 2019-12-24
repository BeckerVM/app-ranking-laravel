@extends('layouts.main_dashboard')

@section('title', 'Bienvenido a M&M')

@section('content')
  <div id="appUsers">
    <div class="dashboard__main-header">
      Dashboard / Usuarios
    </div>
    <div class="dashboard__main-users">
      <div class="dashboard__main-users-header">
        <span>USUARIOS</span>
      </div>
      <div class="dashboard__main-users-content">
        <p>Usted tiene @{{ paginate.total }} usuarios.</p>
        <form action="" class="dashboard__main-users-search">
          <input type="text" placeholder="Buscar usuario...">
          <button type="submit">
            <i class="fa fa-search"></i>
          </button>
        </form>
        <div class="dashboard__main-users-container-table">
          <span>Lista de usuarios</span>
          <table>
            <thead>
              <tr>
                <th>#ID</th>
                <th>EMAIL</th>
                <th>USUARIO</th>
                <th>FECHA</th>
                <th>ROL</th>
                <th>ESTADO</th>
                <th>OPCIONES</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="user in users" :key="user.id">
                <td>@{{ user.id }}</td>
                <td>@{{ user.email }}</td>
                <td>@{{ user.username }}</td>
                <td>@{{ user.created_at }}</td>
                <td>@{{ user.rol }}</td>
                <td>@{{ user.state }}</td>
                <td>Editar Eliminar</td>
              </tr>
            </tbody>
          </table>
          <div class="dashboard__main-users-pag-container">
            <strong>Mostrando @{{ paginate.from }} a @{{ paginate.to }} de @{{ paginate.total }} usuarios</strong>
            <div class="dashboard__main-users-pag">
              <button @click.prevent="changePage(paginate.current_page - 1)" v-if="paginate.current_page > 1">Atras</button>
              <button @click.prevent="changePage(pageNumber)" :class="{'b-red': pageNumber == isActive ? true : false }" v-for="(pageNumber, index) in pagesNumber" :key="index">@{{ pageNumber }}</button>
              <button @click.prevent="changePage(paginate.current_page + 1)" v-if="paginate.current_page < paginate.last_page">Siguiente</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
  <script src="/js/appUsers.js"></script>
@endsection