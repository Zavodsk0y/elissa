import { createRouter, createWebHistory } from 'vue-router'
import HomeComponent from "../components/HomeComponent.vue"
import AboutComponent from "../components/guest/AboutComponent.vue";
import RegistrationComponent from "../components/guest/RegistrationComponent.vue";
import LoginComponent from "../components/guest/LoginComponent.vue";
import ResetPasswordComponent from "../components/guest/ResetPasswordComponent.vue";
import ServiceComponent from "../components/guest/ServiceComponent.vue";
import NewsComponent from "../components/guest/NewsComponent.vue";
import ProfileComponent from "../components/user/ProfileComponent.vue";
import CartComponent from "../components/user/CartComponent.vue";
import RequestsComponent from "../components/employee/RequestsComponent.vue";
import UsersComponent from "../components/admin/UsersComponent.vue";
import EmailVerifiedComponent from "../components/EmailVerifiedComponent.vue";
import store from "../store";
import UserRequestComponent from "../components/user/UserRequestComponent.vue";
import PartsComponent from "../components/guest/PartsComponent.vue";
import CallBackComponent from "../components/guest/CallBackComponent.vue";
import UserOrderComponent from "../components/user/UserOrderComponent.vue";

const ifNotAuthenticated = (to, from, next) => {
  if (!store.getters.isAuthenticated) {
    next();
    return;
  }
  next('/');
};

const ifAuthenticated = (to, from, next) => {
  if (store.getters.isAuthenticated) {
    next();
    return;
  }
  next('/login')
}

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeComponent
  },
  {
    path: '/about',
    name: 'about',
    component: AboutComponent
  },
  {
    path: '/signup',
    name: 'signup',
    component: RegistrationComponent,
    beforeEnter: ifNotAuthenticated,
  },
  {
    path: '/login',
    name: 'login',
    component: LoginComponent,
    beforeEnter: ifNotAuthenticated,
  },
  {
    path: '/reset_password',
    name: 'reset_password',
    component: ResetPasswordComponent,
    beforeEnter: ifNotAuthenticated,
  },
  {
    path: '/services',
    name: 'services',
    component: ServiceComponent
  },
  {
    path: '/news',
    name: 'news',
    component: NewsComponent
  },
  {
    path: '/users/me',
    name: 'profile',
    component: ProfileComponent,
    beforeEnter: ifAuthenticated,
  },
  {
    path: '/cart',
    name: 'cart',
    component: CartComponent,
    beforeEnter: ifAuthenticated,
  },
  {
    path: '/parts',
    name: 'parts',
    component: PartsComponent,
  },
  {
    path: '/requests',
    name: 'requests',
    component: RequestsComponent,
    beforeEnter: ifAuthenticated,
  },
  {
    path: '/users',
    name: 'users',
    component: UsersComponent,
    beforeEnter: ifAuthenticated,
  },
  {
    path: '/email-verified',
    name: 'email-verified',
    component: EmailVerifiedComponent,
    beforeEnter: ifAuthenticated,
  },
  {
    path: '/callback',
    name: 'callback',
    component: CallBackComponent,
  },
  {
    path: '/orders',
    name: 'orders',
    component: UserOrderComponent,
    beforeEnter: ifAuthenticated
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
