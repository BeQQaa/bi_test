import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import LoginView from '../views/LoginView.vue'
import RegisterView from '../views/RegisterView.vue'

import AboutView from '../views/AboutView.vue'
import AppLayout from '../components/AppLayout.vue'

const isAuthenticated = () => {
  const token = localStorage.getItem('token');
  return token;
};

const isAuth = isAuthenticated()

console.log("isAuth", isAuth)

const routes = isAuth
  ? [
      {
        path: '/',
        component: AppLayout,
        children: [
          {
            path: '',
            name: 'home',
            component: HomeView
          },
          {
            path: '/about',
            name: 'about',
            component: AboutView
          }
        ]
      }
    ]
  : [
    {
      path: '/',
      component: AppLayout,
      children: [
        {
          path: '',
          name: 'login',
          component: LoginView
        },
        {
          path: '/register',
          name: 'register',
          component: RegisterView
        }
      ]
    }
  ];

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes
});

export default router;

