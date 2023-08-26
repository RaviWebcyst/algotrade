<template>
    <div class="">
        <DHeader />
        <Sidebar />
        <div class="content-wrapper content-wrapper2">
            <section class="content1 mt-5 space">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8 stats mx-auto ">
                            <h2 class="py-2"><a href="javascript:;" @click="$router.go(-1)"><i class="fas fa-arrow-left pr-3"></i></a> Downline</h2>

                            <div class="table-responsive card">
                                <div class="table-responsive p-3">
                                    <table class="table table-responsive-sm">
                                        <thead class="border-0">
                                          <tr class="first">
                                            <th>Sr No</th>
                                            <th>User Id</th>
                                            <th>Sponser ID</th>
                                            <th>Email</th>
                                            <th>Phone Number</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <tr>
                                            <td>1.</td>
                                            <td>User</td>
                                            <td>1234</td>
                                            <td>User@gmail.com</td>
                                            <td>1234567890</td>
                                          </tr>
                                          <tr>
                                            <td>2.</td>
                                            <td>User1</td>
                                            <td>12342</td>
                                            <td>User1@gmail.com</td>
                                            <td>1297567890</td>
                                          </tr>
                                        </tbody>
                                      </table>
                                    <pagination v-model="page" :records="records" @paginate="history" />
                                </div>
                                <!-- <table class="table border-warning text-white">
                                    <thead class="text-white ">
                                        <tr>
                                            <th>#</th>
                                            <th>Amount $</th>
                                            <th>Transaction Type</th>
                                            <th>Description</th>
                                            <th>Date & Time</th>
                                        </tr>
                                    </thead>
                                    <tbody v-if="history.length > 0">
                                        <tr v-for="(his, i) in history">
                                            <td>{{ i + 1 }}</td>
                                            <td>${{ his.amount }}</td>
                                            <td>{{ his.description }}</td>
                                            <td>{{ moment(his.created_at).format('DD-MM-YYYY, hh:mm:ss A') }}</td>
                                        </tr>
                                    </tbody>
                                </table> -->
                                <pagination v-model="page" :records="records" @paginate="history" />
                            </div>
                        </div>
                    </div>

                </div>
            </section>
        </div>

        <!-- <div class="table-responsive">
            <table class="table border-warning text-white">
                <thead class="text-white ">
                    <tr>
                        <th>#</th>
                        <th>Amount $</th>
                        <th>Description</th>
                        <th>Date & Time</th>
                    </tr>
                </thead>
                <tbody v-if="history.length > 0">
                    <tr v-for="(his, i) in history">
                        <td>{{ i + 1 }}</td>
                        <td>${{ his.amount }}</td>
                        <td>{{ his.description }}</td>
                        <td>{{ moment(his.created_at).format('DD-MM-YYYY, hh:mm:ss A') }}</td>
                    </tr>
                </tbody>
            </table>
            <pagination v-model="page" :records="records" @paginate="history" />
        </div> -->
    </div>
    
</template>

<script>
import Pagination from 'vue-pagination-2';
import moment from "moment";

import DHeader from './header.vue';
import Sidebar from './sidebar.vue';

export default {
    name: "wallet_history",
    components: {
        Pagination,
        DHeader,
        Sidebar,
    },
    data() {
        return {
            url: process.env.mix_api_url,
            history: [],
            page: 1,
            records: 0,
            paginate: 0
        };
    },
    created() {
        this.deposit_history();
    },

    methods: {
        moment(date) {
            return moment(date);
        },
        deposit_history() {
            axios.post(this.url + "api/deposit_history", {
                token: localStorage.token
            }).then(res => {
                this.history = res.data.history.data;
                this.page = res.data.history.current_page;
                this.records = res.data.history.total;
                this.paginate = res.data.history;
            }).catch(err => {
                console.log(err);
            });
        }
    },
};
</script>