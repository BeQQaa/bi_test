<script setup>

const isAuthenticated = () => {
  // Здесь вы можете реализовать логику проверки наличия токена аутентификации.
  // Верните true, если токен существует, и false в противном случае.
  const token = localStorage.getItem('token');
  // const token = "xfgdgfdfnj/gd//jfdosidjgidfhoisdjfakdfkghksjfohj";

  return token; // Примерная проверка наличия токена в localStorage
};

const isAuth = isAuthenticated()
</script>

<template>
  <div :class="{'container-authenticated': isAuth, 'container-unauthenticated': !isAuth}">
      <RouterView />
  </div>
</template>

<style scoped>

.container-unauthenticated {
  /* padding: 50px 0; */
  width: 100%;
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
}


.container-authenticated {
  /* padding: 50px 0; */
  width: 100%;
  min-height: 100vh;
  display: flex;
  flex-direction: column;
  align-items: center;
  /* justify-content: ce  nter; */
}

@media (max-width: 1024px) {

}
</style>
