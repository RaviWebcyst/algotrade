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
                            <div class="text-center text-white fw-medium">Withdraw History</div>
                        </div>
                        <div class="col-2"></div>
                    </div>
                    <div class="mx-3 mt-3">
                        <div class="table-responsive">
                            <table class="table table-dark table-hover">
                                <thead>
                                    <tr>
                                        <th class="bg-main">Sr.</th>
                                        <th class="bg-main">Amount</th>
                                        <th class="bg-main" style="min-width: 150px;">Description</th>
                                        <th class="bg-main" style="min-width: 150px;">Date</th>
                                    </tr>
                                </thead>
                                <tbody
                                        v-if="history.length > 0"
                                        class="tbody"
                                    >
                                        <tr v-for="(his, i) in history">
                                            <td class="p-3">{{ i + paginate.from }}</td>
                                            <td class="p-3">${{ his.amount }}</td>
                                            <td class="p-3">${{ his.address }}</td>
                                            <td class="p-3">${{ his.type }}</td>
                                            <td class="p-3">{{ his.status }}</td>
                                            <td class="p-3">{{ his.description }}</td>
                                            <td class="p-3">
                                                {{
                                                    moment(
                                                        his.created_at
                                                    ).format(
                                                        "DD-MM-YYYY, hh:mm:ss A"
                                                    )
                                                }}
                                            </td>
                                        </tr>
                                    </tbody>
                            </table>
                            <pagination v-model="page" :records="records" @paginate="withdraw_details" :per-page="per_page" />

                        </div>
                    </div>
                </main>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
    <!-- <div class="wrapper">
        <Header />
        <sidebar />
        <div class="content-wrapper content-wrapper2">
            <section class="content mt-5">
                <div class="container">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="my-3"><a href="javascript:;" @click="$router.go(-1)"><i class="fas fa-arrow-left pr-3"></i></a> Withdraw Details</h4>
                            <div class="table-responsive">
                                <table class="table table-borderless">
                                    <thead>
                                        <tr class="first">
                                            <th>#</th>
                                            <th>Withdrawal Amount</th>
                                            <th>Withdrawal Address</th>
                                            <th>Withdrawal Type</th>
                                            <th style="min-width: 200px">
                                                Status
                                            </th>
                                            <th style="min-width: 200px">
                                                Description
                                            </th>
                                            <th>Submit Date & Time</th>
                                            <th>Action Date & Time</th>
                                        </tr>
                                    </thead>
                                    <tbody
                                        v-if="history.length > 0"
                                        class="tbody"
                                    >
                                        <tr v-for="(his, i) in history">
                                            <td>{{ i + paginate.from }}</td>
                                            <td>${{ his.amount }}</td>
                                            <td>${{ his.address }}</td>
                                            <td>${{ his.type }}</td>
                                            <td>{{ his.status }}</td>
                                            <td>{{ his.description }}</td>
                                            <td>
                                                {{
                                                    moment(
                                                        his.created_at
                                                    ).format(
                                                        "DD-MM-YYYY, hh:mm:ss A"
                                                    )
                                                }}
                                            </td>
                                            <td>
                                                {{
                                                    moment(
                                                        his.updated_at
                                                    ).format(
                                                        "DD-MM-YYYY, hh:mm:ss A"
                                                    )
                                                }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <pagination v-model="page" :records="records" @paginate="withdraw_details" :per-page="per_page" />
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div> -->
    
</template>

<script>
import Pagination from "vue-pagination-2";
import moment from "moment";

import Header from "./header.vue";
import sidebar from "./sidebar.vue";

export default {
    name: "withdraw_details",
    components: {
        Pagination,
        Header,
        sidebar,
    },
    data() {
        return {
            url: process.env.mix_api_url,
            history: [],
            page: 1,
            records: 0,
            paginate: 0,
            per_page:50
        };
    },
    created() {
        this.withdraw_details();
    },

    methods: {
        moment(date) {
            return moment(date);
        },
        withdraw_details() {
            axios
                .post(this.url + "api/withdraw_details?page=" + this.page, {
                    token: localStorage.token,
                })
                .then((res) => {
                    this.history = res.data.withdraw.data;
                    this.page = res.data.withdraw.current_page;
                    this.records = res.data.withdraw.total;
                    this.paginate = res.data.withdraw;
                    this.per_page = res.data.withdraw.per_page;

                })
                .catch((err) => {
                    console.log(err);
                });
        },
    },
};
</script>
