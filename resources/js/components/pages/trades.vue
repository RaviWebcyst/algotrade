<template>
    <div class="container head_container">
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
                                <th style="min-width: 115px">PNL(%)</th>
                                <th>Price</th>
                                <th style="min-width: 130px">Open Time</th>
                                <th style="min-width: 130px">Close Time</th>
                            </tr>
                        </thead>
                        <tbody v-if="history.length > 0">
                            <tr v-for="pricee in history">
                                <td>{{ pricee.symbol }}</td>
                                <td class="text-success">
                                    +{{ pricee.percentage.toFixed(5) }} %
                                </td>
                                <td>{{ pricee.price }}</td>
                                <td>
                                    {{
                                        moment(pricee.open_time).format(
                                            "DD-MM-YYYY, hh:mm:ss A"
                                        )
                                    }}
                                </td>
                                <td>
                                    {{
                                        moment(pricee.created_at).format(
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
    </div>
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
