<template>
  <div>
    <section class="servicesInfo d-f j-c-c">
      <div class="wrapper">
        <h3 class="fs-48px d-f f-d-c a-i-c">Услуги</h3>
        <div v-if="services && services.length > 0" class="services">
          <div class="grid_services">
            <div v-for="service in services" :key="service.id" class="serviceContainer">
              <figure class="serviceInfo">
                <img :src="service.url" class="serviceImage" alt="Нет" loading="lazy">
                <figcaption class="serviceDetails">
                  <h3 class="serviceHeader fs-24px">{{ service.header }}</h3>
                  <p class="serviceDescription fs-17px fw-400">{{ service.description }}</p>
                  <p class="servicePrice fs-17px fw-400">{{ service.price }} ₽</p>
                </figcaption>
              </figure>
            </div>
          </div>
        </div>
        <div class="d-f j-c-c mt-4">
          <button v-for="page in totalPages" :key="page" @click="fetchServices(page)"
                  :class="{ 'activePage': currentPage === page }" class="pageButton fs-28px">{{ page }}
          </button>
        </div>
      </div>
    </section>

    <section class="sendForm mt-3">
      <div class="wrapper mt-1">
        <h2 v-if="this.$store.getters.isAuthenticated" class="fs-32px c-w d-f j-c-c pt-2">Хотите оставить заявку? Эта форма - для Вас!</h2>
        <div v-if="this.$store.getters.isAuthenticated" class="mt_3">
          <form class="sendRequestForm" @submit.prevent="sendRequest">
            <h3 class="fs-24px">Форма для записи</h3>

            <label for="chooseService" class="fs-17px">Услуга</label><br><br>
            <select id="chooseService" v-model="request.service_id" class="fs-17px" required>
              <option v-for="service in services" :key="service.id" :value="service.id">{{ service.header }}</option>
            </select><br><br><br>

            <label for="putPhoneNumber" class="fs-17px">Номер телефона</label><br><br>
            <input id="putPhoneNumber" v-model="request.phone" class="fs-17px" type="tel" placeholder="+79529866500" required><br><br><br>

            <label for="putCouponNumber" class="fs-17px">Номер дружественного купона</label><br><br>
            <input id="putCouponNumber" v-model="request.referral_code" class="fs-17px" type="text" placeholder="HTSYdM7HlIiTTaFdyAIk"><br><br><br>

            <button type="submit" class="sendFormButton d-f j-c-c a-i-c fs-24px">Отправить</button><br>
            <p v-if="successMessage" class="d-f j-c-c success-message fs-28px">{{ successMessage }}</p>
            <p v-if="errorMessage" class="d-f j-c-c error-message fs-28px">{{ errorMessage }}</p>
          </form>
        </div>
        <h2 v-if="!this.$store.getters.isAuthenticated" class="fs-48px c-w d-f j-c-c t-a-c pt-25">Для того, чтобы оставить заявку, <br> вам необходимо авторизоваться</h2>
      </div>
    </section>
  </div>
</template>

<script>
import axios from 'axios';
const apiUrl = process.env.VUE_APP_API_BASE_URL;

export default {
  data() {
    return {
      services: [],
      currentPage: 1,
      totalPages: 0,
      request: {
        service_id: null,
        phone: '',
        referral_code: ''
      },
      successMessage: '',
      errorMessage: ''
    };
  },
  mounted() {
    this.fetchServices(this.currentPage);
  },
  methods: {
    fetchServices(page) {
      const token = localStorage.getItem('token');

      axios.get(`${apiUrl}/services?page=${page}&limit=6`, {
        headers: {
          Authorization: `Bearer ${token}`
        }
      })
          .then(response => {
            this.services = response.data.data || [];
            this.totalPages = response.data.last_page || 0;
            this.currentPage = response.data.current_page || 1;
          })
          .catch(error => {
            console.error('Ошибка при загрузке услуг:', error);
          });
    },
    sendRequest() {
      const token = localStorage.getItem('token');

      axios.post(`${apiUrl}/requests`, this.request, {
        headers: {
          Authorization: `Bearer ${token}`
        }
      })
          .then(() => {
            this.successMessage = 'Заявка отправлена';
          })
          .catch(error => {
            console.error('Error sending request:', error.response || error);
            this.errorMessage = 'Ошибка отправки заявки';
          });
    }
  }
};
</script>

<style scoped>
.serviceContainer {
  margin-bottom: 20px;
}
.serviceDetails {
  padding: 10px;
}

.serviceHeader, .serviceDescription, .servicePrice {
  margin: 10px 0;
}

.activePage {
  color: #FFC513;
}

.pageButton {
  margin: 0 5px;
  border: none;
  background: none;
  cursor: pointer;
  transition: .5s;
}

.pageButton:hover {
  color: #FFC513;
}
</style>
