<script setup>
import loginImg from "../assets/login.svg"
import logOut from "../assets/logOut.svg"
import { log_out } from "../api/user";
import { useStore } from 'vuex'
import { useRouter, RouterLink } from 'vue-router';

const router = useRouter();
const store = useStore()

const logoutHandler = async () => {
    try {
        await log_out();
        localStorage.removeItem("token")
        router.push('/');
        store.commit('setAuth', false)
        window.location.reload()
        // После успешного выхода обработайте перенаправление на страницу входа или домашнюю страницу
    } catch (error) {
        console.error("Logout error ", error);
        // В случае ошибки обработайте ее или выведите сообщение об ошибке пользователю
    }
};

</script>

<template>
    <div class="headerContainer">
        <div class="headerBlock">
            <!-- <div>Main</div> -->
            <RouterLink  class="routerLink" to="/companies">
                <div class="cursor">Companies</div>  
            </RouterLink> 
            <RouterLink  class="routerLink" to="/">
                <div class="cursor">Users</div>  
            </RouterLink> 
        </div>
        <div class="headerBlock">
            <div>username</div>
            <div class="headerImg">
                <img :src="loginImg" alt="My Image" />
            </div>
            <div class="headerLogOut cursor" @click="logoutHandler">Log out</div>
            <div  @click="logoutHandler" class="headerImg">
                <img :src="logOut" alt="My Image" />
            </div>
        </div>
    </div>
</template>

<style scoped>
.headerContainer {
    display: flex;
    padding: 0 50px;
    justify-content: space-between;
    align-items: center;
    background: #474747;
    height: 100px;
    width: 100%;
    color: #FFF;
    font-size: 20px;
}

.headerBlock {
    display: flex;
    gap: 20px;
    align-items: center;
}

.headerImg {
    width: 35px;
    height: 35px;
}

img {
    width: 100%;
    height: 100%;
}

.cursor {
    cursor: pointer;
}

.headerLogOut {
    margin-left: 20px;
}

.routerLink {
    text-decoration: none;
    color: #FFF;
}

</style>