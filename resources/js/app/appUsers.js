const Vue = require('vue')

new Vue({
  el: '#appUsers',
  data: {
    users: [],
    selectedUser: null,
    newStateUser: '',
    paginate: {
      'total': 0,
      'current_page': 0,
      'per_page': 0,
      'last_page': 0,
      'from': 0,
      'to': 0
    },
    openedModal: false
  },
  computed: {
    isActive: function () {
      return this.paginate.current_page
    },
    pagesNumber: function () {
      if (!this.paginate.to) {
        return []
      }

      let from = this.paginate.current_page - 2

      if (from < 1) {
        from = 1
      }

      let to = from + (2 * 2)

      if (to >= this.paginate.last_page) {
        to = this.paginate.last_page
      }

      let pagesArray = []

      while (from <= to) {
        pagesArray.push(from)
        from++
      }

      return pagesArray
    }
  },
  methods: {
    getAllUsers: function() {
      const url = 'http://localhost:3000/api/users'
      window.axios.get(url).then(response => {
        this.users = response.data.users.data
        this.paginate = response.data.paginate
      })
      .catch(err => {
        console.log(err.response.data)
      })
    },
    getUsers: function(page) {
      const url = 'http://localhost:3000/api/users?page=' + page

      window.axios.get(url).then(response => {
        this.users = response.data.users.data
        this.paginate = response.data.paginate
      })
        .catch(err => {
          console.log(err.response.data)
        })
    },
    deleteUser: function(id) {
      window.axios.post('http://localhost:3000/api/users/' + id).then(() => {
        alert('Usuario eliminado correctamente.')
        this.getAllUsers()
      })
      .catch(err => {
        alert('Error al intentar eliminar el usuario.')
      })
    },
    updateUser: function(id) {
      window.axios.post(`http://localhost:3000/api/users/update_state`, {
        id,
        state: this.newStateUser
      }).then(() => {
        this.openedModal = !this.openedModal
        alert('Usuario actualizado correctamente.')
        this.getAllUsers()
      })
      .catch(err => {
        alert('Error al intentar actualizar el usuario.')
      })
    },
    setStateUser: function(state) {
      this.newStateUser = state
    },
    changePage: function(page) {
      this.paginate.current_page = page
      this.getUsers(page)
    },
    openModal: function (user) {
      this.openedModal = !this.openedModal
      this.selectedUser = user
      this.newStateUser = user.state
    }
  },
  created: function () {
    this.getAllUsers()
  }
})
