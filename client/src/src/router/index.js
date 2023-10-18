import { createRouter, createWebHistory } from 'vue-router'
import { ref } from 'vue'
import { useStore } from 'vuex' // Импортируйте useStore из Vuex


import HomeView from '../views/HomeView.vue'
import LoginView from '../views/LoginView.vue'
import RegisterView from '../views/RegisterView.vue'
import CompaniesView from '../views/CompaniesView.vue'
import CompanyView from '../views/CompanyView.vue'
import AppLayout from '../components/AppLayout.vue'


const isAuthenticated = () => {
  const token = localStorage.getItem('token');
  return token;
};

const isAuth = ref(isAuthenticated());


console.log("isAuth", isAuth.value)

const routes = [
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
      },
      {
        path: '/company',
        name: 'company',
        component: CompanyView
      },
      {
        path: '/login',
        name: 'login',
        component: LoginView
      },
      {
        path: '/register',
        name: 'register',
        component: RegisterView
      },
      {
        path: '/companies',
        name: 'companies',
        component: CompaniesView
      }
    ]
  }
];

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes
});



router.beforeEach((to, from, next) => {
  const store = useStore() // Получаем доступ к хранилищу Vuex
  if (store.state.isAuth) {
    // Если пользователь авторизован, перенаправляем на защищенные маршруты
    if (to.name === 'login' || to.name === 'register') {
      next({ name: 'home' });
    } else {
      next();
    }
  } else {
    // Если пользователь не авторизован, перенаправляем на страницу входа
    if (to.name !== 'login' && to.name !== 'register') {
      next({ name: 'login' });
    } else {
      next();
    }
  }
});

export default router;

