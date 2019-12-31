const Vue = require('vue')

new Vue({
  el: '#appFavorites',
  data: {
    userId: '',
    stores: []
  },
  methods: {
    getFavorites: function() {
      const url = `http://localhost:3000/api/favorites`

      window.axios.post(url, { id: this.userId }).then(response => {
        this.stores = response.data.stores
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