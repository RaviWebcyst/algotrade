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
                            <div class="text-center text-white fw-medium">Tickets</div>
                        </div>
                        <div class="col-2"></div>
                    </div>
                    <div class="mx-3 mt-3">
                        <div class="table-responsive">
                            <table class="table table-dark table-hover">
                                <thead>
                                    <tr>
                                        <th class="bg-main">#</th>
                                        <th class="bg-main">Topic</th>
                                        <th class="bg-main">Subject</th>
                                        <th class="bg-main">Screenshot</th>
                                        <th class="bg-main">Message</th>
                                        <th class="bg-main">Status</th>
                                        <th class="bg-main">Date</th>
                                        <th class="bg-main">Action</th>
                                </tr>
                                </thead>
                                <tbody v-if="tickets.length > 0" class="tbody">
                                    <tr v-for="(ticket,i) in tickets">
                                        <td class="p-3">{{ i + 1 }}</td>
                                        <td class="p-3">
                                            {{ ticket.topic }}
                                        </td>
                                        <td class="p-3">
                                            {{ ticket.subject }}
                                        </td>
                                        <td class="p-3">
                                            <a v-if="ticket.image != null" :href="url+'uploads/'+ticket.image">
                                            <img :src="url+'uploads/'+ticket.image" width="50"> 
                                            </a>
                                        </td>
                                        <td class="p-3">
                                            {{ ticket.message }}
                                        </td>
                                        <td class="p-3">
                                            {{ ticket.status }}
                                        </td>
                                        <td class="p-3">
                                            {{ new Date(ticket.updated_at).toLocaleString() }}
                                        </td>
                                        <td class="p-3">
                                            <router-link :to="{name:'chat',params:{id:ticket.id}}" class="btn btn-sm btn-info mt-3" >Chat</router-link>
                                        </td>
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
import Header from "./header.vue";
import Sidebar from "./sidebar.vue";
export default {
    components: {
        Header,
        Sidebar,
    },

    data() {
        return {
            name: "",
            email: "",
            phone: "",
            userid: "",
            spid: "",
            tickets: [],
            url: process.env.mix_api_url,
        };
    },

    created() {
        this.recent_tickets();
    },
    methods: {
        recent_tickets(){
            axios
            .get(this.url + "api/recent_tickets", {
                params: {
                    token: localStorage.token,
                },
            })
            .then((res) => {
                console.log(res);
                this.tickets = res.data;
            })
            .catch((err) => {
                console.log(err);
            });
        },
       
    },
};
</script>
<style lang=""></style>
