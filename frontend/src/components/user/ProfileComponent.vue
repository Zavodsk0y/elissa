<template>
  <body>
  <section class="profile">
    <div class="wrapper pt-pb-2">
      <div class="profileInfo">
        <form class="profileForm1" @submit.prevent="changeEmail">
          <h2 class="fs-32px t-a-c">Профиль</h2>
          <h3 class="fs-24px fw-400">Ваши данные</h3>
          <div class="grid_profile">
            <div class="profilePart1">
              <label for="putSurname" class="fs-17px fw-700">Фамилия</label><br>
              <h3 class="fs-17px fw-400">{{ formData.surname }}</h3>
              <label for="putName" class="fs-17px fw-700">Имя</label>
              <h3 class="fs-17px fw-400">{{ formData.name }}</h3><br>
            </div>
            <div class="profilePart2">
              <label for="putPatronymic" class="fs-17px fw-700">Отчество</label><br>
              <h3 v-if="formData.patronymic" class="fs-24px fw-400">{{ formData.patronymic }}</h3>
              <h3 v-else class="fs-17px fw-400">-</h3>
              <label for="putLogin" class="fs-17px fw-700">Логин</label><br>
              <h3 class="fs-17px fw-400">{{ formData.login }}</h3><br>
            </div>
          </div>
          <div class="changeUserInfo">
            <h3 class="fs-24px fw-400">Сменить адрес электронной почты</h3>
            <label for="putEmail" class="fs-17px fw-700">Адрес электронной почты</label><br><br>
            <input v-model="formData.email" id="putEmail" class="fs-17px" type="email" required><br><br><br>
            <button type="submit" class="updateInfoButton d-f a-i-c j-c-c fs-24px">Сохранить</button>
            <p v-if="successMessage" class="d-f j-c-c success-message fs-28px">{{ successMessage }}</p>
            <p v-if="errorMessage" class="d-f j-c-c error-message fs-28px">{{ errorMessage }}</p>
          </div>
        </form>

        <form class="profileForm2" @submit.prevent="changePassword">
          <h3 class="fs-24px fw-400">Сменить пароль</h3>
          <label for="putPassword1" class="fs-17px fw-700">Пароль</label><br><br>
          <input v-model="formData.password1" id="putPassword1" class="fs-17px" type="password"><br><br><br>
          <label for="putPassword2" class="fs-17px fw-700">Повторите пароль</label><br><br>
          <input v-model="formData.password2" id="putPassword2" class="fs-17px" type="password"><br><br><br><br>
          <button type="submit" class="updateInfoButton d-f a-i-c j-c-c fs-24px">Сохранить</button>
        </form>

        <br><br><br>
        <div v-if="isAdmin">
          <router-link class="fs-24px" to="/requests">Все заявки</router-link>
          <br><br><br><br>
          <router-link class="fs-24px" to="/users">Все пользователи</router-link>

        </div>
        <div v-else-if="isEmployee">
          <router-link class="fs-24px" to="/requests">Все заявки</router-link>
        </div>
        <div v-else>
          <router-link class="fs-24px" to="/cart">Корзина</router-link>
          <br><br><br><br>

          <router-link class="fs-24px" to="/orders">Ваши заказы</router-link>
          <br><br><br><br>

        </div>
      </div>
    </div>
  </section>
  </body>
</template>


<script>
import axios from 'axios';
import {mapGetters} from 'vuex';
const apiUrl = process.env.VUE_APP_API_BASE_URL;

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
    ...mapGetters(['isAdmin']),
    ...mapGetters(['isEmployee'])
  },
  created() {
    this.loadUserProfile();
    this.$store.dispatch('fetchUserProfile');
  },
  methods: {
    loadUserProfile() {
      const token = localStorage.getItem('token');
      if (token) {
        axios.get(`${apiUrl}/users/me`, {
          headers: {Authorization: `Bearer ${token}`}
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
    changeEmail() {
      this.successMessage = '';
      this.errorMessage = '';
      const token = localStorage.getItem('token');
      if (token) {
        axios.post(`${apiUrl}/users/email-change`, {email: this.formData.email}, {
          headers: {Authorization: `Bearer ${token}`}
        })
            .then(() => {
              this.successMessage = 'Адрес электронной почты обновлен';
            })
            .catch(error => {
              console.error('Error updating email:', error.response || error);
              this.errorMessage = 'Ошибка обновления электронной почты';
            });
      } else {
        this.errorMessage = 'Токен не найден';
        console.error('Token not found');
      }
    },
    changePassword() {
      this.successMessage = '';
      this.errorMessage = '';

      if (this.formData.password1 !== this.formData.password2) {
        this.errorMessage = 'Пароли не совпадают';
        return;
      }

      const token = localStorage.getItem('token');
      if (token) {
        axios.post(`${apiUrl}/users/password-change`, {password: this.formData.password1}, {
          headers: {Authorization: `Bearer ${token}`}
        })
            .then(() => {
              this.successMessage = 'Пароль обновлен';
              this.formData.password1 = '';
              this.formData.password2 = '';
            })
            .catch(error => {
              console.error('Error updating password:', error.response || error);
              this.errorMessage = 'Ошибка обновления пароля';
            });
      } else {
        this.errorMessage = 'Токен не найден';
        console.error('Token not found');
      }
    },
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
