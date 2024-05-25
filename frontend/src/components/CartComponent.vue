<template>
  <section class="cart">
    <div class="wrapper">
      <h3 class="fs-48px d-f j-c-c">Корзина</h3>
      <div v-if="cartItems.length > 0">
        <div v-for="item in cartItems" :key="item.id" class="cart-item">
          <img :src="item.url" alt="Изображение товара" class="cart-item-image">
          <div class="cart-item-details">
            <h3 class="fs-24px">{{ item.header }}</h3>
            <h3 class="fw-400">Количество: {{ item.quantity }}</h3>
            <h3 class="fw-400">Цена за единицу: {{ item.price }} ₽</h3>
            <h3 class="fw-400">Суммарная стоимость: {{ item.totalPrice }} ₽</h3>
            <button @click="removeItem(item.part_id)" class="remove-item-button fs-28px">Удалить из корзины</button>
          </div>
        </div>
        <h3 class="fs-32px fw-400">Общая сумма: {{ totalCartPrice }} ₽</h3>
        <button class="makeOrderButton fs-32px d-f a-i-c c-w">Оформить заказ</button><br><br>
      </div>
      <div v-else>
        <h3 class="fs-32px d-f j-c-c">Корзина пустая</h3>
      </div>
    </div>
  </section>
</template>

<script>
import { mapGetters, mapActions } from 'vuex';

export default {
  computed: {
    ...mapGetters(['cartItems', 'totalCartPrice']),
  },
  methods: {
    ...mapActions(['fetchCart', 'removeFromCart']),
    removeItem(part_id) {
      this.removeFromCart(part_id).then(() => {
        this.fetchCart();
      });
    }
  },
  mounted() {
    this.fetchCart();
  }
};
</script>

<style scoped>
.cart-item {
  display: flex;
  margin-bottom: 20px;
}

.cart-item-image {
  width: 100px;
  height: 100px;
  object-fit: cover;
  margin-right: 20px;
}

.cart-item-details {
  flex: 1;
}

.remove-item-button {
  background-color: #FF4136;
  color: white;
  border: none;
  padding: 5px 10px;
  cursor: pointer;
  margin-top: 10px;
}

.remove-item-button:hover {
  background-color: #e3342f;
}
</style>
