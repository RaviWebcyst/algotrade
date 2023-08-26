<template>
  
  <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4 p-0">
                <main class="flex-shrink-0 login-wrapper d-flex flex-column align-items-center justify-content-center">
                    <div class="my-3">
                        <!-- <img src="" alt="" class="w-100"> -->
                        <div class="fs-3">Logo Goes Here</div>
                    </div>
                    <form class="form-wrapper p-3 rounded-3 w-90" @submit.prevent="registerUser">
                        <div class="fs-3 fw-semibold text-center mt-3 mb-4">Register</div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="spid" v-model="spid" placeholder="Enter Refer Id"  @change="getSponser" required>
                            <label for="spid">Refer Id</label>
                            <div class="text-danger" v-if="error">{{ error }}</div>
                            <div class="text-success" v-if="success">{{ success }}</div>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" v-model="name" id="name" placeholder="Enter Full Name" required>
                            <label for="name">Full Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="tel" class="form-control" v-model="phone" id="phone" placeholder="Enter Phone Number" required>
                            <label for="phone">Phone Number</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" v-model="email" id="email" placeholder="Enter Email Address" required>
                            <label for="email">Email address</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" v-model="password" id="password" placeholder="Password" required>
                            <label for="password">Password</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control"  v-model="confirm_password" id="confirm-password" placeholder="Confirm Password" required>
                            <label for="confirm-password">Confirm Password</label>
                        </div>
                        <div class="d-grid"><button class="btn btn-main p-3 fw-medium" type="submit">Register</button></div>
                      </form>

                    <div class="text-center">
                        <router-link :to="{name:'Login'}" class="btn btn-link text-white text-decoration-none fw-medium">Already Have an Account? Login</router-link>
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
      name: '',
      email: '',
      phone: '',
      password: '',
      confirm_password: '',
      spid: '',
      message: false,
      url: process.env.mix_app_url,
      apiUrl: process.env.mix_api_url,
      spin: true,
      disabled: false,
      success: false,
      error: false
    }
  },
  created() {
    if (this.$route.query.uid) {
      this.spid = this.$route.query.uid;
    }
  },
  methods: {
    registerUser() {
        this.disabled = true;
        this.spin = false;
         axios.post(this.url+'api/user_register', {
            name: this.name,
            email: this.email,
            phone: this.phone,
            password: this.password,
            confirm_password: this.confirm_password,
            spid:this.spid
            }).then(res=>{
                console.log(res);
                this.$router.push({name:"thankyou",params:{id:res.data.id}});
                // this.$toaster.success(res.data.message);
                // this.name = "";
                // this.email = "";
                // this.password = "";
                // this.confirm_password = "";
                // this.phone = "";
                // this.spin = true;

                // this.disabled = false;
            }).catch(err=>{
                console.log(err);
                this.$toaster.error(err.response.data.message);
                this.password = "";
                this.confirm_password = "";
                this.spin = true;
                this.disabled = false;
            });
      },
    
    async getSponser() {
      try {
        const response = await fetch(this.url +'api/getSponser', {
          method: "POST",
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify({
            spid: this.spid
          })
        });

        var data = await response.json();
        console.log(data);
        if (data.error) {
          this.error = data.error;
          this.success = false
        }
        if (data.sp_name) {
          this.error = "";
          this.success = data.sp_name;
        }

        // Handle successful registration (e.g., redirect to login page)
      } catch (error) {
        console.log(error);
        // this.error = error.message;
        // this.success = false;
        // console.log(error.message);
        // Handle registration error (e.g., display error message)
      }
    }
  }
}
</script>
  