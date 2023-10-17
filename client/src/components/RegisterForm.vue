<script setup>
import { RouterLink } from 'vue-router';
import { ref } from "vue";
import MyInput from './UI/MyInput.vue';
import MyButton from './UI/MyButton.vue';
import { registration } from "../api/user"
import { validateForm } from "../helpers/validations"


const firstName = ref("");
const lastName = ref("");
const email = ref("");
const password = ref("");
const phoneNumber = ref("");
const error = ref(null);
const isAdmin = ref(false);

const registerFetch = async () => {
  error.value = validateForm(firstName.value, lastName.value, email.value, password.value, phoneNumber.value)

  if (error.value) {
    return;
  }

  const request = {
      first_name: firstName.value,
      last_name: lastName.value,
      email: email.value,
      password: password.value,
      phone_number: phoneNumber.value,
      is_admin: isAdmin.value,
    }

  try {
    const response = await registration(request)

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
  <div class="containerRegister">
        <div class="headerRegister">
            Register
        </div>
        <div class="registerForm">
          <div class="registerInputs">
            <div class="checkboxContainer">
                <label class="round-checkbox">
                  <input type="checkbox" v-model="isAdmin" class="checkbox-input" />
                  <span class="checkmark"></span>
                </label>
                <div>Is user admin (For Sanctum abilities)</div>

            </div>
            <div>
              <div>First Name*</div>
              <MyInput 
                v-model="firstName"
                type="text"
                manlength="50"
                required
                placeholder="Enter Name"
              />
            </div>
            <div>
              <div>Last Name*</div>
              <MyInput 
                v-model="lastName"
                type="text"
                maxLength="50"
                minLength="6"
                required
                placeholder="Enter Name"
              />
            </div>
            <div>
              <div>Email*</div>
              <MyInput 
                v-model="email"
                type="email"
                maxLength="50"
                minLength="6"
                required
                placeholder="Enter email"
              />
            </div>
            <div>
              <div>Password*</div>
              <MyInput 
                  v-model="password"
                  type="password"
                  maxLength="50"
                  minLength="6"
                  required
                  placeholder="Enter password"
              />
            </div>     
            <div>
              <div>Phone Number</div>
              <MyInput 
                v-model="phoneNumber"
                type="text"
                placeholder="Enter Number"
              />
            </div>      
          </div>

          <div v-if="error" class="error">
            {{ error }}
          </div>

          <div class="RegisterButtons">
            <RouterLink to="/">
              <MyButton>Login</MyButton>
            </RouterLink>
            <MyButton @click="registerFetch">Confirm Register</MyButton>
          </div>

        </div>
  </div>
</template>

<style scoped>
.containerRegister{
  max-width: 1200px;
  width: 100%;
  height: 100%;
  min-height: 800px;
  background-color: white;
}

.headerRegister {
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

.registerForm {
  /* height: 100%; */
  height: 685px;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  padding: 50px;
}

.checkboxContainer {
  display: flex;
  min-height: 30px;
  width: 100%;
  gap: 15px;
  align-items: center; 
}

.round-checkbox {
  position: relative;
  display: inline-block;
  width: 28px;
  height: 28px;
}

.checkbox-input {
  opacity: 0;
  width: 0;
  height: 0;
}

.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 28px;
  width: 28px;
  border-radius: 50%;
  border: 2px solid #000;
}

.checkbox-input:checked + .checkmark {
  background-image: radial-gradient(circle at center, #000 50%, transparent 50%);

}

.registerInputs {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  gap: 18px;
  height: 80%;
  color: #000;
  padding: 100px;
  font-size: 14px;
  margin-bottom: 30px;
}

.RegisterButtons {
  padding-right: 25px;
  display: flex;
  justify-content: flex-end;
  align-items: flex-end;
  gap: 20px;
  height: 15%;
  width: 100%;
}

.error {
  color: rgb(228, 14, 14);
  font-size: 700;
}

@media (max-width: 824px) {
    .RegisterInputs {
      padding: 20px;

  }

  .RegisterInputs input {
    width: 226px;
  }
  .RegisterButtons {
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
}
</style>
