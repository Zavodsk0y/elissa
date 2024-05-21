<template>
  <body>
    <section class="admin">
      <div class="wrapper pt-pb-2">
          <form @submit.prevent="addWorker" class="addWorkerForm">
          <h3 class="fs-32px t-a-c">Работа с сотрудниками</h3>
          <h3 class="fs-24px fw-400">Добавить сотрудника</h3>
          <div class="d-f f-d-r">
              <div class="profilePart1">
                  <label for="putSurname" class="fs-17px fw-700">Фамилия</label><br><br>
                  <input v-model="newWorker.surname" id="putSurname" class="fs-17px" type="text" placeholder="worker" required><br><br><br>
                  <label for="putName" class="fs-17px fw-700">Имя</label><br><br>
                  <input v-model="newWorker.name" id="putName" class="fs-17px" type="text" placeholder="worker" required><br><br><br>
                  <label for="putPatronymic" class="fs-17px fw-700">Отчество</label><br><br>
                  <input v-model="newWorker.patronymic" id="putPatronymic" class="fs-17px" type="text" placeholder="worker"><br><br><br>
                  <label for="putLogin" class="fs-17px fw-700">Логин</label><br><br>
                  <input v-model="newWorker.login" id="putLogin" class="fs-17px" type="text" placeholder="worker" required><br><br><br>
              </div>
              <div class="profilePart2">
                  <label for="putEmail" class="fs-17px fw-700">Адрес электронной почты</label><br><br>
                  <input v-model="newWorker.email" id="putEmail" class="fs-17px" type="email" required><br><br><br>
                  <label for="putPassword1" class="fs-17px fw-700">Пароль</label><br><br>
                  <input v-model="newWorker.password" id="putPassword1" class="fs-17px" type="password" placeholder="****"><br><br><br>
                  <label for="putPassword2" class="fs-17px fw-700">Повторите пароль</label><br><br>
                  <input v-model="newWorker.confirmPassword" id="putPassword2" class="fs-17px" type="password"><br><br><br><br>
                  <button type="submit" class="updateProfileButton d-f a-i-c j-c-c fs-24px">Добавить</button>
                  <p v-if="successMessage" class="d-f j-c-c success-message fs-28px">{{ successMessage }}</p>
                  <p v-if="errorMessage" class="d-f j-c-c error-message fs-28px">{{ errorMessage }}</p>
              </div>
          </div><br><br><br>
        </form>

        <h2 class="fs-32px t-a-c">Все сотрудники</h2>
          <div class="grid_workers d-f f-d-r j-c-s-b">
              <div class="worker" v-for="(worker, index) in workers" :key="index">
                  <h3 class="fs-24px">Фамилия:</h3><h3 class="fs-24px fw-400">{{ worker.surname }} </h3>
                  <h3 class="fs-24px">Имя:</h3><h3 class="fs-24px fw-400">{{ worker.name }}</h3>
                  <h3 class="fs-24px">Отчество:</h3><h3 class="fs-24px fw-400">{{ worker.patronymic }}</h3>
                  <h3 class="fs-24px">Логин:</h3><h3 class="fs-24px fw-400">{{ worker.login }} </h3>
                  <h3 class="fs-24px">Адрес электронной почты:</h3><h3 class="fs-24px fw-400"> {{ worker.email }} </h3>
                  <button @click="removeWorker(index)" type="submit" class="fireWorkerButton d-f a-i-c j-c-c fs-24px">Удалить</button>
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
          newWorker: {
              surname: '',
              name: '',
              patronymic: '',
              login: '',
              email: '',
              password: '',
              confirmPassword: '',
          },
          successMessage: '',
          errorMessage: '',
          workers: []
        }
    },
    created() {
        this.loadWorkers();
    },
    methods: {
        addWorker() {
            if (this.newWorker.password !== this.newWorker.confirmPassword) {
                this.errorMessage = 'Пароли не совпадают';
                return;
            }
            else {
                this.successMessage = 'Пользователь добавлен!';
                this.workers.push({ ...this.newWorker });
                this.saveWorkers();
                this.resetForm();
                return;
            }


        },
        loadWorkers() {
            const workers = localStorage.getItem('workers');
            if (workers) {
                this.workers = JSON.parse(workers);
            }
        },
        saveWorkers() {
            localStorage.setItem('workers', JSON.stringify(this.workers));
        },
        resetForm() {
            this.newWorker = {
                surname: '',
                name: '',
                patronymic: '',
                login: '',
                email: '',
                password: '',
                confirmPassword: ''
            };
        },
        removeWorker(index) {
            this.workers.splice(index, 1);
            this.saveWorkers();
        }
    }
}
</script>