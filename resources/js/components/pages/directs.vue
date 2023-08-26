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
                            <div class="text-center text-white fw-medium">Direct Commission</div>
                        </div>
                        <div class="col-2"></div>
                    </div>
                    <div class="mx-3 mt-3">
                        <div class="table-responsive">
                            <table class="table table-dark table-hover">
                                <thead>
                                    <tr>
                                        <th class="bg-main" >#</th>
                                        <th class="bg-main">Name</th>
                                        <th class="bg-main">Phone</th>
                                        <th class="bg-main">UID</th>
                                        <!-- <th class="bg-main">Top Up Amount</th> -->
                                        <th class="bg-main" style="min-width: 130px;">Status</th>
                                        <th class="bg-main" style="min-width: 150px;">Date Time</th>
                                    </tr>
                                </thead>
                                <tbody v-if="users.length > 0" class="tbody">
                                    <tr v-for="(user, i) in users">
                                        <td class="p-3">{{ i + paginate.from }}</td>
                                        <td class="p-3">{{ user.name }}</td>
                                        <td class="p-3">{{ user.phone }}</td>
                                        <td class="p-3">{{ user.uid }}</td>
                                        <!-- <td class="p-3">{{ user.package_amount }}</td> -->
                                        <td class="p-3">{{ user.enable == 1 ? 'Active':'Not Active' }}</td>
                                        <td class="p-3">
                                            {{
                                                moment(user.created_at).format(
                                                    "DD-MM-YYYY, hh:mm:ss A"
                                                )
                                            }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <pagination v-model="page" :records="records" @paginate="direct_members" :per-page="per_page" />

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
import Header from "./header.vue";
import sidebar from "./sidebar.vue";

export default {
    name: "directs",
    components: {
        Pagination,
        Header,
        sidebar,
    },
    data() {
        return {
            url: process.env.mix_api_url,
            users: [],
            page: 1,
            records: 0,
            paginate: 0,
            per_page:5
        };
    },
    created() {
        this.direct_members();
    },

    methods: {
        moment(date) {
            return moment(date);
        },
        direct_members() {
            axios
                .post(this.url + "api/direct_members?page="+this.page, {
                    token: localStorage.token,
                })
                .then((res) => {
                    this.users = res.data.users.data;
                    this.page = res.data.users.current_page;
                    this.records = res.data.users.total;
                    this.paginate = res.data.users;
                    this.per_page = res.data.users.per_page;
                })
                .catch((err) => {
                    console.log(err);
                });
        },
    },
};
</script>
