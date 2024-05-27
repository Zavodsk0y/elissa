<template>
  <section class="orders">
    <div class="wrapper">
      <h3 class="fs-48px d-f j-c-c">Ваши заказы</h3>
      <div v-if="orders.length > 0">
        <div v-for="order in orders" :key="order.id" class="order-item">
          <h3 class="fs-32px">Заказ №{{ order.id }}</h3>
          <p class="fs-24px">Статус: {{ order.status }}</p>
          <p class="fs-24px">Общая сумма: {{ order.totalAmount }} ₽</p>
          <div v-for="item in order.items" :key="item.id" class="order-item-details">
            <h4 class="fs-24px">Товар: {{ item.part_name }}</h4>
            <p class="fs-17px">Количество: {{ item.quantity }}</p>
            <p class="fs-17px">Цена за единицу: {{ item.price_per_unit }} ₽</p>
            <p class="fs-17px">Суммарная стоимость: {{ item.total_price }} ₽</p>
          </div>
        </div>
      </div>
      <div v-else>
        <h3 class="fs-32px d-f j-c-c">У вас пока нет заказов</h3>
      </div>
    </div>
  </section>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      orders: [],
    };
  },
  methods: {
    fetchOrders() {
      const token = localStorage.getItem('token');
      const user_id = localStorage.getItem('user_id');

      axios.get('http://localhost/api/orders', {
        headers: {
          Authorization: `Bearer ${token}`
        },
        params: {
          user_id: user_id
        }
      })
          .then(response => {
            this.orders = response.data.orders;
          })
          .catch(error => {
            console.error('Ошибка при загрузке заказов:', error);
          });
    }
  },
  mounted() {
    this.fetchOrders();
  }
};
</script>

<style scoped>
.order-item {
  border: 1px solid #ccc;
  padding: 10px;
  margin-bottom: 20px;
}

.order-item-details {
  margin-left: 20px;
  margin-top: 10px;
}
</style>
