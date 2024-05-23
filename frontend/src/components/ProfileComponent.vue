<template>
  <body>
  <section class="profile">
    <div class="wrapper pt-pb-2">
      <form class="profileForm" @submit.prevent="saveUserProfile">
        <h2 class="fs-32px t-a-c">Профиль</h2>
        <h3 class="fs-24px fw-400">Ваши данные</h3>
        <div class="d-f f-d-r">
          <div class="profilePart1">
            <label for="putSurname" class="fs-17px fw-700">Фамилия</label><br><br>
            <input v-model="formData.surname" id="putSurname" class="fs-17px" type="text" required><br><br><br>
            <label for="putName" class="fs-17px fw-700">Имя</label><br><br>
            <input v-model="formData.name" id="putName" class="fs-17px" type="text" required><br><br><br>
            <label for="putPatronymic" class="fs-17px fw-700">Отчество</label><br><br>
            <input v-model="formData.patronymic" id="putPatronymic" class="fs-17px" type="text"><br><br><br>
            <label for="putLogin" class="fs-17px fw-700">Логин</label><br><br>
            <input v-model="formData.login" id="putLogin" class="fs-17px" type="text" required><br><br><br>
          </div>
          <div class="profilePart2">
            <label for="putEmail" class="fs-17px fw-700">Адрес электронной почты</label><br><br>
            <input v-model="formData.email" id="putEmail" class="fs-17px" type="email" required><br><br><br>
            <label for="putPassword1" class="fs-17px fw-700">Пароль</label><br><br>
            <input v-model="formData.password1" id="putPassword1" class="fs-17px" type="password"><br><br><br>
            <label for="putPassword2" class="fs-17px fw-700">Повторите пароль</label><br><br>
            <input v-model="formData.password2" id="putPassword2" class="fs-17px" type="password"><br><br><br><br>
            <button type="submit" class="updateProfileButton d-f a-i-c j-c-c fs-24px">Сохранить</button>
            <p v-if="successMessage" class="d-f j-c-c success-message fs-28px">{{ successMessage }}</p>
            <p v-if="errorMessage" class="d-f j-c-c error-message fs-28px">{{ errorMessage }}</p>
          </div>
        </div><br><br><br>
        <router-link class="fs-24px" to="/cart" v-if="!isAdmin">Корзина</router-link><br><br><br><br>
        <router-link class="fs-24px" to="/requests" v-if="!isAdmin">Ваши заявки</router-link><br><br><br><br>
        <router-link class="fs-24px" to="/users_requests" v-if="isAdmin">Заявки пользователей</router-link><br><br><br><br>
        <router-link class="fs-24px" to="/workers" v-if="isAdmin">Все сотрудники</router-link>
      </form>
    </div>
  </section>
  </body>
</template>

<script>
import axios from 'axios';
import { mapGetters } from 'vuex';

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
      },
      successMessage: '',
      errorMessage: ''
    };
  },
  computed: {
    ...mapGetters(['isAdmin'])
  },
  created() {
    this.loadUserProfile();
    this.$store.dispatch('fetchUserProfile');
  },
  methods: {
    loadUserProfile() {
      const token = localStorage.getItem('token');
      if (token) {
        axios.get('http://localhost/api/users/me', {
          headers: { Authorization: `Bearer ${token}` }
        })
            .then(response => {
              const user = response.data;
              this.formData.surname = user.surname || '';
              this.formData.name = user.name || '';
              this.formData.patronymic = user.patronymic || '';
              this.formData.login = user.login || '';
              this.formData.email = user.email || '';
            })
            .catch(error => {
              console.error('Error loading user profile:', error.response || error);
              this.errorMessage = 'Ошибка загрузки данных профиля';
            });
      } else {
        this.errorMessage = 'Токен не найден';
        console.error('Token not found');
      }
    },
    saveUserProfile() {
      this.successMessage = '';
      this.errorMessage = '';

      if (this.formData.password1 !== this.formData.password2) {
        this.errorMessage = 'Пароли не совпадают';
        return;
      }

      const updatedUser = {
        surname: this.formData.surname,
        name: this.formData.name,
        patronymic: this.formData.patronymic,
        login: this.formData.login,
        email: this.formData.email,
        password: this.formData.password1
      };

      const token = localStorage.getItem('token');
      if (token) {
        axios.patch('http://localhost/api/users/info-change', updatedUser, {
          headers: { Authorization: `Bearer ${token}` }
        })
            .then(() => {
              this.successMessage = 'Профиль обновлен';
              this.formData.password1 = '';
              this.formData.password2 = '';
            })
            .catch(error => {
              console.error('Error updating profile:', error.response || error);
              this.errorMessage = 'Ошибка обновления профиля';
            });
      } else {
        this.errorMessage = 'Токен не найден';
        console.error('Token not found');
      }
    }
  }
};
</script>

<style>
.success-message {
  color: green;
  margin-bottom: 10px;
}

.error-message {
  color: red;
  margin-bottom: 10px;
}
</style>
