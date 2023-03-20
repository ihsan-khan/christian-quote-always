<template>
    <header>
        <div class="default-header-area header">
            <div class="container">
                <div class="row align-items-center">

                    <!--Logo start-->
                    <div class="col-lg-2">
                        <div class="logo">
                            <a href="index.html"><img src="assets/images/logo.png" alt=""></a>
                        </div>
                    </div>
                    <!--Logo end-->

                    <!--Menu start-->
                    <div class="col-lg-10 ">
                        <nav class="main-menu text-end">
                            <ul>
                                <li>
                                    <router-link to="/">Home</router-link>
                                </li>
                                <li>
                                    <router-link to="/blogs">Blogs</router-link>
                                </li>
                                <li>
                                    <router-link to="/contact">Contact</router-link>
                                </li>

                                <li class="" v-if="!$store.state.isLoggedIn">
                                    <router-link to="/login" class="df-btn" exact>Login/Register</router-link>
                                </li>
                                <li class="nav-item" v-else>
                                    <router-link v-if="$store.state.role === 'admin'" to="/admin" class="nav-link"
                                        exact> <span class="fas fa-tachometer-alt"></span> Dashboard</router-link>
                                    <router-link v-else to="/home" class="nav-link" exact><span
                                            class="fas fa-tachometer-alt"></span> Dashboard</router-link>
                                </li>
                                <li class="" v-if="$store.state.isLoggedIn">
                                    <a href="#" class="df-btn" v-on:click.prevent="logout">
                                        <span class="fas fa-sign-out-alt"></span> Logout
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <!--Menu end-->
                </div>

                <!--Mobile Menu start-->
                <div class="row">
                    <div class="col-12 d-flex d-lg-none">
                        <div class="mobile-menu"></div>
                    </div>
                </div>
                <!--Mobile Menu end-->

            </div>
        </div>
    </header>
</template>
