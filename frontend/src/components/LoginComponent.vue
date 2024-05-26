<template>
  <body>
  <section class="login">
    <div class="wrapper mt-1">
      <div class="pt-pb-2 d-f j-c-c">
        <form class="loginForm" method="POST" @submit.prevent="loginRequest">
          <h2 class="fs-28px t-a-c">Авторизация</h2>
          <h3 class="fs-24px fw-400 t-a-c mt-5">Форма для авторизации</h3>
          <label for="putLogin" class="fs-24px d-f j-c-c mt-5">Логин</label><br><br>
          <input id="putLogin" v-model="formData.login" class="fs-17px d-f j-c-c" type="text" placeholder="user"
                 required><br><br><br>

          <label for="putPassword" class="fs-24px d-f j-c-c mt-5">Пароль</label><br><br>
          <input id="putPassword" v-model="formData.password" class="fs-17px d-f j-c-c mt-5" type="password"
                 required><br><br><br>

          <button type="submit" class="fs-24px sendLoginForm d-f j-c-c a-i-c mt-5">Войти</button>
          <br><br>
          <p v-if="errorMessage" class="d-f j-c-c error-message fs-28px">{{ errorMessage }}</p>
          <button @click="linkVkAccount" class="fs-24px fw-400 loginVk d-f j-c-c a-i-c">Войти через ВКонтакте</button>
          <router-link to="/reset_password" class="fs-24px d-f j-c-c mt_1">Забыли пароль?</router-link>
        </form>

      </div>
    </div>
  </section>
  </body>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      formData: {
        login: '',
        password: '',
      },
      errorMessage: ''
    };
  },
  methods: {
    loginRequest() {
      axios
          .post('http://localhost/api/login', this.formData)
          .then((response) => {
            localStorage.setItem('token', response.data.token);
            this.$router.push("/");
            window.location.reload();
          })
          .catch((error) => {
            this.errorMessage = 'Ошибка авторизации. Проверьте логин и пароль.';
            console.log(error);
          });
    },
    // не работает из-за проблемы с токеном
    linkVkAccount() {
      window.location.href = 'http://localhost/api/auth/vk';
    }
  }
};
</script>