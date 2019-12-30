const Vue = require('vue')

new Vue({
    el: '#appHeader',
    data: {
        url: window.location.href,
        urlLogin: 'http://localhost:3000/login',
        urlRegister: 'http://localhost:3000/registrate',
        openedModal: false,
    },
    methods: {
        openOrCloseModal: function() {
            this.openedModal = !this.openedModal
        }
    }
})
