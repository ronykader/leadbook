import axios from 'axios'
export default{
    namespaced: true,
    state: {
        token: null,
        user: null
    },
    getters: {
        authenticated(state) {
            return state.token && state.user
        }, 
        user(state) {
            return state.user
        }
    },
    mutations: {
        SET_TOKEN(state,token) {
            state.token = token
        },
        SET_USER(state,data) {
            state.user = data
        }
    },
    actions: {
        
        async logIn({dispatch},Credential) {
            let response = await axios.post('/auth/login',Credential)
            return dispatch('attempted',response.data.token)
        },

        async attempted({commit, state},token) {
            if( token ) {
                // set token after successfully login
                commit('SET_TOKEN',token)
            }

            if( !state.token) {
                return
            }

            try {
                let response = await axios('/auth/me')
                // set user data after successfully login
                commit('SET_USER',response.data)
            } catch (e) {
                commit('SET_TOKEN',null)
                commit('SET_USER',null)
            }
        },
        // User logout and tokan & user unset
        logOut({commit}) {
            return axios.post('/auth/logout').then(()=>{
                commit('SET_TOKEN',null)
                commit('SET_USER',null)
            })
        }

    }   
}
