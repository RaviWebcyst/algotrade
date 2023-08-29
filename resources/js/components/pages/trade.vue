<template>
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4 p-0">
                <main class="flex-shrink-0 main-content">
                    <div class="header-main p-4 sticky-top m-0" >
                        <div class="row">
                            <div class="col-1 text-white" @click="$router.go(-1)"><i class="ri-arrow-left-line"></i></div>
                            <div class="col-10 text-center text-white fw-medium">{{ coin }}</div>
                        </div>
                    </div>
                    <div class="row align-items-center text-light m-3">
                        <div class="col">
                            <div>{{ coin }}</div>
                            <div class="fs-1 fw-bold my-2">{{ price }}</div>
                            <div class="text-sm" :class="per < 0 ? 'text-danger':'text-green'"><i :class="per < 0 ? 'ri-arrow-down-circle-line':'ri-arrow-up-circle-line'"></i> {{per}}%</div>
                        </div>
                        <div class="col-3">
                            <img :src="url+'front/assets/images/crypto/'+coin+'.png'" alt="" class="w-100 rounded-pill">
                        </div>
                    </div>
                    <div class="mx-sm-4 mx-2 my-4 text-white">
                        <div id="chart"></div>
                    </div>
                    <div class="text-white">
                        <div class="row align-items-center justify-content-center mx-3">
                            <div class="col-6">
                                <span class="text-white-50">Open Price:</span> {{ open_price }}
                            </div>
                            <div class="col-6">
                                <span class="text-white-50">Vol:</span> {{volume}}k
                            </div>
                            <div class="col-6">
                                <span class="text-white-50">High:</span> {{ high }}
                            </div>
                            <div class="col-6">
                                <span class="text-white-50">Low:</span> {{ low }}
                            </div>
                        </div>
                    </div>
                    <div class="d-flex gap-2 mt-4 mb-2 mx-4">
                        <button class="btn btn-success w-50 py-3 fw-medium fs-6" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom">
                            Buy
                        </button>
                        <button class="btn btn-danger w-50 py-3 fw-medium fs-6" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottomPut" aria-controls="offcanvasBottomPut">
                            Sell
                        </button>
                    </div>
                </main>
                
                <!-- buy popup -->
                <div class="offcanvas offcanvas-bottom h-50" tabindex="-1" id="offcanvasBottom"
                    aria-labelledby="offcanvasBottomLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasBottomLabel">{{coin}}/USDT</h5>
                    </div>
                    <div class="offcanvas-body small">
                        <form @submit.prevent="buy">
                        <div>Path: Buy</div>
                        <div class="form-floating my-3">
                            <input type="number" class="form-control" id="price" placeholder="Enter Price" v-model="buy_amount">
                            <label for="price">Amount</label>
                        </div>
                        <div class="row align-items-center my-2">
                            <div class="col-6 text-center">Balance: ${{ balance }}</div>
                            <div class="col-6 text-center">Signal Rate: 6%</div>
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-main p-3 mt-2" type="submit" :disabled="buy_disable">Confirm
                                <div class="spinner-grow spinner-grow-sm text-light" role="status" v-if="buy_disable">
                                </div></button>
                        </div>
                        </form>
                    </div>
                </div>

                <!-- sell popup -->
                <!-- <div class="offcanvas offcanvas-bottom h-50" tabindex="-1" id="offcanvasBottomPut"
                    aria-labelledby="offcanvasBottomPutLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasBottomPutLabel">{{coin}}/USDT</h5>
                    </div>
                    <div class="offcanvas-body small">
                        <form @submit.prevent="sell">
                        <div>Path: Sell</div>
                        <div class="form-floating my-3">
                            <input type="number" class="form-control" id="price" placeholder="Enter Price" v-model="sell_amount">
                            <label for="price">Amount</label>
                        </div>
                        <div class="row align-items-center my-2">
                            <div class="col-6 text-center">Balance: ${{ trade_balance }}</div>
                            <div class="col-6 text-center">Signal Rate: 6%</div>
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-main p-3 mt-2" type="submit" :disabled="sell_disable">Confirm
                                <div class="spinner-grow spinner-grow-sm text-light" role="status" v-if="sell_disable">
                                </div>
                            </button>
                        </div>
                        </form>
                    </div>
                </div> -->


            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
</template>
<script>
import carousel from "vue-owl-carousel";
// import Sidebar from "./sidebar.vue";
import Footer from "./footer";
import moment from "moment";

