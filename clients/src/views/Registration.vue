<template>
    <div>
        <div class="hero has-background-white-ter is-fullheight">
            <div class="hero-body">
                <div class="container">
                    <div class="columns is-centered">
                        <div class="columns is-5-tablet is-4-desktop is-3-widescreen">
                            <form @submit.prevent="submit" class="box">
                                <img src="https://www.leadbook.com/wp-content/uploads/2019/11/leadbook-logo-dark-hi-res.png" width="150" height="50">
                                <div class="field">
                                    <label for="username" class="label">Username</label>
                                    <div class="control has-icons-left">
                                        <input type="text" class="input" name="username" id="username" v-model="form.username">
                                        <span class="icon is-small is-left">
                                            <i class="fa fa-user"></i>
                                        </span>

                                        <span class="help is-danger"
                                              v-if="form.errors.has('username')"
                                              v-text="form.errors.get('username')"/>
                                    </div>
                                </div>
                                
                                <div class="field">
                                    <label for="email" class="label">Email Address</label>
                                    <div class="control has-icons-left">
                                        <input type="text" class="input" name="email" id="email" v-model="form.email">
                                        <span class="icon is-small is-left">
                                            <i class="fa fa-envelope"></i>
                                        </span>

                                        <span class="help is-danger"
                                              v-if="form.errors.has('email')"
                                              v-text="form.errors.get('email')"/>
                                    </div>
                                </div>

                                <div class="field">
                                    <label for="phone_number" class="label">Phone</label>
                                    <div class="control has-icons-left">
                                        <input type="text" class="input" name="phone_number" id="phone_number" v-model="form.phone_number">
                                        <span class="icon is-small is-left">
                                            <i class="fa fa-phone"></i>
                                        </span>

                                        <span class="help is-danger"
                                              v-if="form.errors.has('phone')"
                                              v-text="form.errors.get('phone')"/>
                                    </div>
                                </div>
                                
                                <div class="field">
                                    <label for="address" class="label">Address</label>
                                    <div class="control has-icons-left">
                                        <input type="text" class="input" name="address" id="address" v-model="form.address">
                                        <span class="icon is-small is-left">
                                            <i class="fa fa-home"></i>
                                        </span>

                                        <span class="help is-danger"
                                              v-if="form.errors.has('address')"
                                              v-text="form.errors.get('address')"/>
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
                                              v-if="form.errors.has('password')"
                                              v-text="form.errors.get('password')"/>
                                    </div>
                                </div>

                                <div class="field">
                                    <button type="submit" class="button is-primary is-fullwidth" :class="{ 'is-loading': isLoading }">
                                        Sign Up
                                    </button>
                                </div>

                                <div class="field">
                                   Already have an account?  <router-link class="" :to="{name:'login'}">
                                        Log In
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
    import Form from "@/helpers/Form";

    export default {
        name: 'registration',
        components: {},
        data() {
            return {
                form: new Form({
                    username: '',
                    email: '',
                    phone_number: '',
                    address: '',
                    password: ''
                }),
                isLoading: false
            }
        },
        methods:{
            async submit() {
                this.isLoading = true;
                this.form.post('/auth/register')
                    .then(response => {
                        this.$toast.success(
                            "Your account has been created successfully. Please check your email to verify it's you.",
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