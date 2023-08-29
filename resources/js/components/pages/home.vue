<template>
     <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <main class="flex-shrink-0 main-content">
                    <div class="header-main p-4 sticky-top">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="user-image rounded-pill p-1">
                                <img src="https://source.unsplash.com/200x200/?random" alt=""
                                    class="rounded-pill w-100" />
                            </div>
                            <div class="header-icon postion-relative" :class="notify>0?'bell_icon':''" >
                                <router-link :to="{name:'notifications'}" class="">
                                    <i class="ri-notification-line fs-4"></i>
                                    <div class="position-relative cstm-badge" v-if="notify>0">
                                    <div class="badge bg-warning rounded-circle">
                                        <span class="text-white">
                                            {{ notify }}
                                        </span>
                                    </div>
                                </div>
                                </router-link>
                            </div>
                        </div>

                        <div class="greetings text-white fs-4 my-3">Welcome, <span class="fw-medium text-uppercase">{{ user.name }}</span>
                        </div>

                        <div class="row align-items-center">
                            <div class="col-3 me-3">
                                <div class="nft-img p-2 rounded-pill d-inline-block w-80px">
                                    <img :src="url+'front/assets/images/ntf-coin.png'" alt="nft coin"
                                        class="object-fit-cover rounded-pill w-100 h-100" />
                                </div>
                            </div>
                            <div class="col text-white">
                                <p class="m-0 fs-5">Your Balance</p>
                                <p class="m-0 fs-3 fw-semibold">${{ balance }}</p>
                            </div>
                        </div>

                        <div class="d-flex gap-2 mt-4 mb-2">
                            <router-link :to="{name:'deposit'}" class="btn btn-main w-50 py-3 fw-medium fs-6">
                                <i class="ri-arrow-left-down-line"></i> Deposit
                            </router-link>
                            <router-link :to="{name:'withdraw'}" class="btn btn-main-outline w-50 py-3 fw-medium fs-6">
                                <i class="ri-arrow-right-up-line"></i> Withdraw
                            </router-link>
                        </div>
                    </div>
