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
                            <div class="text-center text-white fw-medium">Teams</div>
                        </div>
                        <div class="col-2"></div>
                    </div>
                    <div class="mx-3 mt-3">

                        <div class="accordion accordion-flush" id="accordionFlushExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed border-bottom  border-top border-1 border-dark bg-warning" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                Level 1 Team
                            </button>
                            <div class="px-4 py-3 bg-cstm1">
                            <div class="row">
                                <div class="col-4 text-center">
                                    <div class="fs-6">{{ teams1.length }}</div>
                                    <div class="fs-6">Total Member</div>
                                </div>
                                <div class="col-4 text-center">
                                    <div class="fs-6">0</div>
                                    <div class="fs-6">Recharge Amount</div>
                                </div>
                                <div class="col-4 text-center">
                                    <div class="fs-6">0</div>
                                    <div class="fs-6">Withdrawal Amount</div>
                                </div>
                            </div>
                            </div>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body bg-dark text-white">

                                <div v-if="teams1.length > 0" v-for="team in teams1" class="py-3">
                                <div class="row">
                                    <div class="col-6">
                                        <div>{{ team.name }}</div>
                                    </div>
                                    <div class="col-6 d-flex justify-content-end">
                                        <div>ID:{{ team.user_id }}</div>
                                    </div>
                                </div>
                                <div class="row py-2">
                                <div class="col-3 text-center">
                                    <div class="fs-6">Recharge Amount</div>
                                    <div class="fs-6">0</div>
                                </div>
                                <div class="col-4 text-center ps-4">
                                    <div class="fs-6">Withdraw Amount</div>
                                    <div class="fs-6">0</div>
                                </div>
                                <div class="col-5 text-center">
                                    <div class="fs-6">Register Date</div>
                                    <div class="fs-6"> {{moment(team.created_at).format("DD-MM-YYYY, hh:mm:ss A" )}}</div>
                                </div>
                            </div>
                            </div>
                            </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingTwo">
                            <button class="accordion-button collapsed border-bottom  border-top border-1 border-dark bg-warning" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                            Level 2 Team
                            </button>
                            <div class="px-4 py-3 bg-cstm1">
                            <div class="row">
                                <div class="col-4 text-center">
                                    <div class="fs-6">{{ teams2.length }}</div>
                                    <div class="fs-6">Total Member</div>
                                </div>
                                <div class="col-4 text-center">
                                    <div class="fs-6">0</div>
                                    <div class="fs-6">Recharge Amount</div>
                                </div>
                                <div class="col-4 text-center">
                                    <div class="fs-6">0</div>
                                    <div class="fs-6">Withdrawal Amount</div>
                                </div>
                            </div>
                            </div>
                            </h2>
                            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body bg-dark text-white">
                                <div v-if="teams2.length > 0" v-for="team in teams2" class="py-3">
                                <div class="row">
                                    <div class="col-6">
                                        <div>{{ team.name }}</div>
                                    </div>
                                    <div class="col-6 d-flex justify-content-end">
                                        <div>ID:{{ team.user_id }}</div>
                                    </div>
                                </div>
                                <div class="row py-2">
                                <div class="col-3 text-center">
                                    <div class="fs-6">Recharge Amount</div>
                                    <div class="fs-6">0</div>
                                </div>
                                <div class="col-4 text-center ps-4">
                                    <div class="fs-6">Withdraw Amount</div>
                                    <div class="fs-6">0</div>
                                </div>
                                <div class="col-5 text-center">
                                    <div class="fs-6">Register Date</div>
                                    <div class="fs-6"> {{moment(team.created_at).format("DD-MM-YYYY, hh:mm:ss A" )}}</div>
                                </div>
                            </div>
                            </div>
                            </div>
                            </div>
                        </div>
                        <div class="accordion-item ">
                            <h2 class="accordion-header" id="flush-headingThree">
                            <button class="accordion-button collapsed border-bottom  border-top border-1 border-dark bg-warning" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                Level 3 Team
                            </button>
                            <div class="px-4 py-3 bg-cstm1">
                            <div class="row">
                                <div class="col-4 text-center">
                                    <div class="fs-6">{{ teams3.length }}</div>
                                    <div class="fs-6">Total Member</div>
                                </div>
                                <div class="col-4 text-center">
                                    <div class="fs-6">0</div>
                                    <div class="fs-6">Recharge Amount</div>
                                </div>
                                <div class="col-4 text-center">
                                    <div class="fs-6">0</div>
                                    <div class="fs-6">Withdrawal Amount</div>
                                </div>
                            </div>
                            </div>
                            </h2>
                            <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body bg-dark text-white">
                                <div v-if="teams3.length > 0" v-for="team in teams3" class="py-3">
                                <div class="row">
                                    <div class="col-6">
                                        <div>{{ team.name }}</div>
                                    </div>
                                    <div class="col-6 d-flex justify-content-end">
                                        <div>ID:{{ team.user_id }}</div>
                                    </div>
                                </div>
                                <div class="row py-2">
                                <div class="col-3 text-center">
                                    <div class="fs-6">Recharge Amount</div>
                                    <div class="fs-6">0</div>
                                </div>
                                <div class="col-4 text-center ps-4">
                                    <div class="fs-6">Withdraw Amount</div>
                                    <div class="fs-6">0</div>
                                </div>
                                <div class="col-5 text-center">
                                    <div class="fs-6">Register Date</div>
                                    <div class="fs-6"> {{moment(team.created_at).format("DD-MM-YYYY, hh:mm:ss A" )}}</div>
                                </div>
                            </div>
                            </div>
                            </div>
                            </div>
                        </div>
                        <div class="accordion-item ">
                            <h2 class="accordion-header" id="flush-headingFour">
                            <button class="accordion-button collapsed border-bottom  border-top border-1 border-dark bg-warning" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                                Level 4 Team
                            </button>
                            <div class="px-4 py-3 bg-cstm1">
                            <div class="row">
                                <div class="col-4 text-center">
                                    <div class="fs-6">{{ teams4.length }}</div>
                                    <div class="fs-6">Total Member</div>
                                </div>
                                <div class="col-4 text-center">
                                    <div class="fs-6">0</div>
                                    <div class="fs-6">Recharge Amount</div>
                                </div>
                                <div class="col-4 text-center">
                                    <div class="fs-6">0</div>
                                    <div class="fs-6">Withdrawal Amount</div>
                                </div>
                            </div>
                            </div>
                            </h2>
                            <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body bg-dark text-white" >
                                <div v-if="teams4.length > 0" v-for="team in teams4" class="py-3">
                                <div class="row">
                                    <div class="col-6">
                                        <div>{{ team.name }}</div>
                                    </div>
                                    <div class="col-6 d-flex justify-content-end">
                                        <div>ID:{{ team.user_id }}</div>
                                    </div>
                                </div>
                                <div class="row py-2">
                                <div class="col-3 text-center">
                                    <div class="fs-6">Recharge Amount</div>
                                    <div class="fs-6">0</div>
                                </div>
                                <div class="col-4 text-center ps-4">
                                    <div class="fs-6">Withdraw Amount</div>
                                    <div class="fs-6">0</div>
                                </div>
                                <div class="col-5 text-center">
                                    <div class="fs-6">Register Date</div>
                                    <div class="fs-6"> {{moment(team.created_at).format("DD-MM-YYYY, hh:mm:ss A" )}}</div>
                                </div>
                            </div>
                            </div>
                            </div>
                            </div>
                        </div>
                        <div class="accordion-item ">
                            <h2 class="accordion-header" id="flush-headingFive">
                            <button class="accordion-button collapsed border-bottom  border-top border-1 border-dark bg-warning" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
                                Level 5 Team
                            </button>
                            <div class="px-4 py-3 bg-cstm1">
                            <div class="row">
                                <div class="col-4 text-center">
                                    <div class="fs-6">{{ teams5.length }}</div>
                                    <div class="fs-6">Total Member</div>
                                </div>
                                <div class="col-4 text-center">
                                    <div class="fs-6">0</div>
                                    <div class="fs-6">Recharge Amount</div>
                                </div>
                                <div class="col-4 text-center">
                                    <div class="fs-6">0</div>
                                    <div class="fs-6">Withdrawal Amount</div>
                                </div>
                            </div>
                            </div>
                            </h2>
                            <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body bg-dark text-white">
                                <div v-if="teams5.length > 0" v-for="team in teams5" class="py-3">
                                <div class="row">
                                    <div class="col-6">
                                        <div>{{ team.name }}</div>
                                    </div>
                                    <div class="col-6 d-flex justify-content-end">
                                        <div>ID:{{ team.user_id }}</div>
                                    </div>
                                </div>
                                <div class="row py-2">
                                <div class="col-3 text-center">
                                    <div class="fs-6">Recharge Amount</div>
                                    <div class="fs-6">0</div>
                                </div>
                                <div class="col-4 text-center ps-4">
                                    <div class="fs-6">Withdraw Amount</div>
                                    <div class="fs-6">0</div>
                                </div>
                                <div class="col-5 text-center">
                                    <div class="fs-6">Register Date</div>
                                    <div class="fs-6"> {{moment(team.created_at).format("DD-MM-YYYY, hh:mm:ss A" )}}</div>
                                </div>
                            </div>
                            </div>
                            </div>
                            </div>
                        </div>
                        </div>

                        <!-- <ul class="nav nav-pills mx-3 my-2">
                        <li class="nav-item">
                            <a class="nav-link active cstm-size" aria-current="page" href="#">All</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link cstm-size"  href="#" >Lv.1</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link cstm-size" href="#">Lv.2</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link cstm-size" href="#">Lv.3</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link cstm-size" href="#">Lv.4</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link cstm-size" href="#">Lv.5</a>
                        </li>
                    </ul>

                        <div class="table-responsive">
                            <table class="table table-dark table-hover">
                                <thead>
                                    <tr>
                                        <th class="bg-main">#</th>
                                        <th class="bg-main">Level</th>
                                        <th class="bg-main">Name</th>
                                        <th class="bg-main">UID</th>
                                        <th class="bg-main">SPID</th>
                                        <th class="bg-main">Topup Amount</th>
                                        <th class="bg-main">Date Time</th>
                                    </tr>
                                </thead>
                                <tbody v-if="users.length > 0" class="tbody">
                                    <tr v-for="(user, i) in users">
                                        <td class="p-3">{{ i + paginate.from }}</td>
                                            <td class="p-3">{{ user.level }}</td>
                                            <td class="p-3">{{ user.name }}</td>
                                            <td class="p-3">{{ user.user_id }}</td>
                                            <td class="p-3">{{ user.spid }}</td>
                                            <td class="p-3">{{ user.package_amount }}</td>
                                            <td class="p-3">
                                                {{
                                                    moment(
                                                        user.created_at
                                                    ).format(
                                                        "DD-MM-YYYY, hh:mm:ss A"
                                                    )
                                                }}
                                            </td>
                                    </tr>
                                </tbody>
                            </table>
                            <pagination v-model="page" :records="records" @paginate="teams" :per-page="per_page" />

                        </div> -->
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
                            <h4 class="my-3">Team Referrals</h4>
                            <div class="col-md-2">
                            <select v-model="level" class="form-control my-3" @change="teams">
                                <option value="" disabled  selected>Select Level</option>
                                <option value="">All</option>
                                <option value="1">Level 1</option>
                                <option value="2">Level 2</option>
                                <option value="3">Level 3</option>
                                <option value="4">Level 4</option>
                                <option value="5">Level 5</option>
                            </select>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-borderless">
                                    <thead >
                                        <tr class="first">
                                            <th>#</th>
                                            <th>Level</th>
                                            <th>Name</th>
                                            <th>UID</th>
                                            <th>SPID</th>
                                            <th>Topup Amount</th>
                                            <th>Date Time</th>
                                        </tr>
                                    </thead>
                                    <tbody v-if="users.length > 0" class="tbody">
                                        <tr v-for="(user, i) in users">
                                            <td>{{ i + paginate.from }}</td>
                                            <td>{{ user.level }}</td>
                                            <td>{{ user.name }}</td>
                                            <td>{{ user.user_id }}</td>
                                            <td>{{ user.spid }}</td>
                                            <td>{{ user.package_amount }}</td>
                                            <td>
                                                {{
                                                    moment(
                                                        user.created_at
                                                    ).format(
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
                                    @paginate="teams"
                                    :per-page="per_page"
                                />
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
    name: "team",
    components: {
        Pagination,
        Header,
        sidebar
    },
    data() {
        return {
            url: process.env.mix_api_url,
            users: [],
            page: 1,
            records: 0,
            paginate: 0,
            per_page:5,
            level:"",
            teams1:[],
            teams2:[],
            teams3:[],
            teams4:[],
            teams5:[],
        };
    },
    created() {
        this.teams();
        console.log(this.teams1.length);
    },

    methods: {
        moment(date) {
            return moment(date);
        },
        teams() {
            axios
                .post(this.url + "api/team_members?page="+this.page, {
                    token: localStorage.token,
                    level:this.level
                })
                .then((res) => {
                    // this.users = res.data.teams.data;
                    // this.page = res.data.teams.current_page;
                    // this.records = res.data.teams.total;
                    // this.paginate = res.data.teams;
                    // this.per_page = res.data.teams.per_page;
                    this.teams1 = res.data.teams1;
                    this.teams2 = res.data.teams2;
                    this.teams3 = res.data.teams3;
                    this.teams4 = res.data.teams4;
                    this.teams5 = res.data.teams5;
                })
                .catch((err) => {
                    console.log(err);
                });
        },
    },
};
</script>
