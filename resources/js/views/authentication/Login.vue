<template>
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9" style="margin-top: 100px;">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form v-on:submit.prevent="onSubmit" class="user">
                                        <div class="form-group">
                                            <input
                                                type="email"
                                                v-model="user.email"
                                                class="form-control form-control-user"
                                                placeholder="Enter Email Address..."
                                            />
                                            <div class="invalid-feedback" v-if="errors.email">{{errors.email[0]}}</div>
                                        </div>
                                        <div class="form-group">
                                            <input
                                                type="password"
                                                v-model="user.password"
                                                class="form-control form-control-user"
                                                placeholder="Password" />
                                            <div class="invalid-feedback" v-if="errors.password">{{errors.password[0]}}</div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                               <input
                                                    type="checkbox"
                                                    v-model="user.rememberMe"
                                                    class="custom-control-input"
                                                    id="rememberMe" />
                                                <label class="custom-control-label pt-1" for="rememberMe">Remember Me</label>
                                            </div>
                                        </div>
                                        <button 
                                            type="submit" 
                                            ref="btnSubmit" 
                                            class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                        <hr>
                                        <a href="index.html" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a>
                                        <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                        </a>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <router-link to="/register" class="small">Create an Account ! Sign up
                                        </router-link>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
</template>

<script>
    import * as auth from "../../services/auth_service";
    export default {
        name: "Login",
        components: {
           
        },
        data() {
            return {
                user: {
                    email: '',
                    password: '',
                    remember_me: false
                },

                // Google
                googleSignInParams: {
                    client_id: '22688183928-5u2rsbfn89nt47eism6jmsf8i83i52u6.apps.googleusercontent.com'
                },

                socialMediaUser: {
                    name: '',
                    email: '',
                    providerId: '',
                    password: '',
                },

                errors: {},
                message: ''
            };
        },
        methods: {
            onSubmit: async function () {
                this.disableSubmission(this.$refs.btnSubmit);
                try {
                    const response = await auth.login(this.user);
                    console.log('response',response);
                    if (response.data.user.role === 'user') {
                        this.$router.push('/home');
                    } else if (response.data.user.role === 'admin') {
                        this.$router.push('/admin');
                    }
                } catch (error) {
                    console.log('error',error);
                    switch (error.response.status) {
                        case 422:
                            this.errors = error.response.data.errors;
                            break;
                        case 401:
                            this.errors = {};
                            this.flashMessage.info({
                                message: error.response.data.message,
                                time: 5000,
                            });
                            break;
                        default:
                            this.errors = {};
                            this.flashMessage.error({
                                message: "Some error occurred please try again",
                                time: 5000,
                            });
                            break;
                    }

                    this.enableSubmission(this.$refs.btnSubmit);
                }
            },
            onGoogleSignInSuccess(googleUser) {
                const profile = googleUser.getBasicProfile();
                this.socialMediaUser.name = profile.getName();
                this.socialMediaUser.email = profile.getEmail();
                this.socialMediaUser.providerId = profile.getId();
                this.socialMediaUser.provider = 'google';
                const randomPassword = String(Math.random());
                this.socialMediaUser.password = randomPassword;
                this.socialMediaUser.confirmPassword = randomPassword;
                this.registerWithSocialMedia();
            },
            onGoogleSignInError(error) {
                this.flashMessage.error({
                    title: "Error",
                    message: 'Some error occured during google login',
                    time: 5000,
                    // icon: "/img/user-dummy.52069854.jpg"
                });
            },
            registerWithSocialMedia: async function () {
                try {
                    const response = await auth.registerWithGoogle(this.socialMediaUser);
                    if (response.data.user.role === 'user') {
                        this.$router.push('/home');
                    } else if (response.data.user.role === 'admin') {
                        this.$router.push('/admin');
                    }
                } catch (error) {
                    console.log('register with google' + error);
                    this.flashMessage.error({
                        title: 'Error',
                        message: 'Error occured please reload the page and try again.',
                        time: 5000,
                        // icon: '/img/user-dummy.52069854.jpg'
                    });
                }
            },
            disableSubmission(btnSubmit) {
                btnSubmit.setAttribute('disabled', 'disabled');
                this.btnSubmitOldHtml = btnSubmit.innerHTML;
                btnSubmit.innerHTML = '<span class="fa fa-spinner fa-spin"></span> Please wait...';
            },
            enableSubmission(btnSubmit) {
                btnSubmit.removeAttribute('disabled');
                btnSubmit.innerHTML = this.btnSubmitOldHtml;
            },
        }
    };

</script>

<style scoped>
    .bg-image {
        background-position: center !important;
        background-size: cover !important;
    }

    .g-signin-button {
        /* This is where you control how the button looks. Be creative! */
        display: inline-block;
        padding: 4px 8px;
        border-radius: 3px;
        background-color: #3c82f7;
        color: #fff;
        box-shadow: 0 3px 0 #0f69ff;
    }

</style>