<!--                 
                    <section class="mt-4">
                    <carousel
                    :autoplay="true"
                    :nav="false"
                    :items="2"
                    :margin="20"
                    :dots="true"
                >
                    <div class="item">
                        <router-link :to="{name:'trade',params:{id:'TRX'}}" class="text-white text-decoration-none">
                                <div class="card nft-img overflow-hidden">
                                    <div class="bg-body card-body p-2 text-center">
                                        <div class="rounded-pill d-flex justify-content-center">
                                            <img :src="url+'front/assets/images/tron.svg'" alt="" class="w-50">
                                        </div>
                                        <div class="fs-6 text-white mt-3 mb-2">Tron (TRX)</div>
                                        <div class="row">
                                            <div class="col-6 text-white text-start text-sm">{{ trx.price }}</div>
                                            <div class="col-6 text-green text-sm text-end" :class="trx.per < 0 ? 'text-danger':'text-green'">{{trx.per}}%</div>
                                        </div>
                                    </div>
                                </div>
                                </router-link>
                                
                    </div>
                    <div class="item">
                        <router-link :to="{name:'trade',params:{id:'BNB'}}" class="text-white text-decoration-none">
                                <div class="card nft-img overflow-hidden">
                                    <div class="bg-body card-body p-2 text-center">
                                        <div class="rounded-pill d-flex justify-content-center">
                                            <img :src="url+'front/assets/images/bnb.svg'" alt="" class="w-50">
                                        </div>
                                        <div class="fs-6 text-white mt-3 mb-2">Binance (BNB)</div>
                                        <div class="row">
                                            <div class="col-6 text-white text-start text-sm">{{ bnb.price }}</div>
                                            <div class="col-6  text-sm text-end" :class="bnb.per < 0 ? 'text-danger':'text-green'">{{bnb.per}}%</div>
                                        </div>
                                    </div>
                                </div>
                            </router-link>
                                
                    </div>
                    <div class="item">
                       
                        <router-link :to="{name:'trade',params:{id:'BTC'}}" class="text-white text-decoration-none">
                            <div class="card nft-img overflow-hidden">
                                <div class="bg-body card-body p-2 text-center">
                                    <div class="rounded-pill d-flex justify-content-center">
                                        <img :src="url+'front/assets/images/bitcoin.svg'" alt="" class="w-50">
                                    </div>
                                    <div class="fs-6 text-white mt-3 mb-2">Bitcoin (BTC)</div>
                                    <div class="row">
                                        <div class="col-6 text-white text-start text-sm">{{ btc.price }}</div>
                                        <div class="col-6  text-sm text-end"  :class="btc.per < 0 ? 'text-danger':'text-green'">{{btc.per}}%</div>
                                    </div>
                                </div>
                            </div>
                        </router-link>
                                
                    </div>
                    <div class="item">
                        <router-link :to="{name:'trade',params:{id:'DOGE'}}" class="text-white text-decoration-none">
                            <div class="card nft-img overflow-hidden">
                                <div class="bg-body card-body p-2 text-center">
                                    <div class="rounded-pill d-flex justify-content-center">
                                        <img :src="url+'front/assets/images/dogecoin.svg'" alt="" class="w-50">
                                    </div>
                                    <div class="fs-6 text-white mt-3 mb-2">Dogecoin (DOGE)</div>
                                    <div class="row">
                                        <div class="col-6 text-white text-start text-sm">{{ doge.price }}</div>
                                        <div class="col-6  text-sm text-end" :class="doge.per < 0 ? 'text-danger':'text-green'">{{doge.per}}%</div>
                                    </div>
                                </div>
                            </div>
                        </router-link>
                                
                    </div>
                    
                </carousel>
            </section> -->

                    <div class="mx-sm-5 mx-2 my-4 text-white">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="fs-3 fw-medium">Market Trends</div>
                            <div class="fs-6">
                                <router-link :to="{name:'market'}" class="nav-link">
                                View All
                                </router-link>
                            </div>
                        </div>

                        <div class="row g-3 mt-1 justify-content-center">
                            <div class="col-6">
                                <router-link :to="{name:'trade',params:{id:'TRX'}}" class="text-white text-decoration-none">
                                <div class="card nft-img overflow-hidden">
                                    <div class="bg-body card-body p-2 text-center">
                                        <div class="rounded-pill">
                                            <img :src="url+'front/assets/images/tron.svg'" alt="" class="w-50">
                                        </div>
                                        <div class="fs-6 text-white mt-3 mb-2">Tron (TRX)</div>
                                        <div class="row">
                                            <div class="col-6 text-white text-start text-sm">{{ trx.price }}</div>
                                            <div class="col-6 text-green text-sm text-end" :class="trx.per < 0 ? 'text-danger':'text-green'">{{trx.per}}%</div>
                                        </div>
                                    </div>
                                </div>
                                </router-link>
                            </div>
                            <div class="col-6">
                                <router-link :to="{name:'trade',params:{id:'BNB'}}" class="text-white text-decoration-none">
                                <div class="card nft-img overflow-hidden">
                                    <div class="bg-body card-body p-2 text-center">
                                        <div class="rounded-pill">
                                            <img :src="url+'front/assets/images/bnb.svg'" alt="" class="w-50">
                                        </div>
                                        <div class="fs-6 text-white mt-3 mb-2">Binance (BNB)</div>
                                        <div class="row">
                                            <div class="col-6 text-white text-start text-sm">{{ bnb.price }}</div>
                                            <div class="col-6  text-sm text-end" :class="bnb.per < 0 ? 'text-danger':'text-green'">{{bnb.per}}%</div>
                                        </div>
                                    </div>
                                </div>
                            </router-link>
                            </div>
                            <div class="col-6">
                                <router-link :to="{name:'trade',params:{id:'BTC'}}" class="text-white text-decoration-none">
                                <div class="card nft-img overflow-hidden">
                                    <div class="bg-body card-body p-2 text-center">
                                        <div class="rounded-pill">
                                            <img :src="url+'front/assets/images/bitcoin.svg'" alt="" class="w-50">
                                        </div>
                                        <div class="fs-6 text-white mt-3 mb-2">Bitcoin (BTC)</div>
                                        <div class="row">
                                            <div class="col-6 text-white text-start text-sm">{{ btc.price }}</div>
                                            <div class="col-6  text-sm text-end"  :class="btc.per < 0 ? 'text-danger':'text-green'">{{btc.per}}%</div>
                                        </div>
                                    </div>
                                </div>
                                </router-link>
                            </div>
                            <div class="col-6">
                                <router-link :to="{name:'trade',params:{id:'DOGE'}}" class="text-white text-decoration-none">
                                <div class="card nft-img overflow-hidden">
                                    <div class="bg-body card-body p-2 text-center">
                                        <div class="rounded-pill">
                                            <img :src="url+'front/assets/images/dogecoin.svg'" alt="" class="w-50">
                                        </div>
                                        <div class="fs-6 text-white mt-3 mb-2">Dogecoin (DOGE)</div>
                                        <div class="row">
                                            <div class="col-6 text-white text-start text-sm">{{ doge.price }}</div>
                                            <div class="col-6  text-sm text-end" :class="doge.per < 0 ? 'text-danger':'text-green'">{{doge.per}}%</div>
                                        </div>
                                    </div>
                                </div>
                                </router-link>
                            </div>
                        </div>
                    </div>
                    <div class="mx-sm-5 mx-2 my-4 text-white">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="fs-3 fw-medium">Records</div>
                            <div class="fs-6">
                            </div>
                        </div>
                        <div class="row g-3 mt-1 justify-content-center">
                            <div class="col-6">
                                <router-link :to="{name:'direct_members'}" class="text-white text-decoration-none">
                                <div class="card nft-img overflow-hidden">
                                    <div class="bg-body card-body p-2 text-center">
                                        <div class="fs-6 text-white mt-0 mb-2">Directs </div>
                                        <div class="row">
                                            <div class="col-12 text-white text-center text-sm">{{ total_refers }}</div>
                                        </div>
                                    </div>
                                </div>
                                </router-link>
                            </div>
                            <div class="col-6">
                                <router-link :to="{name:'teams'}" class="text-white text-decoration-none">
                                <div class="card nft-img overflow-hidden">
                                    <div class="bg-body card-body p-2 text-center">
                                        <div class="fs-6 text-white mt-0 mb-2">Teams </div>
                                        <div class="row">
                                            <div class="col-12 text-white text-center text-sm">{{ total_team }}</div>
                                        </div>
                                    </div>
                                </div>
                                </router-link>
                            </div>
                            <div class="col-6">
                                <router-link :to="{name:'direct_income'}" class="text-white text-decoration-none">
                                <div class="card nft-img overflow-hidden">
                                    <div class="bg-body card-body p-2 text-center">
                                        <div class="fs-6 text-white mt-0 mb-2">Direct Income </div>
                                        <div class="row">
                                            <div class="col-12 text-white text-center text-sm">${{ direct_income }}</div>
                                        </div>
                                    </div>
                                </div>
                                </router-link>
                            </div>
                            <div class="col-6">
                                <router-link :to="{name:'level_incomes'}" class="text-white text-decoration-none">
                                <div class="card nft-img overflow-hidden">
                                    <div class="bg-body card-body p-2 text-center">
                                        <div class="fs-6 text-white mt-0 mb-2">Level Income </div>
                                        <div class="row">
                                            <div class="col-12 text-white text-center text-sm">${{ level_income }}</div>
                                        </div>
                                    </div>
                                </div>
                                </router-link>
                            </div>
                            <div class="col-6">
                                <router-link :to="{name:'income_history'}" class="text-white text-decoration-none">
                                <div class="card nft-img overflow-hidden">
                                    <div class="bg-body card-body p-2 text-center">
                                        <div class="fs-6 text-white mt-0 mb-2">Compound </div>
                                        <div class="row">
                                            <div class="col-12 text-white text-center text-sm">${{ compound }}</div>
                                        </div>
                                    </div>
                                </div>
                                </router-link>
                            </div>
                            <div class="col-6">
                                <router-link to="" class="text-white text-decoration-none">
                                <div class="card nft-img overflow-hidden">
                                    <div class="bg-body card-body p-2 text-center">
                                        <div class="fs-6 text-white mt-0 mb-2">Payout </div>
                                        <div class="row">
                                            <div class="col-12 text-white text-center text-sm">${{ payout }}</div>
                                        </div>
                                    </div>
                                </div>
                                </router-link>
                            </div>
                        </div>
                    </div>

                    <section class="content content2 mt-5">
                    <div class="container-fluid">
                    <div class="row mt-5">
                        <div class="col-12">
                            <div class="card bg-dark">
                                <div class="card-header bg-dark">
                                    <h3 class="card-title text-white">
                                        Your Refferal Link
                                    </h3>
                                </div>

                                <div class="card-body table-responsive p-3">
                                    <table
                                        class="table text-nowrap table-borderless bg-dark"
                                    >
                                        <tbody>
                                            <tr>
                                                <td class="bg-dark">
                                                    <div class="border rounded p-2 border-main text-white">
                                                    {{ link }}
                                                    </div>
                                                </td>
                                                </tr>
                                                <tr>
                                                <td class="bg-dark">
                                                    <button
                                                        type="button"
                                                        class="btn btn-main btn-md"
                                                        v-clipboard="value"
                                                    >
                                                        <i
                                                            class="fas fa-share-square"
                                                        ></i>
                                                        Copy Link
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
                    <!-- <section class="my-4">
                            <coingecko-coin-list-widget  coin-ids="bitcoin,eos,ethereum,litecoin,ripple,matic-wormhole,dai" currency="usd" locale="en"></coingecko-coin-list-widget>
                    </section> -->
                    <Footer />
                </main>
            </div>
        </div>
    </div>
