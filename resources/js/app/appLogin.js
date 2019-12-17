const Vue = require('vue')
const axios = require('axios')

new Vue({
    el: '#appLogin',
    data: {
        email: '',
        password: '',
        completedEmail: false,
        error: null
    },
    methods: {
        onPressNext: function() {
            if(this.email !== '') {
                this.completedEmail = true
            }
        },
        submitLoginForm: function() {
            const url = 'http://localhost:3000/login'
            axios.post(url, { email: this.email, password: this.password }).then(response => { 
                if(response.data.rol === 'normal' || response.data.rol === 'comerciante') {
                    window.location.href = "http://localhost:3000";
                } else {
                    window.location.href = "http://localhost:3000/admin/dashboard";
                }
            })
            .catch(err => {
                this.error = err.response.data.error
                setTimeout(() => {
                    this.error = null
                    this.email = ''
                    this.password = ''
                    this.completedEmail = false
                }, 2000)
            })
        }
    }
});

console.log('appLogin')