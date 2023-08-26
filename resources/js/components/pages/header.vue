<template>
  <div>
    <nav class="main-header navbar navbar-expand mb-4 bg-black py-2">

      <ul class="navbar-nav">
        <li class="nav-item right d-none d-sm-block">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars fa-lg mt-0"></i></a>
        </li>
        </ul>
        <!-- <div class="form-inline ps-5 d-none d-sm-block right">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Find Something Here"
              aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div> -->
        <ul class="navbar-nav pl-0">
        <li class="nav-item d-flex d-sm-none py-2">
          <router-link :to="{name:'home'}" class="nav-link font upper pr-1">
              <img :src="url+'frontend/dist/img/logo.png'" alt="Vinchi Logo" width="40" class="">
          </router-link>
          <div class="mt-2 h5">VINCHI</div>
        </li>
      </ul>

        <!-- <ul class="navbar-nav mx-auto">
        <li class="nav-item d-none d-lg-inline-block left">
          <router-link class="nav-link font upper" :to="{name:'home'}" >Home</router-link>
        </li>
        <li class="nav-item d-none d-lg-inline-block ">
          <a class="nav-link font upper" href="javascript:;">Trade</a>
        </li>
        <li class="nav-item d-none d-lg-inline-block ">
          <router-link href="#" class="nav-link font upper" :to="{name:'feed'}">Feed</router-link>
        </li>
        <li class="nav-item d-none d-lg-inline-block ">
          <a href="#" class="nav-link font upper">Market</a>
        </li>
      </ul> -->
     

      <ul class="navbar-nav ml-auto">
        <!-- <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
          </a>
        </li>
       
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fa fa-gift back" aria-hidden="true"></i>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fa fa-cog back"></i>
          </a>
        </li> -->
        <li class="nav-item ">
            <a class="nav-link btn btn-primary btn-sm"  href="https://thevinchi.io/Vinchi.apk" >
              Download
            </a>
          </li>
        <li class="nav-item dropdown d-block  d-sm-none">
            <a class="nav-link"   href="#" data-widget="pushmenu"  role="button">
              <i class="fa fa-bars  back"></i>
            </a>
          </li>
<!--          
          <li class="nav-item dropdown d-block d-sm-none">
            <a class="nav-link" href="#" @click="toggleSidebar" role="button">
              <i class="fa fa-bars back"></i>
            </a>
          </li> -->


      </ul>
    </nav>
  </div>
</template>
 
<script>

export default {
  data(){
    return {
      url:process.env.mix_app_url
    }
  },
   
methods: {
   
    home() {
      localStorage.setItem("path", "home");
      this.$router.push({ name: "home" });
    },
    feed() {
      localStorage.setItem("path", "fees");
      this.$router.push({ name: "feed" });
    }


    // logout() {
    //     axios
    //         .post(this.url + "api/userLogout", {
    //             token: localStorage.token,
    //         })
    //         .then((res) => {
    //             console.log(res);
    //         })
    //         .catch((err) => {
    //             console.log(err);
    //         });
    //     localStorage.removeItem("token");
    //     this.$router.push({ name: "Login" });
    // },
  },
  created() {
    // Retrieve the query parameter from the URL
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('sidebarOpen')) {
      this.isSidebarOpen = urlParams.get('sidebarOpen') === 'true';
    }
  },

}

</script>