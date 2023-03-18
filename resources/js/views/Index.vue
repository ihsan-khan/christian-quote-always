<template>
    <!--slider section start-->
    <div class="hero-section section position-relative">
        <!--Hero Item start-->
        <div class="hero-item" style="background-image: url(assets/images/hero/hero-1.jpg)">
            <div class="container">
                <div class="row align-items-center">
                    <div class="">
                    <div class="col-md-12 text-center">
                        <div class="form_show">
                            <a href="javascript:void(0);" v-on:click="textForm" class="result_btn mb-2">Create Quote</a>
                            <a href="javascript:void(0);" v-on:click="uploadForm" class="result_btn mb-2">Upload
                                Quote</a>
                        </div>
                        <div class="form_show">
                            <router-link to="/login" class="result_btn mb-2">Create Quote</router-link>
                            <router-link to="/login" class="result_btn mb-2">Upload Quote</router-link>
                        </div>
                    </div>
                </div>
                </div>

                <div class="hero-item p-4 pb-lg-65">
            <div class="container container-1370">
                <div class="row align-items-center">
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="hero-slider-content-2 mt-488-5">
                            <div class="hero-search-box">
                                <form v-on:submit.prevent="searchQuote">
                                    <input type="search" v-model="qry" v-on:keyup="searchQuote"
                                        placeholder="Search for a quote">
                                    <button type="submit">Search</button>
                                </form>
                            </div>
                            <div>
                            </div>
                        </div>
                        <br>
                    </div>
                    <div class="col-lg-12 col-md-12 col-12 ">
                        <div class="hero-slider-content-2">
                            <button class="result_btn mb-2" @click="orderByText">By Text</button>
                            <button class="result_btn mb-2" @click="orderByImage">By Image</button>
                            <button class="result_btn mb-2" @click="orderByAuthor">By author</button>
                            <button class="result_btn mb-2" @click="getQuote">By Date</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            </div>
        </div>
        <!--Hero Item end-->
    </div>
    <!--slider section end-->
    
    <!--All Support Area Start-->
    <div class="all-support-area section pt-95 pt-lg-70 pt-md-65 pt-sm-50 pt-xs-45 pb-65 pb-lg-50 pb-md-40 pb-sm-30 pb-xs-15">
        <div class="container container-1370">
            <div class="row">
                <div class="col-lg-12">
                   <!--Support Section Title Start-->
                   <div class="support-section-title text-center">
                       <h2>Read,Write And Share Quotes</h2>
                   </div> 
                   <!--Support Section Title End--> 
                </div>
            </div>
            <div class="row">
                <!--Single Support Start-->
                <div class="col-md-6 col-lg-4">
                    <div class="single-support-area">
                        <div class="support-icon">
                            <img src="assets/images/icons/help-icon4.png" alt="">
                        </div>
                        <div class="support-content">
                            <h3>Knowledge base</h3>
                            <p>It is a long established fact that a reader will be distracted by the readable content of a page when. </p>
                        </div>
                    </div>
                </div>
                <!--Single Support End-->
                <!--Single Support Start-->
                <div class="col-md-6 col-lg-4">
                    <div class="single-support-area">
                        <div class="support-icon">
                            <img src="assets/images/icons/help-icon3.png" alt="">
                        </div>
                        <div class="support-content">
                            <h3>Billing & licensing</h3>
                            <p>It is a long established fact that a reader will be distracted by the readable content of a page when. </p>
                        </div>
                    </div>
                </div>
                <!--Single Support End-->
                <!--Single Support Start-->
                <div class="col-md-6 col-lg-4">
                    <div class="single-support-area">
                        <div class="support-icon">
                            <img src="assets/images/icons/help-icon1.png" alt="">
                        </div>
                        <div class="support-content">
                            <h3>General Help</h3>
                            <p>It is a long established fact that a reader will be distracted by the readable content of a page when. </p>
                        </div>
                    </div>
                </div>
                <!--Single Support End-->
                <!--Single Support Start-->
                <div class="col-md-6 col-lg-4">
                    <div class="single-support-area">
                        <div class="support-icon">
                            <img src="assets/images/icons/help-icon6.png" alt="">
                        </div>
                        <div class="support-content">
                            <h3>Account</h3>
                            <p>It is a long established fact that a reader will be distracted by the readable content of a page when. </p>
                        </div>
                    </div>
                </div>
                <!--Single Support End-->
                <!--Single Support Start-->
                <div class="col-md-6 col-lg-4">
                    <div class="single-support-area">
                        <div class="support-icon">
                            <img src="assets/images/icons/help-icon7.png" alt="">
                        </div>
                        <div class="support-content">
                            <h3>Reviews</h3>
                            <p>It is a long established fact that a reader will be distracted by the readable content of a page when. </p>
                        </div>
                    </div>
                </div>
                <!--Single Support End-->
                <!--Single Support Start-->
                <div class="col-md-6 col-lg-4">
                    <div class="single-support-area">
                        <div class="support-icon">
                            <img src="assets/images/icons/help-icon9.png" alt="">
                        </div>
                        <div class="support-content">
                            <h3>Faq</h3>
                            <p>It is a long established fact that a reader will be distracted by the readable content of a page when. </p>
                        </div>
                    </div>
                </div>
                <!--Single Support End-->
            </div>
        </div>
    </div>
    <!--All Support Area End-->
    
    <!--Support section start-->
    <div class="support-section section pt-95 pt-lg-75 pt-md-65 pt-sm-60 pt-xs-50 pb-85 pb-lg-65 pb-md-55 pb-sm-45 pb-xs-40">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!--Support Content Start-->
                    <div class="support-content">
                        <h3>Also you can get support from here...</h3>
                        <p>Here is our support center you can get support 24/7 here</p>
                        <div class="support-item">
                            <div class="single-support">
                                <div class="support-icon">
                                    <img src="assets/images/icons/support-icon1.png" alt="">
                                </div>
                                <div class="support-link">
                                    <h4><a href="#">Forums</a></h4>
                                </div>
                            </div>
                            <div class="single-support">
                                <div class="support-icon">
                                    <img src="assets/images/icons/support-icon2.png" alt="">
                                </div>
                                <div class="support-link">
                                    <h4><a href="#">Twitter</a></h4>
                                </div>
                            </div>
                            <div class="single-support">
                                <div class="support-icon">
                                    <img src="assets/images/icons/support-icon3.png" alt="">
                                </div>
                                <div class="support-link">
                                    <h4><a href="#">Phone</a></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Support Content End-->
                </div>
            </div>
        </div>
    </div>
    <!--Support section end-->
    
    
    <!--Call To Action section start-->
    <div class="call-to-action-section section pt-70 pt-lg-50 pt-md-40 pt-sm-30 pt-xs-20 pb-xs-50">
        <div class="container">
           
            <div class="row">
                <div class="col-lg-10 col-12 mx-auto">
                    <div class="call-to-action">
                        <h3>Do you have more quesions? Mail us</h3>
                        <a class="df-btn" href="http://devitems.us11.list-manage.com/subscribe/post?u=6bbb9b6f5827bd842d9640c82&amp;id=05d85f18ef" target="_blank">Mail us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Call To Action section end-->
