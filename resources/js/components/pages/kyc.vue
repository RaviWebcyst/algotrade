<template>
    <div class="">
        <Header />
        <Sidebar />
        <div class="content-wrapper content-wrapper2">
            <div class="position-fixed bottom-0 right-0 p-3" style="z-index: 999">
                <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true" :class="toast">
                    <div class="toast-header text-white" :class="text == 'Success' ? 'bg-success' : 'bg-danger'">
                        <strong class="me-auto">{{ text }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body text-dark">
                        {{ message }}
                    </div>
                </div>
            </div>
            <section class="content1 mt-5 space">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8   mx-auto px-4  ">
                            <div v-if="kycs">
                                <div class="alert alert-info">{{ kycs.status }}</div>
                            </div>
                            <div class="card bg-dark-purple">
                                <h3 class=" text-center text-dark py-3 withdraw-btn">Kyc</h3>
                                <div class="card-body">
                                   
                                    <form @submit.prevent="kyc">
                                        <div class="row">
                                           <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="" class="text-white "> Aadhar Card No.</label>
                                            <input type="text" class="form-control bg-transparent text-white withdraw-border"
                                                placeholder="Aadhar no." v-model="form.aadhar" required>
                                        </div>
                                        </div>
                                        <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="" class="text-white "> Pan Card No.</label>
                                            <input type="text" class="form-control bg-transparent text-white withdraw-border"
                                                placeholder="Pan no." v-model="form.pan" required>
                                        </div>
                                        </div>
                                        </div>
                                        <div class="row">
                                        

                                        <div class="col-md-4 cstm-margin ">
                                        <div class="form-group">
                                            <input type="file" id="file" class="form-control bg-transparent text-white withdraw-border inputFile"
                                            @change="aadhar1" required>
                                            <label for="file" class=""><i class="fa fa-upload pr-2 font-icon"></i>Aadhar Front</label>
                                        </div>
                                            <img id="blah"  src="" alt="your image" width="50" :class="file1" />
                                        </div>
                                        <div class="col-md-4 cstm-margin ">
                                        <div class="form-group">
                                            <input type="file" id="file1" class="form-control bg-transparent text-white withdraw-border inputFile"
                                            @change="aadhar2" required>
                                            <label for="file1" class=""><i class="fa fa-upload pr-2 font-icon"></i>Aadhar Back</label>
                                        </div>
                                        </div>
                                        <div class="col-md-4 cstm-margin ">
                                        <div class="form-group">
                                            <input type="file" id="file3" class="form-control bg-transparent text-white withdraw-border inputFile"
                                            @change="pancard" required>
                                            <label for="file3" class=""><i class="fa fa-upload pr-2 font-icon"></i> Pan Card</label>
                                        </div>
                                        </div>
                                        </div>
                                        <button class="btn btn-info_cstm" type="submit" :class="kycs && kycs.status !='reject'?'d-none':''" :disabled="disable">Submit</button>
                                        

                                    </form>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    

                </div>
            </section>
        </div>

      
    </div>
</template>

<script>
import carousel from "vue-owl-carousel";
import Header from "./header.vue";
import Sidebar from "./sidebar.vue";
export default {
    name: "kyc",
    components: {
        Header,
        carousel,
        Sidebar,
    },
    data() {
        return {
            disable:false,
            user: {},
            url: process.env.mix_api_url,
            balance: 0,
            user: {},
            text: "",
            toast: "",
            message: "",
            kycs:false,
            form: {
                aadhar: "",
                pan: "",
                aadhar_front: "",
                aadhar_back: "",
                pan_image: "",
            },
            file1:"d-none"
        };
    },
    created() {
        this.userDetails();
    },

    methods: {
        pancard(e){
            this.form.pan_image = e.target.files[0];
        },
        aadhar1(e){
            this.form.aadhar_front = e.target.files[0];
            const [file] = e.target.files[0].files;
              console.log("file",file);
            var blah = document.getElementById('blah');
            if (file) {
                blah.src = URL.createObjectURL(file);
                this.file1="";
            }
        },
        aadhar2(e){
            this.form.aadhar_back = e.target.files[0];
        },
        userDetails() {
            axios
                .post(this.url + "api/getUserDetails", {
                    token: localStorage.token,
                })
                .then((res) => {
                    this.balance = Number(res.data.balance).toFixed(3);
                    this.kycs  = res.data.kyc;
                })
                .catch((err) => {
                    console.log(err);
                });
        },
        kyc() {
            this.disable = true;
            var form = new FormData();
            form.append("aadhar", this.form.aadhar);
            form.append("pan", this.form.pan);
            form.append("token", localStorage.token);
            form.append("aadhar_front", this.form.aadhar_front);
            form.append("aadhar_back", this.form.aadhar_back);
            form.append("pan_image", this.form.pan_image);

            axios
                .post(this.url + "api/store_kyc", form)
                .then((res) => {
                    console.log(res);
                    this.$toaster.success(res.data.message);
                    this.userDetails();
                    this.disable = false;
                    this.form = {};
                })
                .catch((err) => {
                    console.log(err);
                    var message = err.response.data.message;
                    this.$toaster.error(message);
                    this.disable = false;
                });
        },
    },
};
</script>
