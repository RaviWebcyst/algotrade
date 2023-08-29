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
                            <div class="text-center text-white fw-medium">Notifications</div>
                        </div>
                        <div class="col-2"></div>
                    </div>
                    <div class="mx-3 mt-3">

                        <div class="table-responsive">
                            <table class="table table-dark table-hover">
                                <thead>
                                    <tr>
                                        <th class="bg-main">Sr.</th>
                                        <th class="bg-main">Symbol</th>
                                        <th class="bg-main" style="min-width:150px;">Open Time</th>
                                        <th class="bg-main" style="min-width:150px;">Close Time</th>
                                        <th class="bg-main" style="min-width:150px;">Date</th>
                                    </tr>
                                </thead>
                                <tbody
                                        v-if="history.length > 0"
                                        class="tbody"
                                    >
                                        <tr v-for="(his, i) in history">
                                            <td class="p-3">{{ i + paginate.from }}</td>
                                            <td class="p-3">{{ his.symbol }}USDT</td>
                                            <td class="p-3">{{ his.open_time }}</td>
                                            <td class="p-3">{{ his.close_time }}</td>
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
                            <pagination v-model="page" :records="records" @paginate="get_notifies" :per-page="per_page" />

                        </div>
                    </div>
                </main>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
   
</template>

<script>
import Pagination  from 'vue-pagination-2';
import moment  from "moment";
import Header from './header.vue';
import sidebar from './sidebar.vue';


export default {
  name: "notifications",
  components: {
      Pagination,
      Header,
      sidebar
  },
  data() {
      return {
          url: process.env.mix_api_url,
          history:[],
          page:1,
          records:0,
          paginate:0,
          per_page:5
      };
  },
  created() {
      this.get_notifies();
  },

  methods: {
      moment(date) {
          return moment(date);
      },
      get_notifies(){
          axios.post(this.url+"api/notifications?page="+this.page,{
                  token:localStorage.token
          }).then(res=>{
              this.history = res.data.history.data;
              this.page = res.data.history.current_page;
              this.records = res.data.history.total;
              this.paginate = res.data.history;
          }).catch(err=>{
              console.log(err);
          });
      }
  },
};
</script>