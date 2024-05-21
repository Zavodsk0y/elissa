<template>
  <body>
  <section class="profile">
    <div class="wrapper pt-pb-2">
      <form class="profileForm" @submit.prevent="saveUserProfile">
        <h2 class="fs-32px t-a-c">Профиль администратора</h2>
        <h3 class="fs-24px fw-400">Ваши данные</h3>
          <div class="d-f f-d-r">
              <div class="profilePart1">
                  <label for="putSurname" class="fs-17px fw-700">Фамилия</label><br><br>
                  <input v-model="surname" id="putSurname" class="fs-17px" type="text" required><br><br><br>

                  <label for="putName" class="fs-17px fw-700">Имя</label><br><br>
                  <input v-model="name" id="putName" class="fs-17px" type="text" required><br><br><br>

                  <label for="putPatronymic" class="fs-17px fw-700">Отчество</label><br><br>
                  <input v-model="patronymic" id="putPatronymic" class="fs-17px" type="text"><br><br><br>

                  <label for="putLogin" class="fs-17px fw-700">Логин</label><br><br>
                  <input v-model="login" id="putLogin" class="fs-17px" type="text" required><br><br><br>
              </div>

              <div class="profilePart2">
                  <label for="putEmail" class="fs-17px fw-700">Адрес электронной почты</label><br><br>
                  <input v-model="email" id="putEmail" class="fs-17px" type="email" required><br><br><br>

                  <label for="putPassword1" class="fs-17px fw-700">Пароль</label><br><br>
                  <input v-model="password1" id="putPassword1" class="fs-17px" type="password"><br><br><br>

                  <label for="putPassword2" class="fs-17px fw-700">Повторите пароль</label><br><br>
                  <input v-model="password2" id="putPassword2" class="fs-17px" type="password"><br><br><br><br>

                  <button type="submit" class="updateProfileButton d-f a-i-c j-c-c fs-24px">Сохранить</button>

                  <p v-if="successMessage" class="d-f j-c-c success-message fs-28px">{{ successMessage }}</p>
                  <p v-if="errorMessage" class="d-f j-c-c error-message fs-28px">{{ errorMessage }}</p>
              </div>
          </div><br><br><br>
        <router-link class="fs-24px" to="/users_requests">Заявки пользователей</router-link><br><br><br><br>
        <router-link class="fs-24px" to="/workers">Все сотрудники</router-link>
      </form>
    </div>
  </section>
  </body>

</template>
<script>
export default {
    data() {
        return {
            surname: '',
            name: '',
            patronymic: '',
            login: '',
            email: '',
            password1: '',
            password2: '',
            successMessage: '',
            errorMessage: ''
        };
    },
    created() {
        this.loadUserProfile();
    },
    methods: {
        loadUserProfile() {
            const storedUser = JSON.parse(localStorage.getItem('user'));
            if (storedUser) {
                this.login = storedUser.login;
                this.surname = storedUser.surname;
                this.name = storedUser.name;
                this.patronymic = storedUser.patronymic || '';
                this.email = storedUser.email;
                this.password1 = storedUser.password;
                this.password2 = storedUser.password;
            }
        },
        saveUserProfile() {
            this.successMessage = '';
            this.errorMessage = '';

            if (this.password1 !== this.password2) {
                this.errorMessage = 'Пароли не совпадают';
                return;
            }

            const updatedUser = {
                login: this.login,
                surname: this.surname,
                name: this.name,
                patronymic: this.patronymic,
                email: this.email,
                password: this.password1
            };

            localStorage.setItem('user', JSON.stringify(updatedUser));
            this.successMessage = 'Профиль обновлен';

            this.password1 = this.password1;
            this.password2 = this.password2;
        }
    }
};
</script>