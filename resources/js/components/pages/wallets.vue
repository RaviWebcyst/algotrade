<template>
    <div class="wrapper">
        <!-- <div class="preloader flex-column justify-content-center align-items-center">
                <img class="animation__shake" :src="url + 'frontend/dist/img/logo.png'" alt="AdminLTELogo" height="60" width="60">
              </div> -->

        <Header />
        <Sidebar />

        <div class="content-wrapper content-wrapper2">
            <section class="container mt-5">
                <div class="text-white h5"><a href="javascript:;" @click="$router.go(-1)"><i class="fas fa-arrow-left pr-3"></i></a> Wallets</div>
                <div class="border border-primary rounded-cstm p-3">
                    <div class="row">
                        <div class="col-6 col-md-3 my-2">
                            <div class="bg-primary text-dark rounded py-3">
                                <div class="text-center">
                                    <div class="fs-14 text-dark text-uppercase">Deposit Wallet</div>
                                    <div class="h6 text-dark">${{ balance }}</div>
                                    <router-link :to="{name:'transactions',query:{type:'usdt'}}" class="text-dark"><i class="fa fa-arrow-circle-right" style="color: black !important;" ></i></router-link>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-6 col-md-3 my-2">
                            <div class="bg-primary text-dark rounded py-3">
                                <div class="text-center">
                                    <div class="fs-14 text-dark text-uppercase">Mining Wallet</div>
                                    <div class="h6 text-dark">${{ income }}</div>
                                </div>
                            </div>
                        </div> -->
                        <div class="col-6 col-md-3 my-2">
                            <div class="bg-primary text-dark rounded py-3">
                                <div class="text-center">
                                    <div class="fs-14 text-dark text-uppercase">Smart Wallet</div>
                                    <div class="h6 text-dark">${{ profit_balance }}</div>
                                    <router-link :to="{name:'transactions',query:{type:'usd'}}" class="text-dark"><i class="fa fa-arrow-circle-right" style="color: black !important;" ></i></router-link>
                                </div>
                            </div>
                        </div>
                       
                        
                        
                        <div class="col-6 col-md-3 my-2">
                            <div class="bg-primary text-dark rounded py-3">
                                <div class="text-center">
                                    <div class="fs-14 text-dark text-uppercase">Payout Wallet</div>
                                    <div class="h6 text-dark">${{ payout }}</div>
                                    <router-link :to="{name:'transactions',query:{type:'payout'}}" class="text-dark"><i class="fa fa-arrow-circle-right" style="color: black !important;" ></i></router-link>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-3 my-2">
                            <div class="bg-primary text-dark rounded py-3">
                                <div class="text-center">
                                    <div class="fs-14 text-dark text-uppercase">Vinchi Coin</div>
                                    <div class="h6 text-dark">{{ vinchi }}</div>
                                    <router-link :to="{name:'transactions',query:{type:'vinchi'}}" class="text-dark"><i class="fa fa-arrow-circle-right" style="color: black !important;" ></i></router-link>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            <section class="container mt-5">
                <div class="text-white h5">Node Wallets</div>
                <div class="border border-primary rounded-cstm p-3">
                    <div class="row">
                        <div class="col-6 col-md-3 my-2">
                            <div class="bg-primary text-dark rounded py-3">
                                <div class="text-center">
                                    <div class="fs-14 text-dark text-uppercase">SEED</div>
                                    <div class="h6 text-dark">${{ n1_bal }}</div>
                                    <router-link :to="{name:'transactions',query:{type:'node_1'}}" class="text-dark"><i class="fa fa-arrow-circle-right" style="color: black !important;" ></i></router-link>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-3 my-2">
                            <div class="bg-primary text-dark rounded py-3">
                                <div class="text-center">
                                    <div class="fs-14 text-dark text-uppercase">ROOT</div>
                                    <div class="h6 text-dark">${{ n2_bal }}</div>
                                    <router-link :to="{name:'transactions',query:{type:'node_2'}}" class="text-dark"><i class="fa fa-arrow-circle-right" style="color: black !important;" ></i></router-link>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-3 my-2">
                            <div class="bg-primary text-dark rounded py-3">
                                <div class="text-center">
                                    <div class="fs-14 text-dark text-uppercase">Tree root</div>
                                    <div class="h6 text-dark">${{ n3_bal }}</div>
                                    <router-link :to="{name:'transactions',query:{type:'node_3'}}" class="text-dark"><i class="fa fa-arrow-circle-right" style="color: black !important;" ></i></router-link>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-3 my-2">
                            <div class="bg-primary text-dark rounded py-3">
                                <div class="text-center">
                                    <div class="fs-14 text-dark text-uppercase">Expert root</div>
                                    <div class="h6 text-dark">${{ n4_bal }}</div>
                                    <router-link :to="{name:'transactions',query:{type:'node_4'}}" class="text-dark"><i class="fa fa-arrow-circle-right" style="color: black !important;" ></i></router-link>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-3 my-2">
                            <div class="bg-primary text-dark rounded py-3">
                                <div class="text-center">
                                    <div class="fs-14 text-dark text-uppercase">Professional</div>
                                    <div class="h6 text-dark">${{ n5_bal }}</div>
                                    <router-link :to="{name:'transactions',query:{type:'node_5'}}" class="text-dark"><i class="fa fa-arrow-circle-right" style="color: black !important;" ></i></router-link>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-3 my-2">
                            <div class="bg-primary text-dark rounded py-3">
                                <div class="text-center">
                                    <div class="fs-14 text-dark text-uppercase">Ultimate</div>
                                    <div class="h6 text-dark">${{ n6_bal }}</div>
                                    <router-link :to="{name:'transactions',query:{type:'node_6'}}" class="text-dark"><i class="fa fa-arrow-circle-right" style="color: black !important;" ></i></router-link>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-3 my-2">
                            <div class="bg-primary text-dark rounded py-3">
                                <div class="text-center">
                                    <div class="fs-14 text-dark text-uppercase">Star root</div>
                                    <div class="h6 text-dark">${{ n7_bal }}</div>
                                    <router-link :to="{name:'transactions',query:{type:'node_7'}}" class="text-dark"><i class="fa fa-arrow-circle-right" style="color: black !important;" ></i></router-link>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                       
                    
                </div>
            </section>
            <section class="container mt-5">
                <div class="text-white h5">Commissions</div>
                <div class="border border-primary rounded-cstm p-3">
                    <div class="row">
                        <div class="col-6 col-md-3 my-2">
                            <div class="bg-primary text-dark rounded py-3">
                                <div class="text-center">
                                    <div class="fs-14 text-dark text-uppercase">Referral</div>
                                    <div class="h6 text-dark">${{ direct_income }}</div>
                                    <router-link :to="{name:'direct_incomes'}" class="text-dark"><i class="fa fa-arrow-circle-right" style="color: black !important;" ></i></router-link>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-3 my-2">
                            <div class="bg-primary text-dark rounded py-3">
                                <div class="text-center">
                                    <div class="fs-14 text-dark text-uppercase">Level</div>
                                    <div class="h6 text-dark">${{ level_income }}</div>
                                    <router-link :to="{name:'level_incomes'}" class="text-dark"><i class="fa fa-arrow-circle-right" style="color: black !important;" ></i></router-link>
                                </div>
                            </div>
                        </div>

                        <div class="col-6 col-md-3 my-2">
                            <div class="bg-primary text-dark rounded py-3">
                                <div class="text-center">
                                    <div class="fs-14 text-dark text-uppercase">Node Profit</div>
                                    <div class="h6 text-dark">${{ total }}</div>
                                    <router-link :to="{name:'transactions',query:{trans:'roi'}}" class="text-dark"><i class="fa fa-arrow-circle-right" style="color: black !important;" ></i></router-link>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-3 my-2">
                            <div class="bg-primary text-dark rounded py-3">
                                <div class="text-center">
                                    <div class="fs-14 text-dark text-uppercase">Direct Business</div>
                                    <div class="h6 text-dark">${{ direct_business }}</div>
                                    <router-link :to="{name:'direct_members'}" class="text-dark"><i class="fa fa-arrow-circle-right" style="color: black !important;" ></i></router-link>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-3 my-2">
                            <div class="bg-primary text-dark rounded py-3">
                                <div class="text-center">
                                    <div class="fs-14 text-dark text-uppercase">Team Business</div>
                                    <div class="h6 text-dark">${{ team_business }}</div>
                                    <router-link :to="{name:'teams'}" class="text-dark"><i class="fa fa-arrow-circle-right" style="color: black !important;" ></i></router-link>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                       
                    
                </div>
            </section>
        </div>
    </div>
