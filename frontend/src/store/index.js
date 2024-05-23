import {createStore} from 'vuex'
import axios from 'axios'

export default createStore({
    state: {
        token: localStorage.getItem('token') || '',
        userRoles: [],
    },
    getters: {
        isAuthenticated: (state) => !!state.token,
        isAdmin: (state) => state.userRoles.includes('admin')
    },
    mutations: {
        AUTH_SUCCESS: (state, token) => {
            state.token = token;
        },
        AUTH_ERROR: (state) => {
            state.token = '';
        },
        LOGOUT: (state) => {
            state.token = '';
        },
        SET_USER_ROLES: (state, roles) => {
            state.userRoles = roles;
        }
    },
    actions: {
        login({commit}, token) {
            commit('setToken', token);
        },
        logout({commit}) {
            commit('clearToken');
        },
        fetchUserProfile({ commit }) {
            const token = localStorage.getItem('token');
            if (token) {
                axios.get('http://localhost/api/users/me', {
                    headers: { Authorization: `Bearer ${token}` }
                })
                    .then(response => {
                        const roles = response.data.roles;
                        commit('SET_USER_ROLES', roles);
                    })
                    .catch(error => {
                        console.error('Error fetching user profile:', error.response ? error.response.data : error);
                    });
            }
        }
    },
        modules: {}
    })
