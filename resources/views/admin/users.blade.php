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
                <td>
                  <button @click="openModal(user)"><i class="fas fa-pencil-alt"></i></button>
                  <button @click="deleteUser(user.id)"><i class="fas fa-trash"></i></button>
                </td>
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

    <div class="dashboard__main-modal">
      <div @click="openModal" class="dashboard__back-modal" :class="{ 'active': openedModal }">
      </div>
      <div class="dashboard__front-modal" :class="{ 'active': openedModal }">
        <div class="dashboard__header-modal">

        <h4 v-if="selectedUser">USUARIO: @{{ selectedUser.username }} - ESTADO: @{{ selectedUser.state }}</h4>
        </div>
        <div class="dashboard__body-modal">
          <p>Estado seleccionado: @{{ newStateUser }}</p>
          <div class="dashboard__option-state">
            <button @click="setStateUser('pendiente')">Pendiente</button>
            <button @click="setStateUser('activo')">Activo</button>
            <button @click="setStateUser('bloqueado')">Bloqueado</button>
          </div>
        </div>
        <div class="dashboard__footer-modal">
          <button @click="openModal">Cerrar</button>
          <button @click="updateUser(selectedUser.id)">Guada cambios</button>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
  <script src="/js/appUsers.js"></script>
@endsection