<template>
    <div class="hero has-background-white-ter is-fullheight">
        <div class="hero-body">
            <div class="container">
                <div class="columns is-centered">
                    <div class="columns is-5-tablet is-4-desktop is-3-widescreen">
                        <form autocomplete="off" @submit.prevent="resetPassword" class="box">
                            <img src="https://www.leadbook.com/wp-content/uploads/2019/11/leadbook-logo-dark-hi-res.png" width="150" height="50">
                            
                            <div class="field">
                                <label for="email" class="label">E-mail</label>
                                <div class="control has-icons-left">
                                    <input type="email" id="email" class="input" placeholder="user@example.com" v-model="form.email">
                                    <span class="icon is-small is-left">
                                        <i class="fa fa-envelope"></i>
                                    </span>
                                    <span class="help is-danger"
                                              v-if="form.errors.has('email')"
                                              v-text="form.errors.get('email')"/>
                                              
                                    <span class="help is-danger"
                                              v-if="form.errors.has('token')"
                                              v-text="form.errors.get('token')"/>

                                </div>
                            </div>
                            
                            <div class="field">
                                <label for="password" class="label">Password</label>
                                <div class="control has-icons-left">
                                    <input type="password" id="password" class="input" placeholder="" v-model="form.password">
                                    <span class="icon is-small is-left">
                                        <i class="fa fa-lock"></i>
                                    </span>
                                    <span class="help is-danger"
                                              v-if="form.errors.has('password')"
                                              v-text="form.errors.get('password')"/>
                                </div>
                            </div>

                            
                            <div class="field">
                                <label for="confirm-password" class="label">Confirm Password</label>
                                <div class="control has-icons-left">
                                    <input type="password" id="confirm-password" class="input" placeholder="" v-model="form.password_confirmation">
                                    <span class="icon is-small is-left">
                                        <i class="fa fa-lock"></i>
                                    </span>
                                    <span class="help is-danger"
                                              v-if="form.errors.has('password_confirmation')"
                                              v-text="form.errors.get('password_confirmation')"/>
                                </div>
                            </div>

                            <button type="submit" class="button is-primary is-fullwidth" :class="{ 'is-loading': isLoading }">Update Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
import Form from "@/helpers/Form"

export default {
    name:'reset-password-form',
    components:{},
    data() {
        return {
            form: new Form({
                token: this.$route.params.token,
                email: null,
                password: null,
                password_confirmation: null,
            }),
            isLoading: false
        }
    },
    methods: {
        async resetPassword() {
            this.isLoading = true;
                this.form.post('/auth/reset/password')
                    .then(response => {
                        this.$toast.success(
                            "You have successfully reset your password.",
                            {
                                dismissible: false
                            }
                        )
                        this.$router.push({name: 'login'})
                    }).finally(() => {
                    this.isLoading = false
                });

            
            // await axios.post('/auth/reset/password',this.form).then(() => {
            //     this.$router.push({name: 'login'})
            // })
        }
    }
}
</script>