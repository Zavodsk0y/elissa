<template>
  <body>
    <section class="userRequests">
        <div class="wrapper pt-pb-2">
          <h2 class="fs-48px t-a-c c-w">Ваши заявки</h2>
          <div class="grid_userRequest d-f f-d-r j-c-s-b">
                <div class="request c-w" v-for="request in userRequests" :key="request.requestId">
                    <h3 class="fs-28px">Номер заказа:</h3>
                    <h3 class="fs-24px fw-400">{{ request.requestId }} </h3>
                    <h3 class="fs-28px">Услуга</h3>
                    <h3 class="fs-24px fw-400">{{ request.chooseService }} </h3>
                    <h3 class="fs-28px">Стоимость:</h3>
                    <h3 class="fs-24px fw-400">{{ request.cost }} ₽ </h3>
                    <h3 class="fs-28px">Статус:</h3>
                    <h3 class="fs-24px fw-400">{{ request.status }} </h3>
                </div>
            </div>
        </div>
    </section>
  </body>
</template>
<script>
export default {
    data() {
        return {
            currentUser: JSON.parse(localStorage.getItem('currentUser')),
            userRequests: []
        };
    },
    mounted() {
        const allRequests = JSON.parse(localStorage.getItem('requests'));
        this.userRequests = allRequests.filter(request => request.userName === this.currentUser.login);
    }
}
</script>