<template>
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4 p-0">
                <main class="flex-shrink-0 main-content">
                    <div class="header-main row align-items-center p-4 sticky-top m-0">
                        <div class="col-2">
                            <a href="#" class="text-decoration-none text-white" @click="$router.go(-1)"><i
                                    class="ri-arrow-left-line fs-2"></i></a>
                        </div>
                        <div class="col text-center">
                            <div class="text-center text-white fw-medium">Trades</div>
                        </div>
                        <div class="col-2"></div>
                    </div>
                    <div class="mx-3 mt-3">
                        <div class="table-responsive">
                            <table class="table table-dark table-hover">
                                <thead>
                            <tr>
                                <th class="bg-main">Symbol</th>
                                <th class="bg-main">Type</th>
                                <th class="bg-main">Price</th>
                                <th class="bg-main" >Qty</th>
                                <th class="bg-main" style="min-width: 150px">Date</th>
                            </tr>
                        </thead>
                        <tbody v-if="history.length > 0">
                            <tr v-for="his in history">
                                <td class="p-3">{{ his.symbol }}</td>
                                <td class="p-3">
                                    {{ his.type }} 
                                </td>
                                <td class="p-3">{{ his.price }}</td>
                                <td class="p-3">
                                    {{ his.quantity }}
                                </td>
                                <td class="p-3">
                                    {{
                                        moment(his.created_at).format(
                                            "DD-MM-YYYY, hh:mm:ss A"
                                        )
                                    }}
                                </td>
                            </tr>
                        </tbody>
                            </table>
                            <pagination v-model="page" :records="records" @paginate="trades" :per-page="per_page" />

                        </div>
                    </div>
                </main>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
    <!-- <div class="container head_container">
        <Header />
        <section class="mt-cstm">
            <div class="col-md-10 mx-auto pt-5 px-2">
                <div class="card bg-dark-purple">
                    <div class="card-body">
                <h3 class="text-warning text-center py-3"><a href="javascript:;" @click="$router.go(-1)"><i class="fas fa-arrow-left pr-3"></i></a> Trade History</h3>
                <div class="table-responsive">
                    <table class="table border-warning text-white">
                        <thead>
                            <tr>
                                <th>Symbol</th>
                                <th style="min-width: 115px">Type</th>
                                <th>Price</th>
                                <th style="min-width: 130px">Qty</th>
                                <th style="min-width: 130px">Date</th>
                            </tr>
                        </thead>
                        <tbody v-if="history.length > 0">
                            <tr v-for="his in history">
                                <td>{{ his.symbol }}</td>
                                <td class="text-success">
                                    {{ his.type }} 
                                </td>
                                <td>{{ his.price }}</td>
                                <td>
                                    {{ his.quantity }}
                                </td>
                                <td>
                                    {{
                                        moment(his.created_at).format(
                                            "DD-MM-YYYY, hh:mm:ss A"
                                        )
                                    }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <pagination
                        v-model="page"
                        :records="records"
                        @paginate="history"
                    />
                </div>
                </div>
                </div>
            </div>
        </section>
    </div> -->
</template>

<script>
import Pagination from "vue-pagination-2";
import moment from "moment";

import Header from "./header.vue";

export default {
    name: "trades",
    components: {
        Pagination,
        Header,
    },
    data() {
        return {
            url: process.env.mix_api_url,
            history: [],
            page: 1,
            records: 0,
            paginate: 0,
        };
    },
    created() {
        this.trades();
    },

    methods: {
        moment(date) {
            return moment(date);
        },
        trades() {
            axios
                .post(this.url + "api/trades", {
                    token: localStorage.token,
                })
                .then((res) => {
                    this.history = res.data.history.data;
                    this.page = res.data.history.current_page;
                    this.records = res.data.history.total;
                    this.paginate = res.data.history;
                })
                .catch((err) => {
                    console.log(err);
                });
        },
    },
};
</script>
