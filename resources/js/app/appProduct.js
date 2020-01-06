const Vue = require('vue')

new Vue({
  el: '#appProduct',
  data: {
    product: null,
    productImages: [],
    productStore: null,
    selectedOption: 'commentaries',
    userId: null,
    wish: null
  },
  methods: {
    getProduct: function() {
      const url = window.location.href
      const id = url.split('/')[5]
  
      window.axios.post('http://localhost:3000/api/products/product', { id, userId: this.userId }).then(response => {
        this.product = response.data.product,
        this.productImages = response.data.productImages
        this.productStore = response.data.productStore
        this.wish = response.data.wish
      })
      .catch(err => {
        console.log(err.response.data)
      })
    },
    saveWish: function() {
      window.axios.post('http://localhost:3000/api/wish/save', { userId: this.userId, productId: this.product.id }).then(response => {
        this.wish = response.data
      })
      .catch(err => {
        console.log(err.response.data)
      })
    },
    deleteWish: function() {
      window.axios.post('http://localhost:3000/api/wish/delete', { userId: this.userId, productId: this.product.id }).then(response => {
        this.wish = response.data
      })
      .catch(err => {
        console.log(err.response.data)
      })
    },
    selectOption: function(option) {
      this.selectedOption = option
    }
  },
  created: function() {
    this.userId = document.getElementById('user').value
    this.getProduct()
  }
})

