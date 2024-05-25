import { createRouter, createWebHistory } from 'vue-router'
import HomeComponent from "@/components/HomeComponent.vue";
import AboutComponent from "@/components/AboutComponent.vue";
import RegistrationComponent from "@/components/RegistrationComponent.vue";
import LoginComponent from "@/components/LoginComponent.vue";
import ResetPasswordComponent from "@/components/ResetPasswordComponent.vue";
import ServiceComponent from "@/components/ServiceComponent.vue";
import NewsComponent from "@/components/NewsComponent.vue";
import ProfileComponent from "@/components/ProfileComponent.vue";
import CartComponent from "@/components/CartComponent.vue";
import RequestsComponent from "@/components/RequestsComponent.vue";
import AdminProfileComponent from "@/components/AdminProfileComponent.vue";
import UsersComponent from "@/components/UsersComponent.vue";
import EmailVerifiedComponent from "../components/EmailVerifiedComponent.vue";
import store from "@/store";
import UserRequestComponent from "@/components/UserRequestComponent.vue";
import PartsComponent from "@/components/PartsComponent.vue";

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
    path: '/admin_profile',
    name: 'admin_profile',
    component: AdminProfileComponent,
    beforeEnter: ifAuthenticated,
  },
  {
    path: '/user_requests',
    name: 'user_requests',
    component: UserRequestComponent,
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
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
