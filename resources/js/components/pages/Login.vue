<template>
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4 p-0">
                <main class="flex-shrink-0 login-wrapper d-flex flex-column align-items-center justify-content-center">
                    <div class="my-3">
                        <!-- <img src="" alt=""> -->
                        <div class="fs-3">Logo Goes Here</div>
                    </div>
                    <form class="form-wrapper p-3 rounded-3 w-90" @submit.prevent="login">
                        <div class="fs-3 fw-semibold text-center mt-3 mb-4">Login</div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="email" placeholder="Enter Email / UID" v-model="email">
                            <label for="email">Email/UID</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="password" placeholder="Password" v-model="password">
                            <label for="password">Password</label>
                        </div>
                        <div class="d-grid"><button class="btn btn-main p-3 fw-medium" type="submit">Login</button></div>
                      </form>

                    <div class="text-center">
                        <router-link :to="{name:'Register'}" class="btn btn-link text-white text-decoration-none fw-medium">Don't Have an Account? Register</router-link>
                        <br>
                        <a href="javascript:;" class="btn btn-link text-white text-decoration-none fw-medium">Go to Home</a>
                    </div>
                </main>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
    
</template>
  
<script>

export default {
  data() {
    return {
      email: '',
      password: '',
      message: false,
      url: process.env.mix_app_url,
      apiUrl: process.env.mix_api_url,
      spin: true,
    }
  },
  async created() {
  },
  mounted() {

  },
  methods: {

    login() {
      this.spin = false;
     
      axios.post(this.apiUrl +'api/userlogin', {
        email: this.email,
        password: this.password,
      }).then(res => {
        localStorage.setItem('token', res.data.token);
        if (localStorage.token) {
          this.$router.push({ name: "home" });
          // this.$router.push({name:"spin"});
        }
        this.spin = true;
      }).catch(err => {
        console.log(err);
        this.spin = true;
        var message = err.response.data.message;
        if (message.email) {
         this.$toaster.error(message.email);
        }
        if (message.password) {
          this.$toaster.error(message.password);
        }
        this.$toaster.error(message);
        this.spin = true;

      });

    }
  }
}

</script>
  