import { createStore } from 'vuex'

export default createStore({
  state: {
    token: localStorage.getItem('appToken') || '',
  },
  getters: {
    isAuthenticated: (state) => !!state.token
  },
  mutations: {
    AUTH_SUCCESS: (state, token) => {
      state.token = token;
    },
    AUTH_ERROR: (state) => {
      state.token = '';
    },
  },
  actions: {
    AUTH_REQUEST: ({ commit }, user) => {
      return new Promise((resolve, reject) => {
        loginRequest(user)
            .then((token) => {
              commit('AUTH_SUCCESS', token);
              localStorage.setItem('appToken', token);
              resolve();
            })
            .catch(() => {
              commit('AUTH_ERROR');
              localStorage.removeItem('appToken');
              reject();
            });
      });
    },
  },
  modules: {
  }
})
