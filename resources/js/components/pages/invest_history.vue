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
                            <div class="text-center text-white fw-medium">Invest History</div>
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
                                        <th class="bg-main">Date</th>
                                    </tr>
                                </thead>
                                <tbody
                                        v-if="history.length > 0"
                                        class="tbody"
                                    >
                                        <tr v-for="(his, i) in history">
                                            <td class="p-3">{{ i + paginate.from }}</td>
                                            <td class="p-3">${{ his.amount }}</td>
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
                            <pagination v-model="page" :records="records" @paginate="invest_details" :per-page="per_page" />

                        </div>
                    </div>
                </main>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
   
    
</template>

<script>
import Pagination from "vue-pagination-2";
import moment from "moment";



export default {
    name: "invest_details",
    components: {
        Pagination,
    },
    data() {
        return {
            url: process.env.mix_api_url,
            history: [],
            page: 1,
            records: 0,
            paginate: 0,
            per_page:5
        };
    },
    created() {
        this.invest_details();
    },

    methods: {
        moment(date) {
            return moment(date);
        },
        invest_details() {
            axios
                .post(this.url + "api/invest_details?page=" + this.page, {
                    token: localStorage.token,
                })
                .then((res) => {
                    console.log(res);
                    this.history = res.data.data;
                    this.page = res.data.current_page;
                    this.records = res.data.total;
                    this.paginate = res.data;
                    this.per_page = res.data.per_page;
                })
                .catch((err) => {
                    console.log(err);
                });
        },
    },
};
</script>
