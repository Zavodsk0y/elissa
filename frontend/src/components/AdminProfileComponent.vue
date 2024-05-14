<template>
  <body>
  <section class="profile">
    <div class="wrapper pt-pb-2">
      <form class="profileForm">
        <h2 class="fs-32px t-a-c">Профиль администратора</h2>
        <h3 class="fs-24px fw-400">Ваши данные</h3>
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

            <button type="submit" class="updateProfileButton d-f a-i-c j-c-c fs-24px">Сохранить</button>
          </div>
        </div><br><br><br>
        <router-link class="fs-24px" to="/users_requests">Заявки пользователей</router-link><br><br><br><br>
        <router-link class="fs-24px" to="/workers">Все сотрудники</router-link>
      </form>
    </div>
  </section>
  </body>

</template>
<script setup>
</script>