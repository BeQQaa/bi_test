<script setup>

import { useStore } from 'vuex';
import { computed } from 'vue';


const store = useStore();

const isAuth = computed(() => {
  return store.state.isAuth;
});

</script>

<template>
  <div :class="{'container-authenticated': isAuth.value, 'container-unauthenticated': !isAuth.value}">
      <RouterView />
  </div>
</template>

<style scoped>

.container-authenticated {
  width: 100%;
  min-height: 100vh;
  display: flex;
  flex-direction: column;
  align-items: center;
}

.container-unauthenticated {
  width: 100%;
  min-height: 100vh;
  display: flex;
  align-items: center;
  flex-direction: column;

  justify-content: center;
}

@media (max-width: 1024px) {

}
</style>
