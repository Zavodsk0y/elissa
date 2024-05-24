<template>
  <body>
    <section class="cart">
      <div class="wrapper"><br>
          <h3 class="fs-48px">Корзина</h3>
            <div v-if="cartItems.length > 0">
              <div v-for="item in cartItems" :key="item.id">
                <h3>{{ item.header }}</h3>
                <p>{{ item.description }}</p>
                <p>{{ item.price }} ₽</p>
              </div>
            </div>
            <div v-else>
              <p>Корзина пуста</p>
            </div>

              <button class="makeOrderButton fs-32px d-f a-i-c j-c-c c-w">Оформить заказ</button><br><br>


            </div>
    </section>
  </body>
</template>
<script>
import { mapGetters } from 'vuex';

export default {
  computed: {
    ...mapGetters(['cartItems'])
  }
};
</script>