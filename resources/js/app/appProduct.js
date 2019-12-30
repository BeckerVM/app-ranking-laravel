const Vue = require('vue')

new Vue({
  el: '#appProduct',
  data: {
    product: null,
    productImages: [],
    productStore: null,
    selectedOption: 'commentaries'
  },
  methods: {
    getProduct: function() {
      const url = window.location.href
      const id = url.split('/')[5]
  
      window.axios.post('http://localhost:3000/api/products/product', { id }).then(response => {
        this.product = response.data.product,
        this.productImages = response.data.productImages
        this.productStore = response.data.productStore
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
    this.getProduct()
  }
})

console.log('appProduct')