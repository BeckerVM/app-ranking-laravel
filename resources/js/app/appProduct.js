const Vue = require('vue')

new Vue({
  el: '#appProduct',
  data: {
    product: null,
    productImages: [],
    productStore: null,
    selectedOption: 'commentaries',
    userId: document.getElementById('user').value,
    wish: null, 
    commentaries: [],
    porcent: {
      one: 0,
      two: 0,
      three: 0,
      four: 0,
      five: 0
    },
    calification: {
      one: 0,
      two: 0,
      three: 0,
      four: 0,
      five: 0
    },
    myComment: null,
    content: '',
    point: '1',
    edit: false,
    finalCalification: 0
  },
  methods: {
    changeEdit: function(){
      this.edit = true
      if(this.myComment) {
        this.content = this.myComment.content
        this.point = this.myComment.calification
      }
    },
    getProduct: function() {
      const url = window.location.href
      const id = url.split('/')[5]
  
      window.axios.post('http://localhost:3000/api/products/product', { id, userId: this.userId }).then(response => {
        this.product = response.data.product,
        this.productImages = response.data.productImages
        this.productStore = response.data.productStore
        this.wish = response.data.wish
        this.getCommentaries(this.product.id, this.userId)
      })
      .catch(err => {
        console.log(err.response.data)
      })
    },
    getCommentaries: function(productId, userId) {
      window.axios.post('http://localhost:3000/api/commentaries', { userId, productId }).then(response => {
        this.calification = response.data.calification
        this.commentaries = response.data.commentaries
        this.porcent = response.data.porcent
        this.myComment = response.data.commentary
        this.finalCalification = response.data.finalCalification
      })
      .catch(error => {
        console.log(error.response.data)
      })
    },
    saveCommentary: function() {
      let url = 'http://localhost:3000/api/commentaries/save'
      if(this.edit === true) {
        url = 'http://localhost:3000/api/commentaries/update'
      }

      if(this.content !== '') {
        window.axios.post(
          url, 
          { content: this.content, calification: this.point, userId: this.userId, productId: this.product.id }
        )
        .then(response => {
         this.getCommentaries(this.product.id, this.userId)
         this.edit = false
        })
        .catch(error => {
          console.log(error.response.data)
        })
      }
      
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

