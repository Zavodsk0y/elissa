<template>
    <body>
        <section class="registration">
            <div class="wrapper mt-1">
                <div class="pt-pb-2">
                <form class="registrationForm" @submit.prevent="sendRegistrationRequest">
                    <h2 class="fs-32px t-a-c">Регистрация</h2>
                    <h3 class="fs-24px fw-400">Форма для регистрации</h3>
                    <label for="putSurname" class="fs-17px">Фамилия</label><br><br>
                    <input id="putSurname" class="fs-17px" v-model="form.surname" type="text" placeholder="Иванов" required><br><br><br>

                    <label for="putName" class="fs-17px">Имя</label><br><br>
                    <input id="putName" class="fs-17px" v-model="form.name" type="text" placeholder="Иван" required><br><br><br>

                    <label for="putPatronymic" class="fs-17px">Отчество</label><br><br>
                    <input id="putPatronymic" class="fs-17px" v-model="form.patronymic" type="text" placeholder="Иванович"><br><br><br>

                    <label for="putLogin" class="fs-17px">Логин</label><br><br>
                    <input id="putLogin" class="fs-17px" v-model="form.login" type="text" placeholder="user" required><br><br><br>

                    <label for="putEmail" class="fs-17px">Адрес электронной почты</label><br><br>
                    <input id="putEmail" class="fs-17px" v-model="form.email" type="email" placeholder="user@gmail.com" required><br><br><br>

                    <label for="putPassword1" class="fs-17px">Пароль</label><br><br>
                    <input id="putPassword1" class="fs-17px" v-model="form.password" type="password"><br><br><br>

                    <label for="putPassword2" class="fs-17px">Повторите пароль</label><br><br>
                    <input id="putPassword2" class="fs-17px" v-model="form.password_confirmation" type="password"><br><br><br><br>

                    <div class="d-f f-d-r">
                        <button type="submit" class="sendRegistrationForm d-f j-c-c fs-24px">Отправить</button>
                        <router-link to="login_vk" class="fs-24px fw-400 registrationVk d-f j-c-c a-i-c t-a-c">Регистрация через ВКонтакте</router-link>
                    </div>

                </form>
                </div>
            </div>
        </section>
    </body>
</template>

<script>
export default {
    data() {
        return {
            form: {
                surname: '',
                name: '',
                patronymic: '',
                login: '',
                email: '',
                password: '',
                password_confirmation: '',
            }
        }
    },
    methods: {
        sendRegistrationRequest() {
            try {
                const response = axios.post('http://localhost:8080/registration')
                console.log('Регистрация успешна', response.data);
            }
            catch (error) {
                console.log('Ошибка регистрации', error.response);
            }
        }
    }
}
</script>