</template>

<style scoped>
    .form_show textarea {
        background-color: #ffffff;
        border-radius: 10px;
        margin-top: 20px;
        border: 2px soild #00a69b;
        margin: 15px 15px;
        box-shadow: 5px 5px 8px #00a69b;
        padding: 15px;

    }

    .form_show {
        color: #ffffff;
    }

    .quotebtn {
        background-color: #00a69b;
        border: 0;
        border-radius: 50px;
        padding: 8px 33px;
        color: #ffffff;
        margin-top: 20px;
    }

    .Upquotebtn {
        background-color: #00a69b;
        border: 0;
        border-radius: 50px;
        padding: 9px 19px;
        color: #ffffff;
        margin-top: 20px;
    }

    #form-control {
        margin-top: 20px;
        margin-bottom: 10px;
        padding: 8px 15px;
        border-radius: 10px;
        margin-left: 15px;
        box-shadow: 5px 5px 8px #00a69b;
    }

    .form_show img {
        max-height: 300px;
        max-width: 200px;
        margin-bottom: 10px;
    }

    .display-inline img {
        width: 100%;
        height: 70%;
    }

    .user_name {
        background-color: #00a69b;
        border: 0;
        border-radius: 50px;
        padding: 8px 30px;
        margin-right: 30px;
    }

    .btn:hover {
        background-color: #00a69b;
    }

    .align-center {
        text-align: center;

    }

    .hidden.image {
        display: inline-block !important;
    }

    .display-inline {
        display: inline-block;
        vertical-align: middle;
    }

    .img {
        border: 1px solid #f6f6f6;
        display: inline-block;
        height: auto;
        max-height: 80%;
        max-width: 80%;
        width: auto;
    }

    .drop {

        margin-top: 60px;
        background-color: #ffffff;
        border-radius: 10px;
        border: 2px soild #00a69b;
        margin: 20px 20px;
        box-shadow: 5px 5px 8px #00a69b;
        padding: 15px;
        width: 95%;

    }

    .support-content span {
        color: black;
        font-size: 20px;
        font-family: sans-serif;
    }

    .invalid-feedback {
        display: inline-block !important;
    }

    .result_btn {
        background-color: #00a69b;
        color: #ffffff;
        border: 0;
        border-radius: 50px;
        padding: 8px 20px;
        margin-right: 2px;
    }

    .btn-outline-danger:hover {
        color: #fff;
        background-color: #e74a3b;
        border-color: #e74a3b;
    }

    .support-icon img {
        width: 40px;
    }

    .modal-backdrop {
        background-color: rgba(0, 0, 0, 0.5) !important;
    }

    @media only screen and (max-width: 300px) {
        .hero-slider-content-2 {
            margin-top: -7px;
            width: 461px;
        }
    }

    .social-links {
        cursor: pointer;
        padding: 5px 10px;
    }

    .text {
        margin-bottom: -56px !important;
    }
    .card-img{
        height: 300px;
    }

    .card-text {
        font-size:20px;
    }

</style>