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
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      services: [],
      currentPage: 1,
      totalPages: 0,
    };
  },
  mounted() {
    this.fetchServices(this.currentPage);
  },
  methods: {
    fetchServices(page) {
      const token = localStorage.getItem('token');

      axios.get(`http://localhost/api/services?page=${page}&limit=6`, {
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
