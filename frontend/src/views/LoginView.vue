<template>
    <body>
    <section class="login">
        <div class="wrapper mt-1">
            <div class="pt-pb-2 d-f j-c-c">
                <form class="loginForm">
                    <h2 class="fs-28px t-a-c">Авторизация</h2>
                    <h3 class="fs-24px fw-400 t-a-c mt-5">Форма для авторизации</h3>
                    <label for="putLogin" class="fs-24px d-f j-c-c mt-5">Логин</label><br><br>
                    <input id="putLogin" class="fs-17px d-f j-c-c" type="text" placeholder="user" required><br><br><br>

                    <label for="putPassword" class="fs-24px d-f j-c-c mt-5">Пароль</label><br><br>
                    <input id="putPassword" class="fs-17px d-f j-c-c mt-5" type="password" required><br><br><br>

                    <button type="submit" class="fs-24px sendLoginForm d-f j-c-c mt-5">Отправить</button><br><br>
                    <router-link to="/reset_password" class="fs-24px d-f j-c-c mt-5">Забыли пароль?</router-link>
                </form>

            </div>
        </div>
    </section>
    </body>
</template>