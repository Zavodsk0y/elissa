<template>
  <body>
  <section class="admin">
    <div class="wrapper pt-pb-2">
      <h2 class="fs-48px t-a-c">Все пользователи</h2><br><br>
      <p v-if="successMessage" class="d-f j-c-c success-message fs-28px">{{ successMessage }}</p>
      <p v-if="errorMessage" class="d-f j-c-c error-message fs-28px">{{ errorMessage }}</p>
      <div class="grid_workers d-f f-d-r j-c-s-b">
        <div class="worker" v-for="(user, index) in users" :key="index">
          <h3 class="fs-24px">Фамилия:</h3><h3 class="fs-24px fw-400">{{ user.surname }} </h3>
          <h3 class="fs-24px">Имя:</h3><h3 class="fs-24px fw-400">{{ user.name }}</h3>
          <h3 class="fs-24px">Отчество:</h3>
            <h3 v-if="user.patronymic" class="fs-24px fw-400">{{ user.patronymic }}</h3>
            <h3 v-else class="fs-24px fw-400">-</h3>
          <h3 class="fs-24px">Логин:</h3><h3 class="fs-24px fw-400">{{ user.login }} </h3>
          <h3 class="fs-24px">Адрес электронной почты:</h3><h3 class="fs-24px fw-400"> {{ user.email }} </h3>
          <h3 class="fs-24px">Роли:</h3>
          <ul class="role-list">
            <h3 v-if="user.roles.length === 0" class="fs-24px fw-400">Нет ролей</h3>
            <li v-for="role in user.roles" :key="role" class="fs-24px fw-400">{{ role }}</li>
          </ul>
          <div class="buttons">
            <button v-if="user.roles.includes('employee')" @click="removeUser(user.id)" type="button" class="removeWorkerButton d-f a-i-c j-c-c fs-24px">Уволить</button>
            <button v-if="!user.roles.includes('employee')" @click="assignRole(user.id, 'employee')" type="button" class="assignWorkerButton d-f a-i-c j-c-c fs-24px">Назначить сотрудником</button>
          </div>
        </div>
      </div>
    </div>
  </section>
  </body>
</template>

<script>
import axios from 'axios';
import { mapGetters } from "vuex";
const apiUrl = process.env.VUE_APP_API_BASE_URL;


export default {
  data() {
    return {
      successMessage: '',
      errorMessage: '',
      users: [],
    }
  },
  computed: {
    ...mapGetters(['isAdmin'])
  },
  created() {
    this.loadUsers();
  },
  methods: {
    loadUsers() {
      const token = localStorage.getItem('token');

      axios.get(`${apiUrl}/users`, {
        headers: {
          Authorization: `Bearer ${token}`
        }
      })
          .then(response => {
            this.users = response.data;
          })
          .catch(error => {
            console.error('Ошибка при загрузке пользователей:', error);
            this.errorMessage = 'Ошибка при загрузке пользователей';
          });
    },
    removeUser(userId) {
      const token = localStorage.getItem('token');

      axios.post(`${apiUrl}/users/${userId}/unsign`, {}, {
        headers: {
          Authorization: `Bearer ${token}`
        }
      })
          .then(() => {
            this.successMessage = `С пользователя снята роль employee`;
            this.loadUsers();
          })
          .catch(error => {
            this.errorMessage = 'Ошибка при удалении роли сотрудника';
          });
    },
    assignRole(userId, role) {
      const token = localStorage.getItem('token');

      axios.post(`${apiUrl}/users/${userId}/assign`, { role: role }, {
        headers: {
          Authorization: `Bearer ${token}`
        }
      })
          .then(response => {
            this.successMessage = `Пользователю присвоена роль ${role}`;
            this.loadUsers();
          })
          .catch(error => {
            this.errorMessage = 'Ошибка при присвоении роли пользователю';
          });
    },
  }
}
</script>
