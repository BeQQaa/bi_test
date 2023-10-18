<script setup>
import rightArrowImg from "../assets/rightArrow.svg"
import leftArrowImg from "../assets/leftArrow.svg"
import UserInfo from './UserInfo.vue';
import { ref, watchEffect } from 'vue';
import { user_delete } from "../api/user"

const deleteUser = async (id, name, last, email, phone) => {
    console.log("Deleting user with id", id, name, last, email, phone);

    const request = {
      id,
      first_name: name,
      last_name: last,
      email: email,
      phone_number: phone ? phone : "",
    }

    try {
        await user_delete(request);
        // Обновление realUsersData после успешного удаления
        console.log("Delete error suc");
        window.location.reload()
        realUsersData.value = realUsersData.value.filter(user => user.id !== id);
    } catch (error) {
        alert("Delete error ", error);
        console.log("Delete error ", error);
    }
}

const props = defineProps(["usersData"]); 
const usersData = ref(props.usersData);

let realUsersData = [];
if (usersData.value && usersData.value.data) {
  realUsersData = usersData.value.data;
}

watchEffect(() => {
  console.log("usersData", realUsersData);
});


</script>

<template>
    <div class="usersContainer">
        <div class="usersHeader">Users</div>
        <div class="usersBlock">
            <div class="usersInfo" v-for="(user, index) in realUsersData" :key="user && user.id ? user.id : index">
                <UserInfo :user="user" :deleteUser="deleteUser" />
            </div>
            <div class="usersArrows">
                <div class="usersArrow">
                    <img :src="leftArrowImg" alt="leftArrowImg" />
                </div>
                <div class="usersArrow">
                    <img :src="rightArrowImg" alt="rightArrowImg" />
                </div>
            </div>            
        </div>

    </div>
</template>

<style scoped>
.usersContainer {
    width: 70%;
    flex-direction: column;
    display: flex;
    align-items: center;
    justify-content: center;
    /* min-height: 1400px; */
}
.usersHeader {
    color: #FFF;
    font-size: 32px;
    padding: 0 100px;
    margin-top: 100px;
    width: 100%;
    background: linear-gradient(270deg, #050505 0%, rgba(71, 71, 71, 0.00) 100%);
    height: 115px;
    display: flex;
    justify-content: flex-end;
    align-items: center;
}

.usersBlock {
    background: #FFF;
    width: 100%;
    min-height: 500px;
    margin-bottom: 100px;
    display: flex;
    flex-direction: column;
    align-items: center;
    
}

.usersInfo {
    min-height: 289px;
    width: 90%;
    background: #FFF;
    box-shadow: 0px -4px 4px 0px rgba(0, 0, 0, 0.25), 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
    margin-top: 30px;
}
.usersArrows {
    margin-top: 40px;
    display: flex;
    gap: 100px;
    margin-bottom: 20px;
}

.usersArrow {
    width: 40px;
    height: 40px;
    cursor: pointer;
}

img {
    width: 100%;
    height: 100%;
}
</style>
