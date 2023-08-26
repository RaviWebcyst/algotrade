<template>
  <div class="wrapper">
      <Header />
      <sidebar />
      <div class="content-wrapper content-wrapper2">
          <section class="content mt-5">
              <div class="container">
                  <div class="card">
                      <div class="card-body">
                      <h4 class="my-3"><a href="javascript:;" @click="$router.go(-1)"><i class="fas fa-arrow-left pr-3"></i></a> Transactions History</h4>
                      <div class="table-responsive">
                          <table class="table table-borderless">
                              <thead class="text-white">
                                  <tr class="first">
                                      <th>#</th>
                                      <th>Amount $</th>
                                      <th>Description</th>
                                      <th>Date & Time</th>
                                  </tr>
                              </thead>
                              <tbody v-if="history.length > 0" class="tbody">
                                  <tr v-for="(his, i) in history">
                                      <td>{{ i + paginate.from }}</td>
                                      <td>${{ his.amount }}</td>
                                      <td>{{ his.description }}</td>
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
                          <pagination v-model="page" :records="records" @paginate="deposit_history" :per-page="per_page" />
                      </div>
                      </div>
                  </div>
              </div>
          </section>
      </div>
  </div>

  <!-- <div class="container  head_container">
      <Header />
      <section class="mt-cstm">
      <div class="col-md-10 mx-auto pt-5 px-2">
          <div class="card bg-dark-purple">
      <div class="card-body">
          <h3 class="text-warning text-center py-3">Deposit History</h3>
          <div class="table-responsive">
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
                      <tr v-for="(his,i) in history">
                          <td>{{ i+1 }}</td>
                          <td>${{ his.amount }}</td>
                          <td>{{ his.description }}</td>
                          <td>{{ moment(his.created_at).format('DD-MM-YYYY, hh:mm:ss A') }}</td>
                      </tr>
                  </tbody>
              </table>
              <pagination v-model="page" :records="records" @paginate="history" />
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
import sidebar from "./sidebar.vue";

export default {
  name: "transactions",
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
          type:"",
          trans:"",
          per_page:5
      };
  },
  created() {
      if(this.$route.query.type){
          this.type = this.$route.query.type;
        }
      if(this.$route.query.trans){
          this.trans = this.$route.query.trans;
        }
        this.deposit_history();
    },

  methods: {
      moment(date) {
          return moment(date);
      },
      deposit_history() {
          axios
              .post(this.url + "api/transactions?page="+this.page, {
                  token: localStorage.token,
                  type:this.type,
                  trans:this.trans,
              })
              .then((res) => {
                  this.history = res.data.wallets.data;
                  this.page = res.data.wallets.current_page;
                  this.records = res.data.wallets.total;
                  this.paginate = res.data.wallets;
                  this.per_page = res.data.wallets.per_page;
              })
              .catch((err) => {
                  console.log(err);
              });
      },
  },
};
</script>
