<script setup>
import MyButton from './UI/MyButton.vue';
import { ref, watchEffect } from 'vue';
import MyInput from './UI/MyInput.vue';
import { user_edit } from "../api/user"
import { validateForm } from "../helpers/validations"


const props = defineProps(["user", "deleteUser"]);
const user = ref(props.user);
const deleteUserHandler = () => {
    props.deleteUser(user.value.id, user.value.first_name, user.value.last_name, user.value.email, user.value.phone_number);
};

const firstName = ref(user.value.first_name);
const lastName = ref(user.value.last_name);
const email = ref(user.value.email);
const phoneNumber = ref(user.value.phone_number);
const error = ref(null);

watchEffect(() => {
  console.log("firstName", firstName);
});


const editFetch = async () => {
  error.value = validateForm(firstName.value, lastName.value, "password", email.value, phoneNumber.value)

  if (error.value) {
    return;
  }

  const request = {
      id: user.value.id,
      first_name: firstName.value,
      last_name: lastName.value,
      email: email.value,
      phone_number: phoneNumber.value ? phoneNumber.value : "",
    }

    console.log("response", request)

  try {
    const { data } = await user_edit(request)
    console.log("response", data)
    window.location.reload()
    // window.location.reload();
    // const res = data.token
    // localStorage.setItem("token", res);
    // store.commit('setAuth', true)
    // router.push('/')
  } catch (e) {
    const errorMessage = e.response.data.message;
    error.value = errorMessage;
    console.error("Registration failed", e);
  }
};


</script>

<template>
    <div class="userContainer">
        <div class="userInfo">
              <MyInput 
                v-model="firstName"
                :value="user.first_name"
                type="text"
                manlength="50"
                required
              />
              <MyInput 
                v-model="lastName"
                :value="user.last_name"
                type="text"
                manlength="50"
                required
              />
              <MyInput 
                v-model="email"
                :value="user.email"
                type="text"
                manlength="50"
                required
              />
              <MyInput 
                v-model="phoneNumber"
                :value="user.phoneNumber"
                type="text"
                manlength="50"
                required
              />
            <!-- <div>First Name: {{ user.first_name }}</div> -->
            <!-- <div>Last Name: {{ user.last_name }}</div> -->
            <!-- <div>Email: {{ user.email }} -->
            <!-- <div>Phone number: {{ user.phoneNumber }}</div>  -->
            <div>Company: {{ user.company }}</div>
        </div>
        <div class="userButtons">
            <MyButton @click="deleteUserHandler">Delete</MyButton>
            <MyButton @click="editFetch">Update</MyButton>
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
    gap: 10px;
    padding: 20px;
}

.userButtons {
    display: flex;
    height: 100%;
    padding: 20px 10px;
    flex-direction: column;
    gap: 20px;
    align-items: center;
    justify-content: center;
}
</style>