<script setup>
import rightArrowImg from "../assets/rightArrow.svg"
import leftArrowImg from "../assets/leftArrow.svg"
import UserInfo from './UserInfo.vue';


</script>

<template>
    <div class="usersContainer">
        <div class="usersHeader">Users</div>
        <div class="usersBlock">
            <div class="usersInfo">
                <UserInfo />
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
    margin-top: 70px;
    display: flex;
    gap: 100px;
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
