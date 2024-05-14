<template>
  <body>
  <section class="admin">
    <div class="wrapper pt-pb-2">
      <form class="addWorkerForm">
        <h3 class="fs-32px t-a-c">Работа с сотрудниками</h3>
        <h3 class="fs-24px fw-400">Добавить сотрудника</h3>
        <div class="d-f f-d-r">
          <div class="profilePart1">
            <label for="putSurname" class="fs-17px fw-700">Фамилия</label><br><br>
            <input id="putSurname" class="fs-17px" type="text" placeholder="Admin" required><br><br><br>

            <label for="putName" class="fs-17px fw-700">Имя</label><br><br>
            <input id="putName" class="fs-17px" type="text" placeholder="Admin" required><br><br><br>

            <label for="putPatronymic" class="fs-17px fw-700">Отчество</label><br><br>
            <input id="putPatronymic" class="fs-17px" type="text" placeholder="Admin"><br><br><br>

            <label for="putLogin" class="fs-17px fw-700">Логин</label><br><br>
            <input id="putLogin" class="fs-17px" type="text" placeholder="admin" required><br><br><br>
          </div>

          <div class="profilePart2">
            <label for="putEmail" class="fs-17px fw-700">Адрес электронной почты</label><br><br>
            <input id="putEmail" class="fs-17px" type="email" placeholder="admin@gmail.com" required><br><br><br>

            <label for="putPassword1" class="fs-17px fw-700">Пароль</label><br><br>
            <input id="putPassword1" class="fs-17px" type="password" placeholder="********"><br><br><br>

            <label for="putPassword2" class="fs-17px fw-700">Повторите пароль</label><br><br>
            <input id="putPassword2" class="fs-17px" type="password"><br><br><br><br>

            <button type="submit" class="updateProfileButton d-f a-i-c j-c-c fs-24px">Добавить</button>
          </div>
        </div><br><br><br>

      </form>

      <h2 class="fs-32px t-a-c">Все сотрудники</h2>
      <div class="d-f f-d-r j-c-s-b">
        <div class="worker1">
          <h3 class="fs-28px">Фамилия:</h3>
          <h3 class="fs-24px fw-400">Иванов </h3>
          <h3 class="fs-28px">Имя:</h3>
          <h3 class="fs-24px fw-400">Иван</h3>
          <h3 class="fs-28px">Отчество:</h3>
          <h3 class="fs-24px fw-400">Иванович</h3>
          <h3 class="fs-28px">Логин:</h3>
          <h3 class="fs-24px fw-400">worker1 </h3>
          <h3 class="fs-28px">Адрес электронной почты:</h3>
          <h3 class="fs-24px fw-400">worker1@gmail.com </h3>
          <button type="submit" class="fireWorkerButton d-f a-i-c j-c-c fs-24px">Удалить</button>
        </div>

        <div class="worker2">
          <h3 class="fs-28px">Фамилия:</h3>
          <h3 class="fs-24px fw-400">Петров </h3>
          <h3 class="fs-28px">Имя:</h3>
          <h3 class="fs-24px fw-400">Пётр</h3>
          <h3 class="fs-28px">Отчество:</h3>
          <h3 class="fs-24px fw-400">Петрович</h3>
          <h3 class="fs-28px">Логин:</h3>
          <h3 class="fs-24px fw-400">worker2</h3>
          <h3 class="fs-28px">Адрес электронной почты:</h3>
          <h3 class="fs-24px fw-400">worker2@gmail.com </h3>
          <button type="submit" class="fireWorkerButton d-f a-i-c j-c-c fs-24px">Удалить</button>
        </div>

        <div class="worker3">
          <h3 class="fs-28px">Фамилия:</h3>
          <h3 class="fs-24px fw-400">Сидоров </h3>
          <h3 class="fs-28px">Имя:</h3>
          <h3 class="fs-24px fw-400">Илья</h3>
          <h3 class="fs-28px">Отчество:</h3>
          <h3 class="fs-24px fw-400">Иванович</h3>
          <h3 class="fs-28px">Логин:</h3>
          <h3 class="fs-24px fw-400">worker3</h3>
          <h3 class="fs-28px">Адрес электронной почты:</h3>
          <h3 class="fs-24px fw-400">worker3@gmail.com </h3>
          <button type="submit" class="fireWorkerButton d-f a-i-c j-c-c fs-24px">Удалить</button>
        </div>

      </div>
    </div>
  </section>
  </body>

</template>
<script setup>
</script>