<template>
    <div class="wrapper">
        <header />
        <sidebar />
        <div class="content-wrapper content-wrapper2">
            <section class="content mt-5">
                <div class="container">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="my-3"><a href="javascript:;" @click="$router.go(-1)"><i class="fas fa-arrow-left pr-3"></i></a> Payment History</h4>
                             <div class="table-responsive p-3 card">
                               <table class="table border-warning text-white">
                                 <thead class="text-white ">
                                     <tr>
                                         <th>#</th>
                                         <th>Payment Id</th>
                                         <th>Merchant Id</th>
                                         <th>Address</th>
                                         <th>Payment Link</th>
                                         <th>Paid Amount $</th>
                                         <th>Recieved Amount $</th>
                                         <th>Status $</th>
                                         <th>Date & Time</th>
                                     </tr>
                                 </thead>
                                 <tbody v-if="history.length > 0">
                                     <tr v-for="(his, i) in history">
                                         <td>{{ i + paginate.from }}</td>
                                         <td>{{ his.request_id }}</td>
                                         <td>{{ his.merchant_id }}</td>
                                         <td>{{ his.address }}</td>
                                         <td>{{ his.link }}</td>
                                         <td>${{ his.amount }}</td>
                                         <td>{{ his.bnb_amount }}</td>
                                         <td>{{ his.status }}</td>
                                         <td>{{ moment(his.created_at).format('DD-MM-YYYY, hh:mm:ss A') }}</td>
                                     </tr>
                                 </tbody>
                             </table>
                                 <pagination v-model="page" :records="records" @paginate="history" :per-page="per_page" />
                             </div>
                         </div>
                     </div>
 
                 </div>
             </section>
         </div>
         
     </div>
     
 </template>
 
 <script>
 import Pagination from 'vue-pagination-2';
 import moment from "moment";
 
 import header from './header.vue';
 import Sidebar from './sidebar.vue';
 
 export default {
     name: "payments",
     components: {
         Pagination,
         header,
         Sidebar,
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
         this.deposit_history();
     },
 
     methods: {
         moment(date) {
             return moment(date);
         },
         deposit_history() {
             axios.post(this.url + "api/payment_history?page="+this.page, {
                 token: localStorage.token
             }).then(res => {
                 this.history = res.data.history.data;
                 this.page = res.data.history.current_page;
                 this.records = res.data.history.total;
                 this.paginate = res.data.history;
                 this.per_page = res.data.history.per_page;
             }).catch(err => {
                 console.log(err);
             });
         }
     },
 };
 </script>