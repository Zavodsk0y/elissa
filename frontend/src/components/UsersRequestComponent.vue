<template>
  <body>
  <section class="userRequests">
    <div class="wrapper pt-pb-2">
      <h2 class="fs-48px t-a-c c-w">Все заявки</h2>
            <div class="grid_userRequest d-f f-d-r j-c-s-b c-w">
                <div class="request"  v-for="request in allRequests" :key="request.requestId">
                  <h3 class="fs-28px">Номер заказа:</h3>
                  <h3 class="fs-24px fw-400">{{ request.requestId }} </h3>
                  <h3 class="fs-28px">Услуга</h3>
                  <h3 class="fs-24px fw-400">{{ request.chooseService }} </h3>
                  <h3 class="fs-28px">Стоимость:</h3>
                  <h3 class="fs-24px fw-400">{{ request.cost }} ₽</h3>
                  <h3 class="fs-28px">Оформил заказ:</h3>
                  <h3 class="fs-24px fw-400">{{ request.userName }} </h3>
                  <h3 class="fs-28px">Номер телефона:</h3>
                  <h3 class="fs-24px fw-400">{{ request.phoneNumber }} </h3>
                  <h3 class="fs-28px">Статус:</h3>
                  <select class="fs-24px c-w" v-model="request.status">
                    <option value="Создана">Создана</option>
                    <option value="В работе">В работе</option>
                    <option value="Завершена">Завершена</option>
                  </select><br><br>
                  <button type="submit" @click="updateStatus(request)" class="updateProfileButton c-w d-f a-i-c j-c-c fs-24px">Сохранить</button>
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
            allRequests: []
        };
    },
    mounted() {
        this.loadRequests();
    },
    methods: {
        loadRequests() {
            this.allRequests = JSON.parse(localStorage.getItem('requests'));
        },
        updateStatus(updatedRequest) {
            const requests = JSON.parse(localStorage.getItem('requests'));
            const requestIndex = requests.findIndex(request => request.requestId === updatedRequest.requestId);
            if (requestIndex !== -1) {
                requests[requestIndex].status = updatedRequest.status;
                localStorage.setItem('requests', JSON.stringify(requests));
            }
        }
    }
}
</script>