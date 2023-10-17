<script setup>
import MyButton from './UI/MyButton.vue';

</script>

<template>
    <div class="userContainer">
        <div class="userInfo">
            <div>First Name:</div>
            <div>Last Name:</div>
            <div>Email:</div>
            <div>Phone number:</div>
            <div>Company:</div>
        </div>
        <div class="userButtons">
            <MyButton>Edit</MyButton>
            <MyButton>Delete</MyButton>
            <MyButton>Update</MyButton>
        </div>
    </div>
</template>

<style scoped>
.userContainer {
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: space-between;
    padding: 20;
    gap: 20px;
}

.userInfo {
    display: flex;
    flex-direction: column;
    gap: 20px;
    padding: 50px;
}

.userButtons {
    display: flex;
    height: 100%;
    padding: 50px;
    flex-direction: column;
    gap: 20px;
    align-items: center;
    justify-content: center;
}
</style>