</template>
<script>
import carousel from "vue-owl-carousel";
// import Sidebar from "./sidebar.vue";
import Footer from "./footer";
import moment from "moment";

export default {
    name: "home",
    components: {
        carousel,
        Footer
    },
    data() {
        return {
            user: {},
            url: process.env.mix_app_url,
            balance: 0,
            packs: [],
            modal: false,
            types: [],
            text: "",
            message: "",
            link: "",
            stocks: [],
            price: [],
            total_refers: 0,
            total_invests: 0,
            total_team: 0,
            active_refers: 0,
            progress:0,
            profit_balance:0,
            level_income:0,
            direct_income:0,
            compound:0,
            payout:0,
            notify:0,
            btc:{
                price:0,
                per:0
            },
            trx:{
                price:0,
                per:0
            },
            eth:{
                price:0,
                per:0
            },
            xrp:{
                price:0,
                per:0
            },
            bnb:{
                price:0,
                per:0
            },
            usdc:{
                price:0,
                per:0
            },
            ada:{
                price:0,
                per:0
            },
            doge:{
                price:0,
                per:0
            },
            sol:{
                price:0,
                per:0
            },
            okb:{
                price:0,
                per:0
            },
        };
    },
    created() {
        this.userDetails();
        this.packages();
    },
    methods: {
        moment(date) {
            return moment(date);
        },
        value() {
            this.$toaster.warning("Link Copied!");
            return this.link;
        },
        packages(){
            axios.get(this.url + "api/packages").then(res=>{
                this.packs  = res.data;
            }).catch(err=>{
                console.log(err);
            });
        },
        invest(package_id) {
            console.log(package_id);
            if (confirm("Are you sure want to proceed"))
                var form = new FormData();
            form.append("package_id", package_id);
            form.append("token", localStorage.token);
            axios
                .post(this.url + "api/buy_package", form)
                .then((res) => {
                    console.log(res);
                    this.$toaster.success(res.data.message);
                    this.package_id = "";
                    this.userDetails();

                })
                .catch((err) => {
                    console.log(err);
                    this.amount = "";
                    var message = err.response.data.message;
                    this.$toaster.error(message);
                });
        },
        userDetails() {
            axios
                .post(this.url + "api/getUserDetails", {
                    token: localStorage.token,
                })
                .then((res) => {
                    // console.log(res);
                    this.user = res.data.user;
                    this.balance = res.data.balance;
                    this.profit_balance = res.data.profit_balance;
                    this.direct_income = res.data.direct_income;
                    this.level_income = res.data.level_income;
                    this.interest = res.data.interest;
                    this.commission = res.data.commission;
                    this.payout = res.data.payout;
                    this.total_refers = res.data.total_refers;
                    this.active_refers =res.data.active_refers;
                    this.total_invests = Number(res.data.total_invests).toFixed(2);
                    this.total_team = res.data.total_team;
                    this.compound = res.data.compound_income;
                    this.link = this.url + "Register?uid=" + res.data.user.uid;
                    this.notify = res.data.notifies;
                })
                .catch((err) => {
                    console.log(err.response.data.message);
                });
        },
    },
    mounted() {

        const socket = new WebSocket("wss://stream.binance.com:9443/ws/!ticker@arr");
        socket.onopen = function(e) {
            console.log(e);
        };
        var vm = this;
        socket.onmessage = function(event) {
            var data = JSON.parse(event.data);
           for(var i=0;i<data.length;i++){
                // var d = data[i];
                // var asset = data[i].s.substring(data[i].s.length - 4);
                var symbol = data[i].s;
                if(symbol == "BTCUSDT"){
                    vm.btc.price = Number(data[i].c).toFixed(1);
                    vm.btc.per = data[i].P;
                }
                if(symbol == "TRXUSDT"){
                    vm.trx.price = Number(data[i].c).toFixed(5);
                    vm.trx.per = data[i].P;
                }
                if(symbol == "ETHUSDT"){
                    vm.eth.price = Number(data[i].c).toFixed(5);
                    vm.eth.per = data[i].P;
                }
                if(symbol == "DOGEUSDT"){
                    vm.doge.price = Number(data[i].c).toFixed(5);
                    vm.doge.per = data[i].P;
                }
                if(symbol == "XRPUSDT"){
                    vm.xrp.price = Number(data[i].c).toFixed(5);
                    vm.xrp.per = data[i].P;
                }
                if(symbol == "BNBUSDT"){
                    vm.bnb.price = Number(data[i].c).toFixed(4);
                    vm.bnb.per = data[i].P;
                }
                if(symbol == "USDCUSDT"){
                    vm.usdc.price = Number(data[i].c).toFixed(5);
                    vm.usdc.per = data[i].P;
                }
                if(symbol == "ADAUSDT"){
                    vm.ada.price = Number(data[i].c).toFixed(5);
                    vm.ada.per = data[i].P;
                }
                
                if(symbol == "SOLUSDT"){
                    vm.sol.price = Number(data[i].c).toFixed(5);
                    vm.sol.per = data[i].P;
                }
                if(symbol == "OKBUSDT"){
                    vm.okb.price = Number(data[i].c).toFixed(5);
                    vm.okb.per = data[i].P;
                }
                
            }
        };

        // let recaptchaScript = document.createElement("script");
        // recaptchaScript.setAttribute(
        //     "src",
        //     "https://www.livecoinwatch.com/static/lcw-widget.js"
        // );
        // document.head.appendChild(recaptchaScript);

        $(function () {
            var options = {
                series: [90, 80, 67, 46],
                chart: {
                    height: 390,
                    type: "radialBar",
                },
                plotOptions: {
                    radialBar: {
                        offsetY: 0,
                        startAngle: 0,
                        endAngle: 270,
                        hollow: {
                            margin: 5,
                            size: "30%",
                            background: "transparent",
                            image: undefined,
                        },
                        dataLabels: {
                            name: {
                                show: false,
                            },
                            value: {
                                show: false,
                            },
                        },
                    },
                },
                colors: ["#C3D21C", "#F68E00", "#D33535", "#FFEA94"],
                labels: ["Income", "Spends", "Installments", "Invests"],
                legend: {
                    show: true,
                    floating: true,
                    fontSize: "16px",
                    position: "left",
                    offsetX: 10,
                    offsetY: 10,
                    labels: {
                        useSeriesColors: true,
                    },
                    markers: {
                        size: 0,
                    },
                    formatter: function (seriesName, opts) {
                        return (
                            seriesName +
                            ":  " +
                            opts.w.globals.series[opts.seriesIndex]
                        );
                    },
                    itemMargin: {
                        vertical: 3,
                    },
                },
                responsive: [
                    {
                        breakpoint: 480,
                        options: {
                            legend: {
                                show: true,
                            },
                        },
                    },
                ],
            };

            var chart = new ApexCharts(
                document.querySelector("#chart"),
                options
            );
            chart.render();

            var options = {
                chart: {
                    height: 355,
                    type: "area",
                },
                dataLabels: {
                    enabled: false,
                },
                series: [
                    {
                        name: "Series 1",
                        data: [45, 52, 38, 45, 19, 23, 2],
                    },
                ],
                fill: {
                    colors: ["#ce940f", "#fffff", "#ce940f"],
                    type: "gradient",
                    gradient: {
                        eIntensity: 1,
                        opacityFrom: 0.9,
                        opacityTo: 0.1,
                        stops: [34, 90, 10],
                    },
                },
                xaxis: {
                    categories: [
                        "WEEK 1",
                        "WEEK 2",
                        "WEEK 3",
                        "WEEK 4",
                        "WEEK 5",
                        "WEEK 6",
                        "WEEK 7",
                    ],
                },
            };

            var chart = new ApexCharts(
                document.querySelector("#chart2"),
                options
            );

            chart.render();
        });
    },
};
</script>
<style>
.search_component_container {
    display: none !important;
    visibility: hidden !important;
}

.search_engine {
    display: none !important;
    visibility: hidden !important;
}
</style>
