const Vue = require('vue')

new Vue({
    el: '#appLogin',
    data: {
        email: '',
        password: '',
        completedEmail: false,
        error: null,
        users: []
    },
    methods: {
        onPressNext: function () {
            if (this.email !== '') {
                this.completedEmail = true
            }
        },
        submitLoginForm: function () {
            const url = 'http://localhost:3000/login'
            window.axios.post(url, { email: this.email, password: this.password }).then(response => {
                if (response.data.rol === 'normal' || response.data.rol === 'comerciante') {
                    window.location.href = "http://localhost:3000"
                } else {
                    window.location.href = "http://localhost:3000/admin/dashboard"
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
    },
    /*mounted: function() {
        Echo.channel('test').listen('TestEvent', (e) => {
            this.users = e.users
            alert('Usuarios conseguidos')
        })
    }*/
})
