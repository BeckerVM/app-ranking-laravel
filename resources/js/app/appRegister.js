const Vue = require('vue')

new Vue({
    el: '#appRegister',
    data: {
        showInputs: false,
        email: '',
        username: '',
        password: '',
        rol: 'normal',
        error: '',
        registered: false,
        message: ''
    },
    methods: {
        setShowInputs: function() {
            this.showInputs = true
        },
        submitRegisterForm: function() {
            const url = 'http://localhost:3000/registrate'
            const { email, username, password, rol } = this

            window.axios.post(url, { email, username, password, rol }).then(response => {
                this.message = response.data.message
                this.registered = true
            })
            .catch(error => {
                this.error = error.response.data.error
                setTimeout(() => {
                    this.error = ''
                    this.email = ''
                }, 2000);
            })
        }
    }
})
