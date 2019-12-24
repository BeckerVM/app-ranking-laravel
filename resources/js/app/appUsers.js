const Vue = require('vue')

new Vue({
  el: '#appUsers',
  data: {
    users: [],
    paginate: {
      'total': 0,
      'current_page': 0,
      'per_page': 0,
      'last_page': 0,
      'from': 0,
      'to': 0
    }
  },
  computed: {
    isActive: function() {
      return this.paginate.current_page
    },
    pagesNumber: function() {
      if(!this.paginate.to) {
        return []
      }

      let from = this.paginate.current_page - 2

      if(from < 1) {
        from = 1
      }

      let to = from + (2 * 2)

      if(to >= this.paginate.last_page) {
        to = this.paginate.last_page
      }

      let pagesArray = []

      while(from <= to) {
        pagesArray.push(from)
        from++
      }

      return pagesArray
    }
  },
  methods: {
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
    changePage: function(page) {
      this.paginate.current_page = page
      this.getUsers(page)
    }
  },
  created: function() {
    const url = 'http://localhost:3000/api/users'
    window.axios.get(url).then(response => {
      this.users = response.data.users.data
      this.paginate = response.data.paginate
    })
    .catch(err => {
      console.log(err.response.data)
    })
  }
})
