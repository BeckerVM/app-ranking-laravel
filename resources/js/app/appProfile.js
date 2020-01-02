const Vue = require('vue')

new Vue({
  el: '#appProfile',
  data: {
    option: '',
    loading: true,
    userId: '',
    stores: []
  },
  methods: {
    getDataAccount: function() {
      const url = `http://localhost:3000/api/account`

      window.axios.post(url, { id: this.userId }).then(response => {
        setTimeout(() => {
          this.stores = response.data.stores
          this.loading = false
          this.option = 'stores'
        }, 1000);
      })
      .catch(err => {
        console.log(err.response.data);
      });
    },
    setOption: function(option) {
      if(this.option === option) {
        return
      }

      this.loading = true
      this.option = ''
      setTimeout(() => {
        this.loading = false
        this.option = option
      }, 1000)
    }
  },
  created: function() {
    this.userId = document.getElementById('user').value
    this.getDataAccount()
  }
})

console.log('appProfile')
