<template>
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4 p-0">
                <main class="flex-shrink-0 main-content">
                    <div class="header-main row align-items-center p-4 sticky-top m-0">
                        <div class="col-3">
                            <a href="#" class="text-decoration-none text-white" @click="$router.go(-1)"><i
                                    class="ri-arrow-left-line fs-2"></i></a>
                        </div>
                        <div class="col text-center">
                            <div class="text-center text-white fw-medium">Algo Pro</div>
                        </div>
                        <div class="col-3 text-end">
                            <router-link :to="{name:'invest_history'}" class="text-decoration-none text-white text-truncate">History</router-link>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center  my-3">
                            <small class="text-main"
                                >Balance : ${{
                                    balance
                                }}</small
                            >
                        </div>
                    <form class="form-wrapper w-90 p-3 mt-5 mx-auto rounded-4   " @submit.prevent="invest">
                        <div class="fs-2 text-center text-white">Buy Algo Pro</div>
                       
                        <div class="mt-3">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="user_id" placeholder="User ID" v-model="form.user_id" required>
                                <label for="user_id">User ID</label>
                            </div>
                            <div class="form-floating">
                                <select class="form-select rounded-3" id="floatingSelect"
                                    aria-label="Floating label select example" v-model="form.package" v-if="packages.length>0" required>
                                    <option value="" disabled selected>Choose Package</option>
                                    <option :value="pack.id" v-for="pack in packages">{{ pack.amount }} {{ pack.name }}</option>
                                </select>
                                <label for="floatingSelect">Choose any</label>
                            </div>
                            <div class="d-grid mt-3">
                                <button class="btn btn-main p-2" type="submit">Confirm</button>
                            </div>
                        </div>
                    </form>
                </main>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
    
</template>

<script>

export default {
    name: "invest",
    data() {
        return {
            user: {},
            url: process.env.mix_api_url,
            balance: 0,
            user: {},
            text: "",
            toast: "",
            message: "",
            form:{
                package:"",
                user_id:""
            },
            packages: [],
        };
    },
    created() {
        this.userDetails();
        this.getPackages();
    },

    methods: {
        userDetails() {
            axios
                .post(this.url + "api/getUserDetails", {
                    token: localStorage.token,
                })
                .then((res) => {
                    this.balance = res.data.balance;
                    this.form.user_id = res.data.user.uid;
                })
                .catch((err) => {
                    console.log(err);
                });
        },
        getPackages() {
            axios
                .get(this.url + "api/packages")
                .then((res) => {
                    this.packages = res.data;
                })
                .catch((err) => {
                    console.log(err);
                });
        },
        invest() {
            if (confirm("Are you sure want to proceed"))
                var form = new FormData();
            form.append("package_id", this.form.package);
            form.append("user_id", this.form.user_id);
            form.append("token", localStorage.token);
            axios
                .post(this.url + "api/buy_package", form)
                .then((res) => {
                    console.log(res);
                    this.$toaster.success(res.data.message);
                    this.form.package = "";
                    this.userDetails();
                })
                .catch((err) => {
                    console.log(err);
                    this.amount = "";
                    var message = err.response.data.message;
                    this.$toaster.error(message);
                });
        },
    },
};
</script>

<style></style>
