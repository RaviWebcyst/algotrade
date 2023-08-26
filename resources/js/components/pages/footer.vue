<template> 
    <footer class="footer text-center tabs mt-auto mb-2 py-2 px-3 rounded-pill fixed-bottom w-75 mx-auto">
        <div class="row">
            <div class="col-4">
                <router-link :to="{name:'invest'}" class="nav-link">
                    <i class="ri-shapes-line fs-4"></i>
                    <div class="text-sm">Algo Pro</div>
                </router-link>
            </div>
            <div class="col-4">
                <router-link to="" class="nav-link">
                    <i class="ri-service-line fs-4"></i>
                    <div class="text-sm">Services</div>
                </router-link>
            </div>
            <div class="col-4">
                <router-link :to="{name:'profile'}" class="nav-link">
                    <i class="ri-user-line fs-4"></i>
                    <div class="text-sm">Profile</div>
                </router-link>
            </div>
        </div>
    </footer>
      
</template>

<script>
export default {
    name: 'Footer',
    data() {
        return {
            url: process.env.mix_api_url
        }
    },
    created() {
        this.userDetails();
    },

    mounted() {
        if (!localStorage.token) {
            this.$router.push({ name: "Login" });
        }
    },
    methods: {
        userDetails() {
            axios.post(this.url + 'api/getUserDetails', {
                token: localStorage.token
            }).then(res => {
                console.log(res);
                if (res[0] == 'token_expired') {
                    localStorage.removeItem('token');
                    this.$router.push({ name: "Login" });
                }
                this.user = res.data.user;
                this.$emit('user_details', res.data);
                this.balance = res.data.balance;
            }).catch(err => {
                console.log(err);
            })
        },
        home() {
         //window.location.reload();
         localStorage.setItem("route", "Home");
         this.$router.push({ name: "home" });

      },
    }
}
</script>