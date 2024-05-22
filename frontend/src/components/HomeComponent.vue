<template>
    <body>
    <section class="aboutCompany">
        <div class="wrapper">
            <div class="d-f f-d-c a-i-c">
                <h2 class="c-w fs-48px">Элисса</h2>
                <h3 class="c-y fs-32px">Профессионалы в сфере обслуживания автомобильного транспорта</h3>
                <h3 class="c-w fs-32px">Более 6 лет качественного обслуживания</h3>
            </div>
        </div>
    </section>

    <section class="ourServices">
        <div class="wrapper">
            <div class="d-f j-c-c">
                <h2 class="fs-32px">Мы предоставляем экспертные услуги</h2>
            </div>
            <div class="d-f j-c-c mt-1">
                <h3 class="fs-17px fw-400">Мы стремимся завоевать ваше доверие и иметь долгосрочные
                    отношения с вами
                </h3>
            </div>
            <div class="d-f f-d-r j-c-c gap_13 mt_3">
                <div class="d-f f-d-c">
                    <div class="d-f a-i-c j-c-c">
                        <img src="../assets/img/sales-icon.png" alt="Нет изображения" loading="lazy"/>
                    </div>
                    <h3 class="fs-17px fw-400">Акции и скидки</h3>
                </div>

                <div class="d-f f-d-c">
                    <div class="d-f a-i-c j-c-c">
                        <img src="../assets/img/advantage-icon.png" alt="Нет изображения" loading="lazy"/>
                    </div>
                    <h3 class="fs-17px fw-400">Наши преимущества</h3>
                </div>

                <div class="d-f f-d-c">
                    <div class="d-f a-i-c j-c-c">
                        <img src="../assets/img/key_icon.png" alt="Нет изображения" loading="lazy"/>
                    </div>
                    <h3 class="fs-17px fw-400">О нас</h3>
                </div>

            </div>
        </div>
    </section>

    <section class="whatWeGive mt_3">
        <div class="wrapper c-w">
            <div class="d-f f-d-r">
                <h3 class="fs-32px">О&nbsp;нашей&nbsp;</h3>
                <h3 class="fs-32px c-y">компании</h3>
            </div>
            <h3 class="whatWeUse mt-1">Мы используем передовое оборудование для обеспечения обслуживания
                наивысшего уровня на всем рынке
            </h3>
            <ul class="d-f f-d-c t-a-l">
                <li>2 года гарантии</li>
                <li>Бесплатная диагностика</li>
                <li>Реферальная программа для клиентов</li>
                <li>Постоянные скидки и акции</li>
                <li>Ежедневная помощь на дороге</li>
                <li>Сертифицированный сервис</li>
            </ul>
            <img class="two_people_image" loading="lazy" alt="Нет" src="../assets/img/two-people-image.png"/>
        </div>
    </section>

    <section class="howWeMakeService mt_3">
        <div class="wrapper">
            <h3 class="fs-32px d-f j-c-c">Как происходит обслуживание</h3>
            <div class="d-f f-d-r j-c-c">
                <figure>
                    <img class loading="lazy" alt="Нет" src="../assets/img/chooseService-icon.png"/>
                    <figcaption class="d-f t-a-c">Выберите услугу, которая вас интересует</figcaption>
                </figure>
                <figure>
                    <img class loading="lazy" alt="Нет" src="../assets/img/sendRequest-icon.png"/>
                    <figcaption class="d-f t-a-c j-c-c">Оставьте заявку</figcaption>
                </figure>
                <figure>
                    <img class loading="lazy" alt="Нет" src="../assets/img/deliveryCar-icon.png"/>
                    <figcaption class="d-f t-a-c">Доставим ваше авто в сервис и займемся ремонтом</figcaption>
                </figure>
                <figure>
                    <img class loading="lazy" alt="Нет" src="../assets/img/getKey-icon.png"/>
                    <figcaption class="d-f t-a-c">Получите ключи от вашего востановленного автомобиля</figcaption>
                </figure>
            </div>
        </div>
    </section>

    <section class="usersReviews">
        <div class="wrapper">

            <div v-if="currentIndex === 0">
              <img class="mt_1" src="../assets/img/review-photo-1.png" alt="Нет">
                <div class="userReviewDescription1">
                  <h3 class="fs-24px">Отзывы наших клиентов</h3>
                  <img src="../assets/img/star-icon.png" alt="Нет">
                  <img src="../assets/img/star-icon.png" alt="Нет">
                  <img src="../assets/img/star-icon.png" alt="Нет">
                  <img src="../assets/img/star-icon.png" alt="Нет">
                  <img src="../assets/img/star-icon.png" alt="Нет">

                  <h3 class="reviewText fw-400">Очень хороший сервис, всегда по возможности обращаюсь туда.
                      Близко к дому, можно заказать запчасти, а также присутствует очень приятная  система скидок.
                      Мастера грамотные, готовы подсказать по любому вопросу. Очень довольна данным СТО.</h3>

                  <h4 class="reviewUserName fs-24px">- Ирина</h4>
                  <img @click="previousReviewPage" src="../assets/img/previous-review-icon.png" class="previousReviewIcon" alt="Нет">
                  <img @click="nextReviewPage" src="../assets/img/next-review-icon.png" class="nextReviewIcon" alt="Нет">
                </div>
            </div>

            <div v-if="currentIndex === 1">
              <img class="mt_1" src="../assets/img/review-photo-2.png" alt="Нет">
              <div class="userReviewDescription2">
                <h3 class="fs-24px">Отзывы наших клиентов</h3>
                <img src="../assets/img/star-icon.png" alt="Нет">
                <img src="../assets/img/star-icon.png" alt="Нет">
                <img src="../assets/img/star-icon.png" alt="Нет">
                <img src="../assets/img/star-icon.png" alt="Нет">
                <img src="../assets/img/star-icon.png" alt="Нет">

                <h3 class="reviewText fw-400">Хочу выразить личную благодарность всему коллективу автосервиса!
                  В моём случае был предложен ремонт с наименьшими финансовыми потерями.
                  Радует, что не настаивают на дополнительных услугах и по делу объясняют. Буду рекомендовать!</h3>

                <h4 class="reviewUserName fs-24px">- Дмитрий</h4>
                <img @click="previousReviewPage" src="../assets/img/previous-review-icon.png" class="previousReviewIcon" alt="Нет">
                <img @click="nextReviewPage" src="../assets/img/next-review-icon.png" class="nextReviewIcon" alt="Нет">
              </div>
            </div>

          <div v-if="currentIndex === 2">
            <img class="mt_1" src="../assets/img/review-photo-3.png" alt="Нет">
            <div class="userReviewDescription3">
              <h3 class="fs-24px">Отзывы наших клиентов</h3>
              <img src="../assets/img/star-icon.png" alt="Нет">
              <img src="../assets/img/star-icon.png" alt="Нет">
              <img src="../assets/img/star-icon.png" alt="Нет">
              <img src="../assets/img/star-icon.png" alt="Нет">
              <img src="../assets/img/star-icon.png" alt="Нет">

              <h3 class="reviewText fw-400">
                Отличная компания. Работают профессионалы, удобное местоположение.
                Великолепный уровень обслуживания автомобилей премиум-класса.
                Хорошие цены, а также отличные скидки.
                Буду советовать всем своим друзьям!</h3>

              <h4 class="reviewUserName fs-24px">- Эдуард</h4>
              <img @click="previousReviewPage" src="../assets/img/previous-review-icon.png" class="previousReviewIcon" alt="Нет">
              <img @click="nextReviewPage" src="../assets/img/next-review-icon.png" class="nextReviewIcon" alt="Нет">
            </div>
        </div>
        </div>
    </section>

    <section class="galleryPhotos">
        <div class="wrapper">
            <h3 class="fs-32px t-a-c">Галерея наших работ</h3>

            <div>
                <div>
                    <img src="../assets/img/gallery-photo-1.png" class="galleryImage" loading="lazy" alt="Нет">
                    <img src="../assets/img/gallery-photo-2.png" class="galleryImage" loading="lazy" alt="Нет">
                    <img src="../assets/img/gallery-photo-3.png" class="galleryImage" loading="lazy" alt="Нет">
                </div>
                <div>
                    <img src="../assets/img/gallery-photo-5.png" loading="lazy" alt="Нет">
                    <img src="../assets/img/gallery-photo-6.png" loading="lazy" alt="Нет">
                    <img src="../assets/img/gallery-photo-7.png" loading="lazy" alt="Нет">
                </div>
            </div>
        </div>
    </section>


    <section class="sendForm mt_3">
        <div class="wrapper mt-1">
            <h2 v-if="this.$store.getters.isAuthenticated" class="fs-32px c-w d-f j-c-c pt-2">Хотите оставить заявку? Эта форма - для Вас!</h2>
            <div v-if="this.$store.getters.isAuthenticated" class="mt_3">
                <form @submit.prevent="sendFormRequest" class="sendRequestForm" method="POST">
                    <h3 class="fs-24px">Форма для записи</h3>
                    <label for="FIO" class="fs-17px">Фамилия, имя, отчество</label><br><br>
                    <input v-model="formData.FIO" id="FIO" class="fs-17px" type="text" placeholder="Иванов Иван Иванович" required><br><br><br>

                    <label for="chooseService" class="fs-17px">Услуга</label><br><br>
                    <select v-model="formData.chooseService" id="chooseService" class="fs-17px" required>
                        <option selected value="Профилактическое обслуживание">Профилактическое обслуживание</option>
                        <option value="Ремонт трансмиссии">Ремонт трансмиссии</option>
                        <option value="Обслуживание и ремонт двигателя">Обслуживание и ремонт двигателя</option>
                        <option value="Обслуживание и ремонт тормозов">Обслуживание и ремонт тормозов</option>
                        <option value="Обслуживание электронники">Обслуживание электронники</option>
                        <option value="Обслуживание системы зажигания">Обслуживание системы зажигания</option>
                        <option value="Услуги детейлинга">Услуги детейлинга</option>
                        <option value="Обслуживание топливной системы">Обслуживание топливной системы</option>
                    </select><br><br><br>

                    <label for="putPhoneNumber" class="fs-17px">Номер телефона</label><br><br>
                    <input v-model="formData.phoneNumber" id="putPhoneNumber" class="fs-17px" type="tel" placeholder="+7-952-986-65-00" required><br><br><br>

                    <label for="putCouponNumber" class="fs-17px">Номер дружественного купона</label><br><br>
                    <input v-model="formData.couponNumber" id="putCouponNumber" class="fs-17px" type="number" placeholder="9481927583910"><br><br><br>

                    <label for="putAdditionally" class="fs-17px">Дополнительно</label><br><br>
                    <input v-model="formData.additionally" id="putAdditionally" class="fs-17px" type="text"><br><br><br>
                    <button type="submit" class="sendFormButton d-f j-c-c a-i-c fs-24px">Отправить</button>
                </form>
            </div>
              <h2 v-if="!this.$store.getters.isAuthenticated" class="fs-48px c-w d-f j-c-c t-a-c pt-25">Для того, чтобы оставить заявку, <br> вам необходимо авторизоваться</h2>
        </div>
    </section>

    </body>
