<template>
    <body>
    <section class="login">
        <div class="wrapper mt-1">
            <div class="pt-pb-2 d-f j-c-c">
                <form class="loginForm" method="POST" @submit.prevent="sendRequest">
                    <h2 class="fs-28px t-a-c">Авторизация</h2>
                    <h3 class="fs-24px fw-400 t-a-c mt-5">Форма для авторизации</h3>
                    <label for="putLogin" class="fs-24px d-f j-c-c mt-5">Логин</label><br><br>
                    <input id="putLogin" v-model="form.login" class="fs-17px d-f j-c-c" type="text" placeholder="user" required><br><br><br>

                    <label for="putPassword" class="fs-24px d-f j-c-c mt-5">Пароль</label><br><br>
                    <input id="putPassword" v-model="form.password" class="fs-17px d-f j-c-c mt-5" type="password" required><br><br><br>

                    <button type="submit" class="fs-24px sendLoginForm d-f j-c-c a-i-c mt-5">Войти</button><br><br>
                    <router-link to="login_vk" class="fs-24px fw-400 loginVk d-f j-c-c a-i-c">Войти через ВКонтакте</router-link>
                    <router-link to="/reset_password" class="fs-24px d-f j-c-c mt_1">Забыли пароль?</router-link>
                </form>

            </div>
        </div>
    </section>
    </body>
</template>

<script>
export default {
    data () {
        return {
            form: {
                login: '',
                password: ''
            }
        }
    },
    methods: {
        sendRequest() {
            try {
                const response = axios.post('localhost/login', this.form);
                console.log('Успешная авторизация', response.data)
            }
            catch (error) {
                console.log('Ошибка авторизации', error.response);
            }
            // console.log(this.form)
            // axios
            //     .post('https://localhost/login', this.form)
            //     .then(response => (this.info = response))
        }
    }
}
</script>