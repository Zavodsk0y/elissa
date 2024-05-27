<template>
  <body>
  <section class="userRequests">
    <div class="wrapper pt-pb-2">
      <h2 class="fs-48px t-a-c c-w">Все заявки</h2>
      <div class="grid_userRequest d-f f-d-r j-c-s-b c-w">
        <div class="request" v-for="request in allRequests" :key="request.requestId">
          <h3 class="fs-28px">Номер заявки:</h3>
          <h3 class="fs-24px fw-400">{{ request.id }}</h3>
          <h3 class="fs-28px">Услуга:</h3>
          <h3 class="fs-24px fw-400">{{ request.service.header }}</h3>
          <h3 class="fs-28px">Стоимость:</h3>
          <h3 class="fs-24px fw-400">{{ request.service.price }} ₽</h3>
          <h3 class="fs-28px">Оформил заявку:</h3>
          <h3 class="fs-24px fw-400">{{ request.userName }}</h3>
          <h3 class="fs-28px">Номер телефона:</h3>
          <h3 class="fs-24px fw-400">{{ request.phone }}</h3>
          <h3 class="fs-28px">Статус:</h3>
          <select class="fs-24px c-w" v-model="request.status">
            <option value="Добавлена">Добавлена</option>
            <option value="Подтверждена">Подтверждена</option>
            <option value="Исполнена">Исполнена</option>
          </select><br><br>
          <button @click="updateStatus(request)" class="updateProfileButton c-w d-f a-i-c j-c-c fs-24px">Сохранить</button>
          <div v-if="successMessage" class="d-f j-c-c success-message fs-28px">{{ successMessage }}</div>
          <div v-if="errorMessage" class="d-f j-c-c error-message fs-28px">{{ errorMessage }}</div>
        </div>
      </div>

    </div>
  </section>
  </body>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      allRequests: [],
      successMessage: '',
      errorMessage: ''
    };
  },
  mounted() {
    this.loadRequests();
  },
  methods: {
    loadRequests() {
      const token = localStorage.getItem('token');

      axios.get('http://localhost/api/requests', {
        headers: {
          Authorization: `Bearer ${token}`
        }
      })
          .then(response => {
            this.allRequests = response.data;
          })
          .catch(error => {
            console.error('Ошибка при загрузке заявок:', error);
            this.errorMessage = 'Ошибка при загрузке заявок';
          });
    },
    updateStatus(updatedRequest) {
      const token = localStorage.getItem('token');

      axios.patch(`http://localhost/api/requests/${updatedRequest.id}`, {
        status: updatedRequest.status
      }, {
        headers: {
          Authorization: `Bearer ${token}`
        }
      })
          .then(() => {
            this.successMessage = 'Статус заявки обновлен';
            this.errorMessage = '';
          })
          .catch(error => {
            console.error('Ошибка при обновлении статуса заявки:', error);
            this.errorMessage = 'Ошибка при обновлении статуса заявки';
            this.successMessage = '';
          });
    }
  }
};
</script>
