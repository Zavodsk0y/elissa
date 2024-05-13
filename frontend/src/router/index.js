import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../components/HomeView.vue'
import AboutView from "@/components/AboutView.vue";
import RegistrationView from "@/components/RegistrationView.vue"
import LoginView from "@/components/LoginView.vue";
import ResetPasswordView from "@/components/ResetPasswordView.vue";
import ServiceView from "@/components/ServiceView.vue";
import NewsView from "@/components/NewsView.vue";

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  {
    path: '/about',
    name: 'about',
    component: AboutView
  },
  {
    path: '/registration',
    name: 'registration',
    component: RegistrationView
  },
  {
    path: '/login',
    name: 'login',
    component: LoginView
  },
  {
    path: '/reset_password',
    name: 'reset_password',
    component: ResetPasswordView
  },
  {
    path: '/services',
    name: 'services',
    component: ServiceView
  },
  {
    path: '/news',
    name: 'news',
    component: NewsView
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
