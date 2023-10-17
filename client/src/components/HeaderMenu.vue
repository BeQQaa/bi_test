<script setup>
import loginImg from "../assets/login.svg"
import logOut from "../assets/logOut.svg"

import { RouterLink } from 'vue-router';

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
            <div class="headerLogOut cursor">Log out</div>
            <div class="headerImg">
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