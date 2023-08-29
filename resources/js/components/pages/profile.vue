<template>
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4 p-0">
                <main class="flex-shrink-0 main-content">
                    <div class="header-main row align-items-center m-0 p-4 sticky-top">
                        <div class="col-3">
                            <a href="#" class="text-decoration-none text-white" @click="$router.go(-1)"><i
                                    class="ri-arrow-left-line fs-2"></i></a>
                        </div>
                        <div class="col text-center">
                            <div class="text-center text-white fw-medium">Profile</div>
                        </div>
                        <div class="col-3 text-end">
                        </div>
                    </div>
                    <div class="row align-items-center mx-3 mt-3">
                        <div class="col-3">
                            <img src="https://iidamidamerica.org/wp-content/uploads/2020/12/male-placeholder-image.jpeg"
                                alt="" class="w-100 rounded-pill">
                        </div>
                        <div class="col">
                            <div class="fs-5 fw-medium text-white">{{ user.name }}</div>
                            <div class="text-sm text-second">
                                <p>UID: {{ user.uid }} <span class="badge bg-second text-dark">LV. 1</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="form-wrapper row align-items-center w-90 p-3 mx-auto rounded-4 mt-3">
                        <div class="col-6 text-center text-white">
                            <div class="fs-5">${{ balance }}</div>
                            <div class="text-sm">Balance</div>
                        </div>
                        <div class="col-6 text-center text-white">
                            <div class="fs-5">${{ profit_balance }}</div>
                            <div class="text-sm">Profit Balance</div>
                        </div>
                    </div>
                    <ul class="list-group list-group-flush mx-4 mt-3">
                        <router-link :to="{name:'payout_swap'}" class="list-group-item bg-body text-white py-3 list-group-item-action">
                            <div class="row">
                                <div class="col-10">Swap</div>
                                <div class="col text-right"><i class="ri-arrow-right-s-line"></i></div>
                            </div>
                        </router-link>
                        <router-link :to="{name:'direct_members'}" class="list-group-item bg-body text-white py-3 list-group-item-action">
                            <div class="row">
                                <div class="col-10">Direct Members</div>
                                <div class="col text-right"><i class="ri-arrow-right-s-line"></i></div>
                            </div>
                        </router-link>
                        <router-link :to="{name:'teams'}" class="list-group-item bg-body text-white py-3 list-group-item-action">
                            <div class="row">
                                <div class="col-10">Teams</div>
                                <div class="col text-right"><i class="ri-arrow-right-s-line"></i></div>
                            </div>
                        </router-link>
                        <router-link :to="{name:'direct_income'}" class="list-group-item bg-body text-white py-3 list-group-item-action">
                            <div class="row">
                                <div class="col-10">Direct Commission</div>
                                <div class="col text-right"><i class="ri-arrow-right-s-line"></i></div>
                            </div>
                        </router-link>
                        <router-link :to="{name:'level_incomes'}" class="list-group-item bg-body text-white py-3 list-group-item-action">
                            <div class="row">
                                <div class="col-10">Level Commission</div>
                                <div class="col text-right"><i class="ri-arrow-right-s-line"></i></div>
                            </div>
                        </router-link>
                        <router-link :to="{name:'wallet_history'}" class="list-group-item bg-body text-white py-3 list-group-item-action">
                            <div class="row">
                                <div class="col-10">Deposit History</div>
                                <div class="col text-right"><i class="ri-arrow-right-s-line"></i></div>
                            </div>
                            
                        </router-link>
                        <router-link :to="{name:'trades'}" class="list-group-item bg-body text-white py-3 list-group-item-action">
                            <div class="row">
                                <div class="col-10">Trades</div>
                                <div class="col text-right"><i class="ri-arrow-right-s-line"></i></div>
                            </div>
                            
                        </router-link>
                        <router-link :to="{name:'invest_history'}" class="list-group-item bg-body text-white py-3 list-group-item-action">
                            <div class="row">
                                <div class="col-10">Invest History</div>
                                <div class="col text-right"><i class="ri-arrow-right-s-line"></i></div>
                            </div>
                            
                        </router-link>
                        <router-link :to="{name:'income_history'}" class="list-group-item bg-body text-white py-3 list-group-item-action">
                            <div class="row">
                                <div class="col-10">Compound History</div>
                                <div class="col text-right"><i class="ri-arrow-right-s-line"></i></div>
                            </div>
                            
                        </router-link>
                        <router-link :to="{name:'withdraw'}" class="list-group-item bg-body text-white py-3 list-group-item-action">
                            <div class="row">
                                <div class="col-10">Withdraw</div>
                                <div class="col text-right"><i class="ri-arrow-right-s-line"></i></div>
                            </div>
                        </router-link>
                        <router-link :to="{name:'withdraw_details'}" class="list-group-item bg-body text-white py-3 list-group-item-action">
                            <div class="row">
                                <div class="col-10">Withdraw History</div>
                                <div class="col text-right"><i class="ri-arrow-right-s-line"></i></div>
                            </div>
                        </router-link>
                        <router-link :to="{name:'tickets'}" class="list-group-item bg-body text-white py-3 list-group-item-action">
                            <div class="row">
                                <div class="col-10">Support</div>
                                <div class="col text-right"><i class="ri-arrow-right-s-line"></i></div>
                            </div>
                            
                        </router-link>
                        <router-link to="" class="list-group-item bg-body text-white py-3 list-group-item-action">
                            <div class="row">
                                <div class="col-10">Account Security</div>
                                <div class="col text-right"><i class="ri-arrow-right-s-line"></i></div>
                            </div>
                            
                        </router-link>
                    </ul>
                    <div class="d-grid mx-3 mt-3">
                        <button class="btn btn-light p-3" @click="logout()">
                            Sign out
                        </button>
                    </div>
                </main>
                <Footer />
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
    <!-- <div class="container  head_container">
        <Header />
        <section class="mt-cstm">
        <div class="col-md-10 mx-auto pt-5">
            <h3 class="text-warning text-center py-3">Profile</h3>

            <div class="item"><div class="card bg-white text-center rounded-2"><img :src="url+'assets/images/girl.png'"  style="width:100px" class=" mx-auto d-block mt-3"> <div class="card-body"><h4 class="card-title">{{ user.name }}</h4> <h6 class="card-text mt-0 border-bottom border-warning border-2 pb-2">
                            {{ user.email }}
            </h6> <div class="row mt-3 align-items-center"><div class="col-4"><h5 class="text-success fs-6">
                        {{user.uid }}
                    </h5> <p class="copytrader_font">
                        User Id
                    </p></div> 
                    <div class="col-4"><p class="mb-0  fs-6">{{ user.spid }}</p> <p class="copytrader_font">Refer Id</p></div>
                    <div class="col-4"><p class="mb-0  fs-6">{{ user.phone }}</p> <p class="copytrader_font">Phone</p></div>
                </div></div></div></div>
        </div>
        </section>
        
    </div> -->
</template>

<script>
import carousel from 'vue-owl-carousel';
import Footer from './footer.vue';

export default {
    name: 'profile',
    components:{
        carousel,
        Footer
    },
    data() {
        return {
            user: {},
            balance:0,
            url: process.env.mix_app_url,
        }
    },
    created() {
        this.userDetails();
    },
  
    methods: {
        userDetails() {
            axios
                .post(this.url + "api/getUserDetails", {
                    token: localStorage.token,
                })
                .then((res) => {
                    this.user = res.data.user;
                    this.balance = res.data.balance;
                    this.profit_balance = res.data.profit_balance;
                })
                .catch((err) => {
                    console.log(err);
                });
        },
        logout() {
            axios
                .post(this.url + "api/userLogout", {
                    token: localStorage.token,
                })
                .then((res) => {
                    console.log(res);
                })
                .catch((err) => {
                    console.log(err);
                });
            localStorage.removeItem("token");
            this.$router.push({ name: "index" });
        },
    },
   
}
</script>