export default {
  name: "market",
  components: {
      carousel,
      Footer
  },
  data() {
      return {
          url: process.env.mix_app_url,
          coin:"XMR",
          price:0,
          per:0,
          open_price:0,
          low:0,
          high:0,
          volume:0,
          balance:0,
          trade_balance:0,
          buy_amount:0,
          sell_amount:0,
          buy_disable:false,
          sell_disable:false,
      };
  },
  created() {
    this.coin = this.$route.params.id;
    this.userDetails();
  },
  methods: {
      moment(date) {
          return moment(date);
      },
      userDetails() {
            axios
                .post(this.url + "api/getUserDetails", {
                    token: localStorage.token,
                })
                .then((res) => {
                    this.balance = res.data.usdt;
                })
                .catch((err) => {
                    console.log(err.response.data.message);
                });
        },
        buy(){
            if(confirm('Are you sure want to buy!')){
                this.buy_disable = true;
                let symbol = this.coin.toLowerCase()+"usdt";
                axios
                .post(this.url + "api/buy", {
                    price:this.price,
                    token: localStorage.token,
                    coin:this.coin,
                    symbol:symbol,
                    amount:this.buy_amount
                })
                .then((res) => {
                    this.userDetails();
                    this.$toaster.success(res.data.message);
                    this.buy_disable = false;
                    this.buy_amount = 0;
                    $(".offcanvas-bottom").removeClass('show');
                    $(".offcanvas-backdrop").removeClass('show');
                })
                .catch((err) => {
                    console.log(err.response.data.message);
                    this.$toaster.error(err.response.data.message);
                    this.buy_disable = false;
                    this.buy_amount = 0;
                    $(".offcanvas-bottom").removeClass('show');
                    $(".offcanvas-backdrop").removeClass('show');
                });
            }
        },
        // sell(){
        //     if(confirm('Are you sure want to sell!')){
        //         this.sell_disable = true;
        //         let symbol = this.coin.toLowerCase()+"usdt";
        //         axios
        //         .post(this.url + "api/sell", {
        //             price:this.price,
        //             token: localStorage.token,
        //             coin:this.coin,
        //             symbol:symbol,
        //             amount:this.sell_amount
        //         })
        //         .then((res) => {
        //             this.userDetails();
        //             this.$toaster.success(res.data.message);
        //             this.sell_disable = false;
        //             $(".offcanvas-bottom").removeClass('show');
        //             $(".offcanvas-backdrop").removeClass('show');
        //             this.sell_amount = 0;
        //         })
        //         .catch((err) => {
        //             console.log(err.response.data.message);
        //             this.$toaster.error(err.response.data.message);
        //             this.sell_disable = false;
        //             this.sell_amount = 0;
        //             $(".offcanvas-bottom").removeClass('show');
        //             $(".offcanvas-backdrop").removeClass('show');
        //         });
        //     }
        // }
      
  },
  mounted() {

    const socket = new WebSocket(`wss://stream.binance.com:9443/ws/${this.$route.params.id.toLowerCase()}usdt@ticker`);
        const vh = Math.max(document.documentElement.clientHeight || 0, window.innerHeight || 0);
        socket.onopen = function (ev) {
            console.log('Socket Connected');
        }

        let coinData = [];
        let emptyData = [null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null];


        var options = {
            series: [
                {
                    data: coinData.slice(),
                },
            ],
            chart: {
                id: 'realtime',
                height: vh * 0.4,
                type: 'line',
                // animations: {
                //     enabled: true,
                //     easing: 'linear',
                //     dynamicAnimation: {
                //         speed: 1000,
                //     },
                // },
                background: '#000',
                foreColor: '#fff',
                toolbar: {
                    show: false,
                },
                zoom: {
                    enabled: false,
                },
            },
            dataLabels: {
                enabled: false,
            },
            stroke: {
                curve: 'straight',
                colors: ['#FF6300'],
                width:2,
            },
            markers: {
                size: 0,
            },
            legend: {
                show: false,
            },
            yaxis: {
                labels: {
                    show: true,
                },
                axisTicks: {
                    color: '#000'
                },
            },
            xaxis: {
                labels: {
                    show: false,
                }
            },
        };

        var chart = new ApexCharts(document.querySelector('#chart'), options);
        chart.render();
        let vm = this;
        socket.onmessage = async function (ev) {
            const data = JSON.parse(ev.data);
            // console.log(data);
                vm.price = Number(data.c);
                vm.per = data.P;
                vm.low = Number(data.l).toFixed(1);
                vm.high = Number(data.h).toFixed(1);
                vm.open_price = Number(data.o).toFixed(1);
                // vm.volume = Number(data.v).toFixed(2);

            // coinData.push(Number(data.p));
            if(data.c > 0){

                coinData.push(Number(data.c));

                if (coinData.length > 30) {
                    coinData = coinData.slice(1);
                }
                chart.updateSeries([
                    {
                        data: [coinData, emptyData].flat(),
                    },
                ]);
            }
        }
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
