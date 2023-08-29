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
                            <div class="text-center text-white fw-medium">Swap to Main</div>
                        </div>
                        <div class="col-3 text-end">
                            <router-link :to="{name:'payout_swaps'}" class="text-decoration-none text-white text-truncate">History</router-link>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center  my-3" v-if="form.type != ''">
                            <small class="text-main"
                                >Balance : ${{
                                    balance
                                }}</small
                            >
                    </div>
                    <form class="form-wrapper w-90 p-3 mt-5 mx-auto rounded-4" @submit.prevent="swap">
                        <div class="fs-2 text-center text-white">Swap</div>
                        <div class="mt-3">
                            <div class="form-floating mb-3">
                                <select class="form-select rounded-3" id="floatingSelect"
                                    aria-label="Floating label select example" v-model="form.type"  @change="wallet_balance" required>
                                    <option value="" disabled selected>Choose Wallet</option>
                                    <option value="usd">Profit</option>
                                    <option value="compound">Compound</option>
                            </select>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="amount" placeholder="Enter Amount" v-model="form.amount" required>
                                <label for="amount">Amount</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="amount" placeholder="Login Password" v-model="form.password" required>
                                <label for="amount">Password</label>
                            </div>
                            <div class="d-grid mt-3">
                                <button class="btn btn-main p-2" type="submit" :disabled="disable">Swap
                                    <div class="spinner-grow spinner-grow-sm text-secondary" role="status" v-if="disable">
                                    <span class="sr-only">Loading...</span>
                                    </div>
                                </button>
                            </div>
                        </div>
                    </form>
                </main>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
    <!-- <div class="">
        <Header />
        <Sidebar />
        <div class="content-wrapper content-wrapper2">
            <div class="position-fixed bottom-0 right-0 p-3" style="z-index: 999">
                <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true" :class="toast">
                    <div class="toast-header text-white" :class="text == 'Success' ? 'bg-success' : 'bg-danger'">
                        <strong class="me-auto">{{ text }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body text-dark">
                        {{ message }}
                    </div>
                </div>
            </div>
            <section class="content1 mt-5 space">
                <div class="container-fluid">
                    <div class="row">

                        <div class="col-md-8   mx-auto px-4  ">


                            <div class="card bg-dark-purple">
                                <h3 class=" text-center text-dark py-3 withdraw-btn">Swap</h3>
                                <div class="card-body">
                                    <form @submit.prevent="swap">
                                        <div class="form-group">
                                            <div class="text-right text-white">Balance ${{ balance }}</div>
                                            <select v-model="form.wallet_type"  class="form-control bg-transparent text-white withdraw-border" @change="wallet_balance">
                                                <option value="" disabled selected>Select Wallet</option>
                                                <option value="usd">Smart Wallet</option>
                                                <option value="node_1">Seed</option>
                                                <option value="node_2">Root</option>
                                                <option value="node_3">Tree Root</option>
                                                <option value="node_4">Expert Root</option>
                                                <option value="node_5">Professional Root</option>
                                                <option value="node_6">Ultimate Root</option>
                                                <option value="node_7">Star Root</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="text-white">Amount</label>
                                            <input type="text" class="form-control bg-transparent text-white withdraw-border"
                                                placeholder="Amount" v-model="form.amount" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="text-white">Login Password</label>
                                            <input type="text" class="form-control bg-transparent text-white withdraw-border"
                                                placeholder="Login Password" v-model="form.password" required>
                                        </div>
                                        <button class="btn btn-info_cstm" type="submit" >Swap</button>
                                    </form>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    

                </div>
            </section>
        </div>

       
    </div> -->
</template>

<script>
import carousel from "vue-owl-carousel";
import Header from "./header.vue";
import Sidebar from "./sidebar.vue";
export default {
    name: "payout_swap",
    components: {
        Header,
        carousel,
        Sidebar,
    },
    data() {
        return {
            user: {},
            url: process.env.mix_api_url,
            balance: 0,
            user: {},
            text: "",
            toast: "",
            message: "",
            form: {
                amount: "",
                password: "",
                type:""
            },
            disable:false
        };
    },
    created() {
        // this.userDetails();
    },

    methods: {
        // userDetails() {
        //     axios
        //         .post(this.url + "api/getUserDetails", {
        //             token: localStorage.token,
        //         })
        //         .then((res) => {
        //             this.balance = Number(res.data.balance).toFixed(3);
        //         })
        //         .catch((err) => {
        //             console.log(err);
        //         });
        // },
        swap() {
            if (confirm("Are you sure want to proceed"))
                var form = new FormData();
            form.append("amount", this.form.amount);
            form.append("wallet_type", this.form.type);
            form.append("token", localStorage.token);
            form.append("password", this.form.password);

            axios
                .post(this.url + "api/swap_payout", form)
                .then((res) => {
                    console.log(res);
                    this.$toaster.success(res.data.message);
                    this.wallet_balance();
                })
                .catch((err) => {
                    console.log(err);
                    var message = err.response.data.message;
                    this.$toaster.error(message);
                });
        },

        wallet_balance(){
            axios
                .post(this.url + "api/getBalance",{
                    wallet_type:this.form.type,
                    token:localStorage.token,
                })
                .then((res) => {
                    this.balance= res.data;
                })
                .catch((err) => {
                    var message = err.response.data.message;
                    console.log(message);
                    // this.$toaster.error(message);
                });
        }
    },
};
</script>
