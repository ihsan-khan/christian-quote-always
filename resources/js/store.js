import { createApp } from 'vue';
import { createStore } from "vuex";
import * as auth from './services/auth_service';


export default new createStore({
    state: {
        isLoggedIn: null,
        // apiURL: 'https://christianquotealways.com/api',
        // serverPath: 'https://christianquotealways.com',
        apiURL: 'http://localhost:8000/api',
        serverPath: 'http://localhost:8000',
        profile: {},
        isLoading: false,
        commonString: '',
    },
    mutations: {
        authenticate(state, payload) {
            state.isLoggedIn = auth.isLoggedIn();
            if (state.isLoggedIn) {
                state.profile = payload;
            } else {
                state.isLoggedIn = null;
                state.profile = {};
            }
        }
    },
    actions: {
        authenticate(context, payload) {
            context.commit('authenticate', payload);
        }
    }
})
