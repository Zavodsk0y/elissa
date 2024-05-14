<template>

    <body>
    <section class="servicesInfo d-f j-c-c">
        <div class="wrapper">
            <h3 class="fs-48px d-f f-d-c a-i-c">Услуги</h3>
          <div v-show="currentPage === 1" class="services1">
            <div class="grid_services">
                <div>
                    <figure class="serviceInfo">
                        <img src="../assets/img/service-image-1.png" alt="Нет" loading="lazy">
                        <figcaption class="d-f t-a-c j-c-c fs-24px">Профилактическое <br> обслуживание</figcaption>
                        <h4 class="d-f t-a-c j-c-c fs-17px fw-400">Лучший способ свести к минимуму <br> поломки — это проведение планового технического обслуживания</h4>
                    </figure>

                    <figure class="serviceInfo">
                        <img src="../assets/img/service-image-2.png" alt="Нет" loading="lazy">
                        <figcaption class="d-f j-c-c fs-24px">Ремонт  трансмиссии</figcaption>
                        <h4 class="d-f t-a-c j-c-c fs-17px fw-400">Трансмиссия - это неотъемлемая составляющая вашего автомобиля</h4>
                    </figure>

                </div>
                <div>

                    <figure class="serviceInfo">
                        <img src="../assets/img/service-image-3.png" alt="Нет" loading="lazy">
                        <figcaption class="d-f j-c-c t-a-c fs-24px">Обслуживание и <br> ремонт двигателя</figcaption>
                        <h4 class="d-f t-a-c j-c-c fs-17px fw-400">Двигатель - сердце вашего автомобиля</h4>
                    </figure>

                    <figure class="serviceInfo">
                        <img src="../assets/img/service-image-4.png" alt="Нет" loading="lazy">
                        <figcaption class="d-f j-c-c t-a-c fs-24px">Обслуживание и <br>  ремонт тормозов</figcaption>
                        <h4 class="d-f t-a-c j-c-c fs-17px fw-400">Со временем тормозные диски изнашиваются, их обязательно нужно обслуживать</h4>
                    </figure>
                </div>
            </div>
            <div class="d-f j-c-c">
              <h3 :class="{ 'activePage': currentPage === 1 }" class="pageButton1" @click="currentPage = 1">1</h3>
              <h3 :class="{ 'activePage': currentPage === 2 }" class="ml-2 pageButton2" @click="currentPage = 2">2</h3>
            </div>
          </div>

          <div v-show="currentPage === 2" class="services2">
            <div class="grid_services">
              <div>
                <figure class="serviceInfo">
                  <img src="../assets/img/service-image-5.png" alt="Нет" loading="lazy">
                  <figcaption class="d-f t-a-c j-c-c fs-24px">Обслуживание <br> электроники</figcaption>
                  <h4 class="d-f t-a-c j-c-c fs-17px fw-400">Заменить аккумулятор или лампы осветительных приборов? Легко!</h4>
                </figure>

                <figure class="serviceInfo">
                  <img src="../assets/img/service-image-6.png" alt="Нет" loading="lazy">
                  <figcaption class="d-f j-c-c fs-24px">Услуги детейлинга</figcaption>
                  <h4 class="d-f t-a-c j-c-c fs-17px fw-400">Производим полировку кузова, оклеиваем кузов защитной пленкой</h4>
                </figure>

              </div>
              <div>

                <figure class="serviceInfo">
                  <img src="../assets/img/service-image-7.png" alt="Нет" loading="lazy">
                  <figcaption class="d-f j-c-c t-a-c fs-24px">Обслуживание <br> системы зажигания</figcaption>
                  <h4 class="d-f t-a-c j-c-c fs-17px fw-400">Заменим Вам высоковольтные провода и свечи зажигания</h4>
                </figure>

                <figure class="serviceInfo">
                  <img src="../assets/img/service-image-8.png" alt="Нет" loading="lazy">
                  <figcaption class="d-f j-c-c t-a-c fs-24px">Обслуживание<br> топливной системы</figcaption>
                  <h4 class="d-f t-a-c j-c-c fs-17px fw-400">Промоем систему и заменим топливные фильтры</h4>
                </figure>
              </div>
            </div>
            <div class="d-f j-c-c">
              <h3 :class="{ 'activePage': currentPage === 1 }" class="pageButton1" @click="currentPage = 1">1</h3>
              <h3 :class="{ 'activePage': currentPage === 2 }" class="ml-2 pageButton2" @click="currentPage = 2">2</h3>
            </div>
          </div>


        </div>
    </section>

    <section class="goOnRecord">
        <div class="wrapper d-f j-c-c f-d-c">
            <br><br>
            <h3 class="d-f j-c-c fs-24px fw-400 c-w">Не нашли то, что искали? Оставьте заявку, мы обязательно поможем Вам</h3>
            <h3 class="d-f j-c-c fs-17px fw-400 c-w">Мы являемся специалистами в сфере ремонта автомобилей уже более 6 лет</h3><br><br><br>
            <button @click="showModal = true" type="submit" class="openRecordButton d-f t-a-c a-i-c j-c-c fs-24px fw-400 c-w mt-5">Записаться на приём</button>
        </div>
    </section>

    <section class="modalWindowRecord d-f j-c-c a-i-c" v-if="showModal">
      <div class="modalWindow" @click.stop>
        <h2 class="fs-32px c-w d-f j-c-c pt-2">Хотите оставить заявку? Эта форма - для Вас!</h2>
        <div class="mt_3">
          <div class="sendRequestForm">
            <h3 class="fs-24px">Форма для записи</h3>
            <label for="surname_name" class="fs-17px">Имя, фамилия</label><br><br>
            <input id="surname_name" class="fs-17px" type="text" placeholder="Иванов Иван" required><br><br><br>

            <label for="chooseService" class="fs-17px">Услуга</label><br><br>
            <select id="chooseService" class="fs-17px" required>
              <option value="">Профилактическое обслуживание</option>
              <option value="">Ремонт трансмиссии</option>
              <option value="">Обслуживание и ремонт двигателя</option>
              <option value="">Обслуживание и ремонт тормозов</option>
              <option value="">Обслуживание электронники</option>
              <option value="">Обслуживание системы зажигания</option>
              <option value="">Услуги детейлинга</option>
              <option value="">Обслуживание топливной системы</option>
            </select><br><br><br>

            <label for="putPhoneNumber" class="fs-17px">Номер телефона</label><br><br>
            <input id="putPhoneNumber" class="fs-17px" type="tel" placeholder="+7-952-986-65-00"><br><br><br>

            <label for="putCouponNumber" class="fs-17px">Номер дружественного купона</label><br><br>
            <input id="putCouponNumber" class="fs-17px" type="number" placeholder="9481927583910"><br><br><br>

            <label for="putAdditionally" class="fs-17px">Дополнительно</label><br><br>
            <input id="putAdditionally" class="fs-17px" type="text"><br><br><br>
            <button type="submit" class="sendFormButton d-f j-c-c a-i-c fs-24px">Отправить</button>
            <button @click="showModal = false" class="closeModalButton">X</button>
          </div>

        </div>
      </div>
    </section>
    </body>
</template>

<style scoped>
.activePage {
  color: #FFC513;
}

.pageButton1:hover, .pageButton2:hover {
  cursor: pointer;
  transition: .5s;
  color: #FFC513;
}

.modalWindowRecord {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
}

.modalWindow {
  position: relative;
  background-image: url("../assets/img/background-form.png");
  padding: 20px;
  border-radius: 10px;
}

.closeModalButton {
  position: absolute;
  top: 10px;
  right: 10px;
  background: none;
  border: none;
  font-size: 36px;
  cursor: pointer;
  color: #FFF;
}
</style>

<script>
export default {
  data() {
    return {
      currentPage: 1,
      showModal: false
    };
  }
};
</script>
