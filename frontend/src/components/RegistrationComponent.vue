<template>
    <section class="registration">
        <div class="wrapper mt-1">
            <div class="pt-pb-2">
                <form @submit.prevent="registerUser" class="registrationForm">
                    <h2 class="fs-32px t-a-c">Регистрация</h2>
                    <h3 class="fs-24px fw-400">Форма для регистрации</h3>
                    <label for="surname" class="fs-17px">Фамилия</label><br><br>
                    <input v-model="formData.surname" id="surname" class="fs-17px" type="text" placeholder="Иванов" required><br><br><br>
                    <label for="name" class="fs-17px">Имя</label><br><br>
                    <input v-model="formData.name" id="name" class="fs-17px" type="text" placeholder="Иван" required><br><br><br>
                    <label for="patronymic" class="fs-17px">Отчество</label><br><br>
                    <input v-model="formData.patronymic" id="patronymic" class="fs-17px" type="text" placeholder="Иванович"><br><br><br>
                    <label for="login" class="fs-17px">Логин</label><br><br>
                    <input v-model="formData.login" id="login" class="fs-17px" type="text" placeholder="user" required><br><br><br>
                    <label for="email" class="fs-17px">Адрес электронной почты</label><br><br>
                    <input v-model="formData.email" id="email" class="fs-17px" type="email" placeholder="user@gmail.com" required><br><br><br>
                    <label for="password1" class="fs-17px">Пароль</label><br><br>
                    <input v-model="formData.password1" id="password1" class="fs-17px" type="password" required><br><br><br>
                    <label for="password2" class="fs-17px">Повторите пароль</label><br><br>
                    <input v-model="formData.password2" id="password2" class="fs-17px" type="password" required><br><br><br><br>
                    <div class="d-f f-d-r">
                        <button type="submit" class="sendRegistrationForm d-f j-c-c fs-24px">Зарегистрироваться</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    data() {
        return {
            formData: {
                surname: '',
                name: '',
                patronymic: '',
                login: '',
                email: '',
                password1: '',
                password2: ''
            }
        };
    },
    methods: {
        registerUser() {
            if (this.form.password1 !== this.form.password2) {
                alert("Пароли не совпадают!");
                return;
            }

            const user = {
                surname: this.form.surname,
                name: this.form.name,
                patronymic: this.form.patronymic,
                login: this.form.login,
                email: this.form.email,
                password: this.form.password1
            };

            localStorage.setItem('user', JSON.stringify(user));
            alert("Регистрация прошла успешно!");

        }
    }
};
</script>