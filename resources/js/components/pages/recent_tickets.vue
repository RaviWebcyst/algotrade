<template >
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
                            <div class="text-center text-white fw-medium">Recent Tickets</div>
                        </div>
                        <div class="col-2"></div>
                    </div>
                    <div class="mx-3 mt-3">
                        <div class="table-responsive">
                            <table class="table table-dark table-hover">
                                <thead>
                                    <tr>
                                        <th class="bg-main">S.No</th>
                                        <th class="bg-main">Departments</th>
                                        <th class="bg-main">Email</th>
                                        <th class="bg-main">Message</th>
                                        <th class="bg-main">Status</th>
                                        <th class="bg-main">Last Updated</th>
                                </tr>
                                </thead>
                                <tbody v-if="tickets.length > 0" class="tbody">
                                    <tr v-for="(ticket,i) in tickets">
                                    <td class="p-3" >{{i+1}}</td>
                                    <td class="p-3">{{ticket.topic}}</td>
                                    <td class="p-3">{{ticket.email}}</td>
                                    <td class="p-3">{{ticket.message}}</td>
                                    <td class="p-3">{{ticket.status}}</td>
                                    <td class="p-3">{{moment(ticket.updated_at).format('DD-MM-YYYY, hh:mm A')}}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- <pagination v-model="page" :records="records" @paginate="invest_details" :per-page="per_page" /> -->

                        </div>
                    </div>
                </main>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
</template>

<script>


import moment from "moment";
export default {
    data() {
        return {
            name: "",
            email: "",
            phone: "",
            userid: "",
            spid: "",
            tickets:[],
            url:process.env.mix_api_url
        }
    },

    created() {
        this.tickets();
    },

    methods: {
        moment(date) {
              return moment(date);
          },
        createTicket(){
            localStorage.setItem("path", "createTicket");
            this.$router.push({name:"createTicket"});
        },
        chat(){
            localStorage.setItem("path","chat");
            this.$router.push({name:"chat",params:{id:this.userid}});
        },
        tickets(){
            axios.get(this.url+"api/resolved_tickets",{
                  headers: {
                    Authorization: `Bearer ${localStorage.usertoken}`
                },
                params:{
                    token:localStorage.usertoken,
                },
            }).then(res=>{
                console.log(res);
                this.tickets = res.data;
            }).catch(err=>{
                console.log(err);
            });
        }
    }

}
</script>
<style lang="">

</style>
