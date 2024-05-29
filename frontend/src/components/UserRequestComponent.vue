<template>
  <body>
  <section class="userRequests">
    <div class="wrapper pt-pb-2">
      <h2 class="fs-48px t-a-c c-w">Ваши заявки</h2>
      <div class="grid_userRequest d-f f-d-r j-c-s-b">
        <div class="request c-w" v-for="request in userRequests" :key="request.id">
          <h3 class="fs-28px">Номер заказа:</h3>
          <h3 class="fs-24px fw-400">{{ request.id }} </h3>
          <h3 class="fs-28px">Услуга:</h3>
          <h3 class="fs-24px fw-400">{{ request.service.header }} </h3>
          <h3 class="fs-28px">Стоимость:</h3>
          <h3 class="fs-24px fw-400">{{ request.service.price}} ₽ </h3>
          <h3 class="fs-28px">Статус:</h3>
          <h3 class="fs-24px fw-400">{{ request.status }} </h3>
        </div>
      </div>
    </div>
  </section>
  </body>
</template>

<script>
import axios from 'axios';
const apiUrl = process.env.VUE_APP_API_BASE_URL;


export default {
  data() {
    return {
      userRequests: [],
      errorMessage: '',
    };
  },
  created() {
    this.loadUserRequests();
  },
  methods: {
    loadUserRequests() {
      const token = localStorage.getItem('token');
      if (token) {
        axios.get(`${apiUrl}/requests`, {
          headers: { Authorization: `Bearer ${token}` }
        })
            .then(response => {
              console.log('User requests:', response.data);
              this.userRequests = response.data;
            })
            .catch(error => {
              console.error('Error loading user requests:', error.response ? error.response.data : error);
              this.errorMessage = 'Ошибка загрузки заявок';
            });
      }
      else {
        this.errorMessage = 'Токен не найден';
        console.error('Token not found');
      }
    }
  }
};
</script>
