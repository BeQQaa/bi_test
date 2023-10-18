<script setup>
import MyButton from './UI/MyButton.vue';
import { ref, watchEffect } from 'vue';
import MyInput from './UI/MyInput.vue';
import { companies_edit } from '../api/companies';


const props = defineProps(["company"]);
const company = ref(props.company);

const companyName = ref(company.value.name);
const email = ref(company.value.email);
const site = ref(company.value.site);
const error = ref(null);

watchEffect(() => {
  console.log("firstName", companyName);
});


const editFetch = async () => {
  if (error.value) {
    return;
  }

  const request = {
      id: company.value.id,
      name: companyName.value,
      site: site.value,
      email: email.value,
    }

    console.log("response", request)

  try {
    const { data } = await companies_edit(request)
    console.log("response", data)
    // window.location.reload();
    // const res = data.token
    // localStorage.setItem("token", res);
    // store.commit('setAuth', true)
    // router.push('/')
  } catch (e) {
    const errorMessage = e.response.data.message;
    error.value = errorMessage;
    console.error("companies_edit failed", e);
  }
};


</script>

<template>
    <div class="userContainer">
        <div class="userInfo">
              <MyInput 
                v-model="companyName"
                :value="company.name"
                type="text"
                manlength="50"
                required
              />
              <MyInput 
                v-model="email"
                :value="company.email"
                type="text"
                manlength="50"
                required
              />
              <MyInput 
                v-model="site"
                :value="company.site"
                type="text"
                manlength="50"
                required
              />
            <!-- <div>First Name: {{ user.first_name }}</div> -->
            <!-- <div>Last Name: {{ user.last_name }}</div> -->
            <!-- <div>Email: {{ user.email }} -->
            <!-- <div>Phone number: {{ user.phoneNumber }}</div>  -->
        </div>
        <div class="userButtons">
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