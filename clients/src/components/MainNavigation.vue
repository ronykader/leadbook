<template>
    <div>
        <nav class="navbar" role="navigation" aria-label="main navigation">
            <div class="navbar-brand">
                <a class="navbar-item" href="">
                    <img src="https://www.leadbook.com/wp-content/uploads/2019/11/leadbook-logo-dark-hi-res.png" width="150">
                </a>

                <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                </a>
            </div>

            <div id="navbarBasicExample" class="navbar-menu">
                <div class="navbar-end">
                    <div class="navbar-item">
                        <router-link
                                :to="{
                                    name: 'dashboard'
                                }"
                            >
                                Dashboard
                        </router-link>

                        <router-link :to="{name:'myfavorites'}" class="navbar-item">
                            My Favorite
                        </router-link>
                        <div class="navbar-item has-dropdown is-hoverable">
                            <a class="navbar-link">
                                Profile
                            </a>

                            <div class="navbar-dropdown">
                                <a class="navbar-item">{{ user.username }}</a>
                                <a class="navbar-item" @click.prevent="logOut">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</template>


<script>
import {mapGetters, mapActions} from 'vuex'
export default {
    computed: {
        ...mapGetters({
            authenticated: 'auth/authenticated',
            user: 'auth/user'
        }),    
    },
    methods: {
        ...mapActions({
            logoutAction: 'auth/logOut'
        }),
        logOut() {
            this.logoutAction().then(() => {
                this.$router.replace({
                    name: 'login'
                })
            })
        }
    }
}
</script>