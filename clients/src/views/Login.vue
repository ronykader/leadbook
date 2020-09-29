<template>
    <div>
        <div class="hero has-background-white-ter is-fullheight">
            <div class="hero-body">
                <div class="container">
                    <div class="columns is-centered">
                        <div class="columns is-5-tablet is-4-desktop is-3-widescreen">

                            <form @submit.prevent="submit" class="box">
                                <img src="https://www.leadbook.com/wp-content/uploads/2019/11/leadbook-logo-dark-hi-res.png" width="150" height="50">
                                
                                <div v-if="errors.has('root')" class="notification is-danger">
                                    <!-- <button class="delete"></button> -->
                                    {{ errors.get('root') }}
                                </div>

                                <div class="field">
                                    <label for="username" class="label">Username</label>
                                    <div class="control has-icons-left">
                                        <input type="text" class="input" name="username" id="username" v-model="form.username">
                                        <span class="icon is-small is-left">
                                            <i class="fa fa-user"></i>
                                        </span>

                                        <span class="help is-danger"
                                              v-if="errors.has('username')"
                                              v-text="errors.get('username')"/>
                                    </div>
                                </div>

                                <div class="field">
                                    <label for="password" class="lable">Password</label>
                                    <div class="control has-icons-left">
                                        <input type="password" class="input" name="password" id="password" v-model="form.password">
                                        <span class="icon is-small is-left">
                                            <i class="fa fa-lock"></i>
                                        </span>

                                        <span class="help is-danger"
                                              v-if="errors.has('password')"
                                              v-text="errors.get('password')"/>
                                    </div>
                                </div>

                                <div class="field">
                                    <router-link :to="{name: 'forgot-password'}">
                                        Forgot password?
                                    </router-link>
                                </div>

                                <div class="field text-right">
                                    <button type="submit" class="button is-primary is-fullwidth">
                                        Sign In
                                    </button>
                                </div>

                                <div class="field">
                                    Don't have an account? <router-link class="" :to="{name:'registration'}">
                                        Sign Up
                                    </router-link>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<script>

    import {mapActions} from 'vuex'
    import Errors from "@/helpers/Errors";

    export default {
        name: 'login',
        components: {},
        data() {
            return {
                form: {
                    username: '',
                    password: ''
                },
                errors: new Errors()
            }
        },
        methods:{
            ...mapActions({
                login: 'auth/logIn'
            }),

            // Submit & passing user credientials via login method
            async submit() {
                this.login(this.form).then(()=>{
                    this.$router.replace('dashboard')
                }).catch((error) => {
                    this.errors.record(error.response.data)
                })
            }
        }
    }

</script>