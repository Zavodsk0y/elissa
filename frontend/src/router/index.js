import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import AboutView from "@/views/AboutView.vue";
import RegistrationView from "@/views/RegistrationView.vue"
import LoginView from "@/views/LoginView.vue";
import ResetPasswordView from "@/views/ResetPasswordView.vue";
import ServiceView from "@/views/ServiceView.vue";

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
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