</template>
<script>
export default {
  data() {
    return {
        formData: {
            FIO: '',
            chooseService: '',
            phoneNumber: '',
            couponNumber: '',
            additionally: '',
        },
      currentUser: JSON.parse(localStorage.getItem('currentUser')),
      currentIndex: 0,
    };
  },
    mounted() {
      this.formData.chooseService = 'Профилактическое обслуживание'
    },
    methods: {
    nextReviewPage() {
      this.currentIndex = (this.currentIndex + 1) % 3;
    },
    previousReviewPage() {
      this.currentIndex = (this.currentIndex - 1 + 3) % 3;
    },
    sendFormRequest() {
        const existingRequests = JSON.parse(localStorage.getItem('requests')) || [];
        const requestId = existingRequests.length + 1
        const randomCost = Math.floor(Math.random() * 9 + 2) * 500;
        const userRequest = {
            requestId: requestId.toString().padStart(7, '0'),
            userName: this.currentUser.login,
            ...this.formData,
            cost: randomCost,
            status: 'Создана'
        }
        existingRequests.push(userRequest);
        localStorage.setItem('requests', JSON.stringify(existingRequests));

        this.formData = {
            FIO: '',
            chooseService: '',
            phoneNumber: '',
            couponNumber: '',
            additionally: ''
        }
    }
  }
};
</script>