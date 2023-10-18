// store.js
import { createStore } from 'vuex'

const store = createStore({
  state() {
    return {
      isAuth: localStorage.getItem("token") ? true : false
    }
  },
  mutations: {
    setAuth(state, value) {
      state.isAuth = value
    }
  }
})

export default store
