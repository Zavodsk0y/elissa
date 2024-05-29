<template>
  <div>
    <section class="partsInfo d-f j-c-c">
      <div class="wrapper">
        <h3 class="fs-48px d-f f-d-c a-i-c">Товары</h3>
        <p v-if="successMessage" class="d-f j-c-c success-message fs-28px">{{ successMessage }}</p>
        <p v-if="errorMessage" class="d-f j-c-c error-message fs-28px">{{ errorMessage }}</p>
        <div v-if="parts && parts.length > 0" class="parts">
          <div class="grid_parts">
            <div v-for="part in parts" :key="part.id" class="serviceContainer">
              <figure class="partInfo">
                <img :src="part.url" class="serviceImage" alt="Нет" loading="lazy">
                <figcaption class="serviceDetails">
                  <h3 class="serviceHeader fs-24px">{{ part.header }}</h3>
                  <p class="serviceDescription fs-17px fw-400">{{ part.description }}</p>
                  <p class="servicePrice fs-17px fw-400">{{ part.price }} ₽</p>
                </figcaption>

                <div class="cartQuantityControls d-f j-c-c">
                  <input type="number" :value="getQuantity(part.id)" @input="updateQuantity($event, part)" class="d-f a-i-c quantityInput fs-24px fw-400">
                  <button @click="addToCartClicked(part)" class="addToCartButton ml-2 fs-24px">
                    Добавить в корзину
                  </button>
                </div>
              </figure>
            </div>
          </div>
        </div>
        <div class="d-f j-c-c mt-4">
          <button v-for="page in totalPages" :key="page" @click="fetchParts(page)"
                  :class="{ 'activePage': currentPage === page }" class="pageButton fs-28px">{{ page }}
          </button>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import axios from 'axios';
import { mapActions } from 'vuex';
const apiUrl = process.env.VUE_APP_API_BASE_URL;

export default {
  data() {
    return {
      parts: [],
      cartItems: {},
      currentPage: 1,
      totalPages: 0,
      successMessage: '',
      errorMessage: ''
    };
  },
  mounted() {
    this.fetchParts(this.currentPage);
  },
  methods: {
    ...mapActions(['addToCart']),
    fetchParts(page) {
      const apiUrl = process.env.API_BASE_URL;
      const token = localStorage.getItem('token');

      axios.get(`${apiUrl}/parts?page=${page}&limit=6`, {
        headers: {
          Authorization: `Bearer ${token}`
        }
      })
          .then(response => {
            this.parts = response.data.data || [];
            this.totalPages = response.data.last_page || 0;
            this.currentPage = response.data.current_page || 1;

            this.parts.forEach(part => {
              if (!this.cartItems[part.id]) {
                this.cartItems = { ...this.cartItems, [part.id]: { quantity: 0 } };
              }
            });
          })
          .catch(error => {
            console.error('Ошибка при загрузке товаров:', error);
          });
    },

    addToCartClicked(part){
      const token = localStorage.getItem('token');
      const apiUrl = process.env.API_BASE_URL;
      const quantity = this.cartItems[part.id]?.quantity;

      if (quantity > 0 && quantity <= 10) {
        axios.post(`${apiUrl}/cart/${part.id}`, {
          partId: part.id,
          quantity: quantity
        }, {
          headers: {
            Authorization: `Bearer ${token}`
          }
        })
            .then(response => {
              this.successMessage = `Товар добавлен в корзину`;
            })
            .catch(error => {
              console.error('Ошибка при добавлении товара в корзину:', error);
              this.errorMessage = 'Ошибка при добавлении товара в корзину';
            });
      }
      else {
        console.warn('Количество товара должно быть от 1 до 10');
      }
    },

    getQuantity(partId) {
      return this.cartItems[partId] ? this.cartItems[partId].quantity : 0;
    },

    updateQuantity(event, part) {
      const value = Number(event.target.value);
      if (!this.cartItems[part.id]) {
        this.cartItems = { ...this.cartItems, [part.id]: { quantity: 0 } };
      }
      if (value < 1) {
        this.cartItems[part.id].quantity = 1;
      }
      else if (value > 10) {
        this.cartItems[part.id].quantity = 10;
      }
      else {
        this.cartItems[part.id].quantity = value;
      }
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

.quantityInput {
  width: 3rem;
  border: none;
  border-bottom: 1px solid black;
  background: none;
  margin-left: 0.5rem;
  padding-left: 15px;
}
</style>
