<script setup>
import { RouterLink } from 'vue-router';
import { ref } from "vue";
import { validateFormLogin } from "../helpers/validations"
import { login } from "../api/user"


import MyInput from './UI/MyInput.vue';
import MyButton from './UI/MyButton.vue';


const email = ref("");
const password = ref("");
const error = ref(null);


const loginFetch = async () => {
  error.value = validateFormLogin(email.value, password.value)

  if (error.value) {
    return;
  }

  const request = {
      email: email.value,
      password: password.value,
    }

  try {
    const response = await login(request)

    if (response.status === 200) {
      localStorage.setItem("token", response.data);
      // Переход на роут '/'
      // Замените 'router' на ваш объект маршрутизатора
      // router.push("/");
    }
  } catch (e) {
    const errorMessage = e.response.data.message; // Замените на реальное сообщение об ошибке
    error.value = errorMessage;
    console.error("Registration failed", e);
  }
};

</script>

<template>
  <div class="containerLogin">
        <div class="header">
          Login
        </div>
        <div class="loginForm">
          <div class="loginInputs">
            <div>
              <div>Email*</div>
              <MyInput 
                v-model="email"
                type="email"
                manlength="50"
                required
                placeholder="Enter email"
              />
            </div>
            <div>
              <div>Password*</div>
              <MyInput 
                  v-model="password"
                  type="password"
                  manlength="50"
                  minlength="6"
                  required
                  placeholder="Enter password"
              />
            </div>            
          </div>

          <div v-if="error" class="error">
            {{ error }}
          </div>

          <div class="loginButtons">
            <MyButton @click="loginFetch">Login</MyButton>
            <RouterLink to="/register">
              <MyButton>Register</MyButton>  
            </RouterLink>           
          </div>

        </div>
  </div>
</template>

<style scoped>
.error {
  color: rgb(228, 14, 14);
  font-size: 700;
}
.containerLogin {
  width: 100%;
  max-width: 1200px;
  height: 100%;
  min-height: 800px;
  background-color: white;
}

.header {
  min-height: 115px;
  background: linear-gradient(270deg, #050505 0%, rgba(71, 71, 71, 0.00) 100%);
  width: 100%;
  display: flex;
  justify-content: flex-end;
  align-items: center;
  padding-right: 223px;
  color: #FFF;
  font-size: 32px;
}

.loginForm {
  /* height: 100%; */
  height: 685px;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  padding: 50px;
}

.loginInputs {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  gap: 22px;
  height: 75%;
  color: #000;
  padding: 100px;
  font-size: 14px;
}

.loginInputs input {

}

.loginButtons {
  padding-right: 25px;
  display: flex;
  justify-content: flex-end;
  align-items: flex-end;
  gap: 20px;
  height: 20%;
  width: 100%;
}

@media (max-width: 824px) {
    .loginInputs {
      padding: 20px;

  }

  .loginInputs input {
    width: 226px;
  }
  .loginButtons {
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
}
</style>
