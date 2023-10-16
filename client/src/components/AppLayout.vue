<script setup>
import { RouterLink, RouterView } from 'vue-router'
const isAuthenticated = () => {
  // Здесь вы можете реализовать логику проверки наличия токена аутентификации.
  // Верните true, если токен существует, и false в противном случае.
  const token = localStorage.getItem('token');
  return token; // Примерная проверка наличия токена в localStorage
};

const isAuth = isAuthenticated()
</script>

<template>
  <div class="container">
    <header v-if="isAuth">
      <img alt="Vue logo" class="logo" src="@/assets/logo.svg" width="125" height="125" />

      <div class="wrapper">
        <!-- <HelloWorld msg="You did it!" /> -->

        <nav>
          <RouterLink to="/">Home</RouterLink>
          <RouterLink to="/about">About</RouterLink>
        </nav>
      </div>
    </header>

    <div v-else>
      <RouterView />
    </div>

    <footer v-if="isAuth">
      <!-- Ваш код для футера, отображаемый только при наличии токена -->
    </footer>
  </div>
</template>

<style scoped>

.container {
  /* padding: 50px 0; */
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
}

@media (max-width: 1024px) {

}
</style>
