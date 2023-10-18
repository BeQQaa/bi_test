<script setup>
import HeaderMenu from "../components/HeaderMenu.vue"
import FooterMenu from "../components/FooterMenu.vue"
import UsersTab from "../components/UsersTab.vue";
import { user_index } from "../api/user";
import { ref, onMounted } from 'vue';

const usersData = ref([]);
const loading = ref(true);

const getUsers = async () => {
  try {
    const { data } = await user_index()
    usersData.value = data;
    loading.value = false;
  } catch (error) {
    console.log("error get users", error)
    loading.value = false;
  }
}

onMounted(getUsers);

</script>

<template>
  <div class="app">
    <HeaderMenu />
    <div class="userTab">
        <UsersTab :usersData="usersData" v-if="!loading" />
        <div v-else class="loading-message">Loading...</div>
    </div>
    <FooterMenu />
  </div>
</template>

<style scoped>
.app {
  display: flex;
  width: 100%;
  flex-direction: column;
  min-height: 100vh;
}

.userTab {
  width: 100%;
  flex: 1;
  display: flex;
  align-items: center;
  justify-content: center;
}

.loading-message {
  height: 65vh; /* Установка высоты на весь экран */
  display: flex;
  align-items: center;
  justify-content: center;
}

/* Стили для HeaderMenu и FooterMenu, чтобы прилипали к верху и низу экрана соответственно */
HeaderMenu {
  position: sticky;
  top: 0;
  z-index: 100;
}

FooterMenu {
  position: sticky;
  bottom: 0;
  z-index: 100;
}

/* .userTab {
  width: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
} */
</style>
