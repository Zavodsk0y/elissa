<template>
  <header>
    <div class="wrapper">
      <div class="d-f j-c-s-b a-c-c">

        <div class="d-f f-d-c a-i-c t-a-c">
          <router-link to="/"><img src="../src/assets/img/logo-car.png" alt="Нет иконки"></router-link>
          <router-link to="/" class="elissa fs-17px fw-700 c-b">Элисса</router-link>
        </div>

        <div class="d-f j-c-s-b gap-3_5">
          <router-link to="/" class="fs-17px c-b">Главная</router-link>
          <router-link to="/news" class="fs-17px c-b">Новости</router-link>
          <router-link to="/about" class="fs-17px c-b">О нас</router-link>
          <router-link to="/services" class="fs-17px c-b">Услуги</router-link>
          <router-link to="/parts" class="fs-17px c-b">Товары</router-link>
          <router-link to="/signup" v-if="!this.$store.getters.isAuthenticated" class="fs-17px c-b">Регистрация</router-link>
          <router-link to="/login" v-if="!this.$store.getters.isAuthenticated" class="fs-17px c-b">Вход</router-link>
          <router-link to="/users/me" v-if="this.$store.getters.isAuthenticated" class="fs-17px c-b">Профиль</router-link>
          <router-link to="/" @click.native="logout" v-if="this.$store.getters.isAuthenticated" class="fs-17px c-b">Выход</router-link>
        </div>

        <div class="d-f">
          <img src="../src/assets/img/phone-icon.png" class="icon-whatsapp" alt="Нет иконки">
          <span class="fs-17px d-f a-i-c">+7-831-928-14-22</span>
        </div>

        <span class="fs-17px">г. Асино, ул. Зонная 16</span>

        <div class="d-f">
          <img src="../src/assets/img/vk-icon.png" class="icon-vk" alt="Нет иконки">
          <img src="../src/assets/img/email-icon.png" class="icon-email" alt="Нет иконки">
        </div>
      </div>
    </div>
  </header>

  <router-view/>

  <footer>
    <div class="wrapper">
      <div class="d-f j-c-s-b a-c-c">
        <div class="d-f f-d-c a-i-c t-a-c">
          <router-link to="/"><img src="../src/assets/img/logo-car.png" alt="Нет иконки"></router-link>
          <router-link to="/" class="elissa fs-17px fw-700 c-b">Элисса</router-link>
          <div class="d-f mt_1">
            <img src="../src/assets/img/copyright-icon.png" class="copyright-icon" alt="Нет">
            <span class="fs-17px d-f a-i-c ">Элисса, 2022 г.</span>
          </div>
        </div>


        <div class="d-f j-c-s-b gap-3_5 mb_5">
          <router-link to="/" class="fs-17px c-b">Главная</router-link>
          <router-link to="/news" class="fs-17px c-b">Новости</router-link>
          <router-link to="/about" class="fs-17px c-b">О нас</router-link>
          <router-link to="/services" class="fs-17px c-b">Услуги</router-link>
          <router-link to="/parts" class="fs-17px c-b">Товары</router-link>
          <router-link to="/signup" v-if="!this.$store.getters.isAuthenticated" class="fs-17px c-b">Регистрация</router-link>
          <router-link to="/login" v-if="!this.$store.getters.isAuthenticated" class="fs-17px c-b">Вход</router-link>
          <router-link to="/users/me" v-if="this.$store.getters.isAuthenticated" class="fs-17px c-b">Профиль</router-link>
          <router-link to="/" @click.native="logout" v-if="this.$store.getters.isAuthenticated" class="fs-17px c-b">Выход</router-link>
        </div>

        <div class="d-f f-d-c lh-2">
          <span class="fs-17px workingDaysText mt_1">Пн - Пт : 8:00 - 21:00 Сб - Вс : 8:00 - 17:00</span>
        </div>

        <div class="d-f f-d-c lh-2 mt_1">
          <span class="fs-17px">г. Асино, ул. Зонная 16</span>
          <div class="d-f mt_1">
            <img src="../src/assets/img/phone-icon.png" class="icon-whatsapp" alt="Нет иконки">
            <span class="fs-17px d-f phoneNumber mt-1">+7-831-928-14-22</span>
          </div>
          <div class="mt_1">
            <img src="../src/assets/img/vk-icon.png" class="icon-vk" alt="Нет иконки">
            <img src="../src/assets/img/email-icon.png" class="icon-email" alt="Нет иконки">
          </div>
        </div>
      </div>
    </div>
  </footer>
</template>

<script>

export default {
  methods: {
    logout() {
      localStorage.removeItem('token');
      window.location.reload();
    }
  }
};
</script>
