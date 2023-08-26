<template>
    <header class="header_section fonts">
        <div class="container">
            <nav class="navbar navbar-expand-lg custom_nav-container ">
                <a class="navbar-brand" href="#">
                    <img :src="url+'frontend/images/logo.png'" width="50"> <span>VINCHI</span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" :aria-expanded="navToggle" aria-label="Toggle navigation"
                    @click="toggleNav">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="" :class="{ 'show': navToggle }">
                    <ul class="navbar-nav  mx-auto fs-15">
                        <li class="nav-item active">
                            <a class="nav-link" >Home  </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"> Feature</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Community</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Market</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Wallet</a>
                        </li>
                        
                    </ul>
                    <!-- <button type="button" class="btn btn-info_cstm mr-3 mobile text-white" id=""><router-link
                            :to="{ name: 'Login' }">Login</router-link></button> -->
                    <router-link
                            :to="{ name: 'Login' }" class="btn btn-info_cstm mr-3 mobile  ">Login</router-link> 
                    <!-- <button type="button" class="btn btn-info_cstm mobile"> <router-link :to="{ name: 'Register' }"
                            class="">check</router-link> </button> -->
                             <router-link :to="{ name: 'Register' }"
                                class=" btn btn-info_register mobile ">Register</router-link> 
                </div>
            </nav>
        </div>
    </header>
</template>

<script>

export default {
    name: 'front_header',
    created() {
      
    },
    data() {
        return {
            navToggle: false,
            url:process.env.mix_app_url
        }
    },
    methods: {
        scrollToTop() {
            window.scrollTo(0, 0);
        },
        toggleNav() {
            this.navToggle = !this.navToggle;
        },
    },

}
</script>
 