</template>

<script>
import carousel from "vue-owl-carousel";
import Sidebar from "./sidebar.vue";
import Header from "./header";
import moment from "moment";

export default {
    name: "wallets",
    components: {
        carousel,
        Sidebar,
        Header,
    },
    data() {
        return {
            url: process.env.mix_app_url,
            balance: 0,
            profit_balance:0,
            level_income:0,
            direct_income:0,
            direct_business:0,
            team_business:0,
            vinchi:0,
            payout:0,
            packs:[],
            n1_bal:0,
            n2_bal:0,
            n3_bal:0,
            n4_bal:0,
            n5_bal:0,
            n6_bal:0,
            n7_bal:0,
            total:0,
        };
    },
    created() {
        this.userDetails();
        this.packages();
        this.balances();
    },
    methods: {
        moment(date) {
            return moment(date);
        },
        packages(){
            axios.get(this.url + "api/packages").then(res=>{
                this.packs  = res.data;
            }).catch(err=>{
                console.log(err);
            });
        },
        balances(){
            axios.post(this.url + "api/node_balances",{
                token:localStorage.token
            }).then(res=>{
                console.log(res);
                this.n1_bal  = res.data.n1_bal;
                this.n2_bal  = res.data.n2_bal;
                this.n3_bal  = res.data.n3_bal;
                this.n4_bal  = res.data.n4_bal;
                this.n5_bal  = res.data.n5_bal;
                this.n6_bal  = res.data.n6_bal;
                this.n7_bal  = res.data.n7_bal;
                this.total = res.data.total;
            }).catch(err=>{
                console.log(err);
            });
        },
        userDetails() {
            axios
                .post(this.url + "api/getUserDetails", {
                    token: localStorage.token,
                })
                .then((res) => {
                    this.balance = Number(res.data.balance).toFixed(2);
                    this.profit_balance = Number(res.data.profit_balance).toFixed(2);
                    this.direct_income = Number(res.data.direct_income).toFixed(2);
                    this.level_income = Number(res.data.level_income).toFixed(2);
                    this.payout = Number(res.data.payout).toFixed(2);
                    this.vinchi = Number(res.data.vinchi).toFixed(2);
                    this.direct_business = Number(res.data.direct_business).toFixed(2);
                    this.team_business = Number(res.data.team_business).toFixed(2);
                  
                })
                .catch((err) => {
                    console.log(err.response.data.message);
                });
        },
    },
    mounted() {
    },
};
</script>