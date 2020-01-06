const Vue = require('vue')

new Vue({
  el: '#appWishes',
  data: {
    wishes: [],
    loading: true
  },
  methods: {
    getWishes: function() {
      const url = `http://localhost:3000/api/wishes`

      window.axios.post(url).then(response => {
        setTimeout(() => {
          this.wishes = response.data.wishes
          this.loading = false
        }, 1000);
      })
      .catch(err => {
        console.log(err.response.data);
      })
    }
  },
  created: function() {
    this.getWishes()
  }
})

console.log('appWishes')