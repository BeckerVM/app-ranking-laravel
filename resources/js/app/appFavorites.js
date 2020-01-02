const Vue = require('vue')

new Vue({
  el: '#appFavorites',
  data: {
    userId: '',
    stores: [],
    loading: true
  },
  methods: {
    getFavorites: function() {
      const url = `http://localhost:3000/api/favorites`

      window.axios.post(url, { id: this.userId }).then(response => {
        setTimeout(() => {
          this.stores = response.data.stores
          this.loading = false
        }, 1000);
      })
      .catch(err => {
        console.log(err.response.data);
      });
    }
  },
  created:  function() {
    this.userId = document.getElementById('user').value
    this.getFavorites();
  }
})

console.log('APP FAVORITES')