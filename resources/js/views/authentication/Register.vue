<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9" style="margin-top: 80px;">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                            <div class="col-lg-7">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                                    </div>
                                    <form v-on:submit.prevent="onSubmit" class="user">
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="text" v-model="user.name"
                                                    class="form-control form-control-user"
                                                    placeholder="Enter Full Name" />
                                                <div class="invalid-feedback" v-if="errors.name">{{errors.name[0]}}
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="email" v-model="user.email"
                                                    class="form-control form-control-user"
                                                    placeholder="Email Address" />
                                                <div class="invalid-feedback" v-if="errors.email">{{errors.email[0]}}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="password" v-model="user.password"
                                                    v-on:keyup="validatePassword" ref="passwordField"
                                                    class="form-control form-control-user" placeholder="Password" />
                                                <button class="show-password" type="button"
                                                    v-on:click="togglePasswordShow">
                                                    <span class="fa fa-eye fa-lg" ref="passwordIcon" style="margin-right:15px"></span>
                                                </button>
                                                <div class="invalid-feedback" v-if="errors.password">
                                                    {{errors.password[0]}}</div>
                                                <i v-if="user.password.length" ref="passwordStrength"
                                                    class="password-strength"></i>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="password" v-model="user.password_confirmation"
                                                    class="form-control form-control-user"
                                                    placeholder="Repeat Password" />
                                                <div class="invalid-feedback" v-if="errors.password_confirmation">
                                                    {{errors.password_confirmation[0]}}</div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 mb-3 px-0">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" v-model="user.terms_conditions" class="custom-control-input" id="terms_conditions">
                                            <label class="custom-control-label" for="terms_conditions">I accept Christiano Quote  <a href="javascript: void(0)" class="btn btn-link p-0">Terms & Conditions</a></label>
                                            <div class="invalid-feedback" v-if="errors.terms_conditions">{{errors.terms_conditions[0]}}</div>
                                        </div>
                                    </div>
                                        <button type="submit" ref="btnSubmit"
                                            class="btn btn-primary btn-user btn-block">Register Account</button>
                                        <hr>
                                        <!-- <a href="index.html" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Register with Google
                                        </a>
                                        <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                                        </a> -->
                                    </form>
                                    <hr>
                                    <!-- <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div> -->
                                    <div class="text-center">
                                        <router-link to="/login" class="small">Already have an account? Login!</router-link>
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
    import Header from '../../components/Header.vue';
    import Footer from '../../components/Footer.vue';
    export default {
        name: "register",
        components: {
            Header,
            Footer
        },
        data() {
            return {
                user: {
                    name: '',
                    email: '',
                    password: '',
                    password_confirmation: '',
                    terms_conditions: false
                },

                errors: {},
                message: '',
                btnSubmitOldHtml: '',
            };
        },
        methods: {
            togglePasswordShow() {
                let passwordField = this.$refs.passwordField;
                let passwordIcon = this.$refs.passwordIcon;
                if (passwordField.getAttribute('type') === 'password') {
                    passwordField.setAttribute('type', 'text');
                    passwordIcon.classList.remove('fa-eye');
                    passwordIcon.classList.add('fa-eye-slash');
                } else {
                    passwordField.setAttribute('type', 'password');
                    passwordIcon.classList.remove('fa-eye-slash');
                    passwordIcon.classList.add('fa-eye');
                }
            },
            validatePassword() {
                if (this.user.password.length === 0) {
                    return;
                }

                this.errors.password = '';
                var matchedCase = new Array();
                matchedCase.push("[$@$!%*#?&]");
                matchedCase.push("[A-Z]");
                matchedCase.push("[0-9]");
                matchedCase.push("[a-z]");

                var ctr = 0;
                for (var i = 0; i < matchedCase.length; i++) {
                    if (new RegExp(matchedCase[i]).test(this.user.password)) {
                        ctr++;
                    }
                }

                var color = "";
                var strength = "";
                switch (ctr) {
                    case 0:
                    case 1:
                    case 2:
                        strength = "Very Weak";
                        color = "red";
                        break;
                    case 3:
                        strength = "Medium";
                        color = "orange";
                        break;
                    case 4:
                        strength = "Strong";
                        color = "green";
                        break;
                }
                this.$refs.passwordStrength.innerHTML = strength;
                this.$refs.passwordStrength.style.color = color;
            },
            onSubmit: async function () {
                this.disableSubmission(this.$refs.btnSubmit);

                try {
                    await auth.register(this.user);
                    this.errors = {};
                    this.$store.state.commonMessage = "registration";
                    this.$router.push({
                        name: "login"
                    });
                } catch (error) {
                    switch (error.response.status) {
                        case 422:
                            this.errors = error.response.data.errors;
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

    .relative {
    position: relative;
    }

    .password-strength {
    position: absolute;
    right: 0;
    top: -13px;
    font-size: 10px;
    }

    .show-password {
    border: 0;
    font-size: 16px;
    color: #4e73df;
    background-color: transparent;
    position: absolute;
    top: 20px;
    right: 5px;
    -webkit-transform: translateY(-50%);
    transform: translateY(-50%);
    }
    .show-password:focus {
    outline: 0;
    }
</style>
