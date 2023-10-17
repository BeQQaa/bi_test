import { createRouter, createWebHistory } from 'vue-router'
import { ref } from 'vue'

import HomeView from '../views/HomeView.vue'
import LoginView from '../views/LoginView.vue'
import RegisterView from '../views/RegisterView.vue'
import CompaniesView from '../views/CompaniesView.vue'
import AppLayout from '../components/AppLayout.vue'


const isAuthenticated = () => {
    // const token = "xfgdgfdfnj/gd//jfdosidjgidfhoisdjfakdfkghksjfohj";
  const token = localStorage.getItem('token');
  return token;
};

const isAuth = ref(isAuthenticated());


console.log("isAuth", isAuth.value)

const routes = isAuth.value
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
            path: '/companies',
            name: 'companies',
            component: CompaniesView
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

