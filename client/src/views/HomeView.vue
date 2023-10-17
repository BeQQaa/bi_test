<script setup>
import HeaderMenu from "../components/HeaderMenu.vue"
import FooterMenu from "../components/FooterMenu.vue"
import UsersTab from "../components/UsersTab.vue";
</script>

<template>
  <HeaderMenu />
  <div class="userTab">
      <UsersTab />
  </div>
  <FooterMenu />
</template>

<style scoped>
.userTab {
  width: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
}
</style>
