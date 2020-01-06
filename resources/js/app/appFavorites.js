const Vue = require('vue')

new Vue({
  el: '#appFavorites',
  data: {
    userId: '',
    stores: [],
    loading: true,
    openedModal: false,
    storeSelected: null
  },
  methods: {
    getFavorites: function() {
      const url = `http://localhost:3000/api/favorites`

      window.axios.post(url).then(response => {
        setTimeout(() => {
          this.stores = response.data.stores
          this.loading = false
        }, 1000);
      })
      .catch(err => {
        console.log(err.response.data);
      })
    },
    deleteFavorite: function() {
      const url = `http://localhost:3000/api/favorites/delete`

      window.axios.post(url, { userId: this.userId, storeId: this.storeSelected.id }).then(response => {
        this.openedModal = !this.openedModal
        this.getFavorites()
      })
      .catch(err => {
        console.log(err.response.data);
      })
    },
    openModal: function(store) {
      this.openedModal = !this.openedModal
      this.storeSelected = store
    }
  },
  created:  function() {
    this.userId = document.getElementById('user').value
    this.getFavorites();
  }
})

console.log('APP FAVORITES')