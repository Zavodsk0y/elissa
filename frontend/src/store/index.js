import { createStore } from 'vuex';
import axios from 'axios';

export default createStore({
    state: {
        token: localStorage.getItem('token') || '',
        userRoles: [],
        parts: [],
        cart: [],
    },
    getters: {
        isAuthenticated: (state) => !!state.token,
        isAdmin: (state) => state.userRoles.includes('admin'),
        parts: (state) => state.parts,
        cartItems: (state) => {
            return state.cart.map(cartItem => {
                const part = Array.isArray(state.parts) ? state.parts.find(part => part.id === cartItem.part_id) : null;
                return {
                    id: cartItem.id,
                    part_id: cartItem.part_id,
                    quantity: cartItem.quantity,
                    header: part ? part.header : '',
                    description: part ? part.description : '',
                    price: part ? part.price : 0,
                    url: part ? part.url : '',
                    totalPrice: part ? part.price * cartItem.quantity : 0,
                };
            });
        },
        totalCartPrice: (state, getters) => {
            return getters.cartItems.reduce((total, item) => total + item.totalPrice, 0);
        }
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
        },
        setParts(state, parts) {
            state.parts = parts;
        },
        setCartItems(state, items) {
            state.cart = items;
        },
        addToCart(state, { part_id, quantity }) {
            const item = state.cart.find(item => item.part_id === part_id);
            if (item) {
                item.quantity += quantity;
            } else {
                state.cart.push({ id: state.cart.length + 1, part_id, quantity });
            }
        },
        removeFromCart(state, part_id) {
            state.cart = state.cart.filter(item => item.part_id !== part_id);
        }
    },
    actions: {
        login({ commit }, token) {
            commit('AUTH_SUCCESS', token);
        },
        logout({ commit }) {
            commit('LOGOUT');
        },
        setCartItems({ commit }, items) {
            commit('setCartItems', items);
        },
        addToCart({ commit }, payload) {
            commit('addToCart', payload);
        },
        fetchParts({ commit }) {
            axios.get('http://localhost/api/parts')
                .then(response => {
                    commit('setParts', response.data);
                })
                .catch(error => {
                    console.error('Ошибка при загрузке товаров:', error);
                });
        },
        fetchCart({ commit }) {
            const token = localStorage.getItem('token');
            axios.get('http://localhost/api/cart', {
                headers: {
                    Authorization: `Bearer ${token}`
                }
            })
                .then(response => {
                    const cartItems = response.data.items;
                    commit('setCartItems', cartItems);

                    const partIds = cartItems.map(item => item.part_id);

                    const requests = partIds.map(id => axios.get(`http://localhost/api/parts/${id}`));

                    Promise.all(requests)
                        .then(responses => {
                            const parts = responses.map(response => response.data);
                            commit('setParts', parts);
                        })
                        .catch(error => {
                            console.error('Ошибка при загрузке данных деталей:', error);
                        });

                })
                .catch(error => {
                    console.error('Ошибка при загрузке корзины:', error);
                });
        },
        removeFromCart({ commit }, part_id) {
            const token = localStorage.getItem('token');
            axios.delete(`http://localhost/api/cart/${part_id}`, {
                headers: {
                    Authorization: `Bearer ${token}`
                }
            })
                .then(() => {
                    commit('removeFromCart', part_id);
                })
                .catch(error => {
                    console.error('Ошибка при удалении товара из корзины:', error);
                });
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
                        console.error('Ошибка при загрузке профиля пользователя:', error.response ? error.response.data : error);
                    });
            }
        }
    },
    modules: {}
});
