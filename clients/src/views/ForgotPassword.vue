<template>
    <div class="hero has-background-white-ter is-fullheight">
        <div class="hero-body">
            <div class="container">
                <div class="columns is-centered">
                    <div class="columns is-5-tablet is-4-desktop is-3-widescreen">
                        <form @submit.prevent="requestResetPassword" class="box">
                            <img src="https://www.leadbook.com/wp-content/uploads/2019/11/leadbook-logo-dark-hi-res.png" width="150" height="50">
                            <div class="field">
                                <label for="email" class="label">E-mail</label>
                                <div class="control has-icons-left">
                                    <input type="email" id="email" class="input" placeholder="user@example.com" v-model="form.email" required>
                                    <span class="icon is-small is-left">
                                        <i class="fa fa-envelope"></i>
                                    </span>
                                    <span class="help is-danger"
                                              v-if="form.errors.has('email')"
                                              v-text="form.errors.get('email')"/>
                                </div>
                            </div>
                            <button type="submit" class="button is-primary is-fullwidth" :class="{ 'is-loading': isLoading }">Send Password Reset Link</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'
    import Form from "@/helpers/Form";

    export default {
    name: 'forgot-password',
    components: {},
        data() {
            return {
                form: new Form({
                    email: ''
                }),
                isLoading: false
            }
        },
        methods: {
            async requestResetPassword() {
                this.isLoading = true;
                this.form.post('/auth/reset-password')
                    .then(response => {
                        this.$toast.success(
                            "Please check your email to reset your password.",
                            {
                                dismissible: false
                            }
                        )
                    }).finally(() => {
                    this.isLoading = false
                });
            }
        }
    }

</script>