<template>
  <body>
  <section class="admin">
    <div class="wrapper pt-pb-2">
      <form @submit.prevent="addWorker" class="addWorkerForm">
        <h3 class="fs-32px t-a-c">Работа с сотрудниками</h3>
        <h3 class="fs-24px fw-400">Добавить сотрудника</h3>
        <div class="d-f f-d-r">
          <div class="profilePart1">
            <label for="putSurname" class="fs-17px fw-700">Фамилия</label><br><br>
            <input v-model="newWorker.surname" id="putSurname" class="fs-17px" type="text" placeholder="worker" required><br><br><br>
            <label for="putName" class="fs-17px fw-700">Имя</label><br><br>
            <input v-model="newWorker.name" id="putName" class="fs-17px" type="text" placeholder="worker" required><br><br><br>
            <label for="putPatronymic" class="fs-17px fw-700">Отчество</label><br><br>
            <input v-model="newWorker.patronymic" id="putPatronymic" class="fs-17px" type="text" placeholder="worker"><br><br><br>
            <label for="putLogin" class="fs-17px fw-700">Логин</label><br><br>
            <input v-model="newWorker.login" id="putLogin" class="fs-17px" type="text" placeholder="worker" required><br><br><br>
          </div>
          <div class="profilePart2">
            <label for="putEmail" class="fs-17px fw-700">Адрес электронной почты</label><br><br>
            <input v-model="newWorker.email" id="putEmail" class="fs-17px" type="email" required><br><br><br>
            <label for="putPassword1" class="fs-17px fw-700">Пароль</label><br><br>
            <input v-model="newWorker.password" id="putPassword1" class="fs-17px" type="password" placeholder="****"><br><br><br>
            <label for="putPassword2" class="fs-17px fw-700">Повторите пароль</label><br><br>
            <input v-model="newWorker.confirmPassword" id="putPassword2" class="fs-17px" type="password"><br><br><br><br>
            <button type="submit" class="updateProfileButton d-f a-i-c j-c-c fs-24px">Добавить</button>
            <p v-if="successMessage" class="d-f j-c-c success-message fs-28px">{{ successMessage }}</p>
            <p v-if="errorMessage" class="d-f j-c-c error-message fs-28px">{{ errorMessage }}</p>
          </div>
        </div><br><br><br>
      </form>

      <h2 class="fs-32px t-a-c">Все пользователи</h2>
      <div class="grid_workers d-f f-d-r j-c-s-b">
        <div class="worker" v-for="(user, index) in users" :key="index">
          <h3 class="fs-24px">Фамилия:</h3><h3 class="fs-24px fw-400">{{ user.surname }} </h3>
          <h3 class="fs-24px">Имя:</h3><h3 class="fs-24px fw-400">{{ user.name }}</h3>
          <h3 class="fs-24px">Отчество:</h3><h3 class="fs-24px fw-400">{{ user.patronymic }}</h3>
          <h3 class="fs-24px">Логин:</h3><h3 class="fs-24px fw-400">{{ user.login }} </h3>
          <h3 class="fs-24px">Адрес электронной почты:</h3><h3 class="fs-24px fw-400"> {{ user.email }} </h3>
          <button @click="removeUser(user.id)" type="submit" class="fireWorkerButton d-f a-i-c j-c-c fs-24px">Удалить</button>
        </div>
      </div>
    </div>
  </section>
  </body>
</template>

<script>
import axios from 'axios';
import {mapGetters} from "vuex";

export default {
  data() {
    return {
      newWorker: {
        surname: '',
        name: '',
        patronymic: '',
        login: '',
        email: '',
        password: '',
        confirmPassword: '',
      },
      successMessage: '',
      errorMessage: '',
      users: []
    }
  },
  computed: {
    ...mapGetters(['isAdmin'])
  },
  created() {
    this.loadUsers();
  },
  methods: {
    addWorker() {
      if (this.newWorker.password !== this.newWorker.confirmPassword) {
        this.errorMessage = 'Пароли не совпадают';
        return;
      }

      const token = localStorage.getItem('token');

      axios.post('http://localhost/api/workers', this.newWorker, {
        headers: {
          Authorization: `Bearer ${token}`
        }
      })
          .then(response => {
            this.successMessage = 'Пользователь добавлен!';
            this.users.push(response.data);
            this.resetForm();
          })
          .catch(error => {
            this.errorMessage = 'Ошибка при добавлении пользователя';
          });
    },
    loadUsers() {
      const token = localStorage.getItem('token');

      axios.get('http://localhost/api/users', {
        headers: {
          Authorization: `Bearer ${token}`
        }
      })
          .then(response => {
            this.users = response.data;
          })
          .catch(error => {
            this.errorMessage = 'Ошибка при загрузке пользователей';
          });
    },
    removeUser(userId) {
      const token = localStorage.getItem('token');

      axios.delete(`http://localhost//api/workers/${userId}`, {
        headers: {
          Authorization: `Bearer ${token}`
        }
      })
          .then(() => {
            this.users = this.users.filter(user => user.id !== userId);
          })
          .catch(error => {
            this.errorMessage = 'Ошибка при удалении пользователя';
          });
    },
    resetForm() {
      this.newWorker = {
        surname: '',
        name: '',
        patronymic: '',
        login: '',
        email: '',
        password: '',
        confirmPassword: ''
      };
    }
  }
}
</script>
