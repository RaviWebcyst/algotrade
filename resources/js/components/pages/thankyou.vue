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
                    <div class="form-wrapper p-3 rounded-3 w-90">
                        <div class="fs-3 fw-semibold text-center mt-3 mb-4">Thank You For Register</div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item bg-transparent"><span class="fw-semibold">Name:</span> {{ name }}</li>
                            <li class="list-group-item bg-transparent"><span class="fw-semibold">User Id:</span>{{ uid }} </li>
                            <li class="list-group-item bg-transparent"><span class="fw-semibold">Refer Id:</span>{{ spid }} </li>
                            <li class="list-group-item bg-transparent"><span class="fw-semibold">Email:</span> {{ email }}</li>
                            <li class="list-group-item bg-transparent"><span class="fw-semibold">Phone:</span> {{ phone }}</li>
                            <li class="list-group-item bg-transparent"><span class="fw-semibold">Password:</span> {{ password }}</li>
                          </ul>
                    </div>

                    <div class="text-center d-flex">
                        <router-link :to="{name:'Login' }" class="btn btn-link text-white text-decoration-none fw-medium">Login</router-link>
                        <router-link :to="{name:'Register'}" class="btn btn-link text-white text-decoration-none fw-medium">Register</router-link>
                    </div>
                </main>
            </div>
              </div>
              <div class="col-md-4"></div>
          </div>
    
  </template>
    
  <script>
  export default {
    data() {
      return {
        name: '',
        email: '',
        uid: '',
        spid: '',
        phone: '',
        password: '',
        url: process.env.mix_app_url,
      }
    },
    created() {
      if (this.$route.params.id) {
        this.userDetails();
      }
      else{
        this.$router.push({name:"Login"});
      }
    },
    methods: {
        userDetails(){
            axios.post(this.url+'api/user',{
                id:this.$route.params.id
            }).then(res=>{
                this.name = res.data.name;
                this.email = res.data.email;
                this.uid = res.data.uid;
                this.spid = res.data.spid;
                this.phone = res.data.phone;
                this.password = res.data.showPass;
            }).catch(err=>{
                console.log(err);
            });
        }
    }
  }
  </script>
    