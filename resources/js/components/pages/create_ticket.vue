<template >
    <div>
        <Header />
        <sidebar />
    
        <div class="content-body" style="min-height: 920px;">
            <div class="container-fluid">
				 
                <!-- row -->
                <div class="row">
                
					<div class="col-xl-6 col-lg-6 mx-auto">
                        <div class="card card-primary ">
                            <div class="card-header bg-primary">
                                <h5 class="text-white"><a href="javascript:;" @click="$router.go(-1)"><i class="fas fa-arrow-left pr-3"></i></a> Create Ticket If you have any Enquiry</h5>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form class="form">
                                        <div class="box-body">
                                            <!-- <h4 class="box-title text-info mb-0 mt-20"><i class="ti-envelope me-15"></i> Create
                                                Ticket If you have any Enquiry</h4>
                                            <hr class="my-15"> -->
        
                                            <label class=" text-white"> Select Topic</label>
                                            <div class="form-group">
                                                <select name="topic" class="form-control" v-model="form.topic" style="padding: 6px 16px;">
                                                    <option value="" selected disabled>Select Topic</option>
                                                    <option value="General">General</option>
                                                    <option value="Tech Support">Tech Support</option>
                                                    <option value="Enquires">Enquires</option>
                                                    <option value="Account">Account</option>
                                                    <option value="Other">Other</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class=" text-white ">Email</label>
                                                <input class="form-control" type="text" placeholder="Enter Your Valid Email"
                                                    v-model="form.email">
                                            </div>
                                            <div class="form-group">
                                                <label class=" text-white">subject</label>
                                                <input class="form-control" type="text" placeholder="Enter Your Subject"
                                                    v-model="form.subject">
                                            </div>
                                            <div class="form-group">
                                                <label class=" text-white">Screenshot</label>
                                                <input class="form-control" type="file" @change="uploadFile">
                                            </div>
                                            <div class="form-group">
                                                <label class=" text-white">Message</label>
        
                                                <textarea class="form-control" name="message" rows="3"
                                                    placeholder="Enter Your Message" v-model="form.message"></textarea>
                                            </div>
        
                                        </div>
                                        <!-- /.box-body -->
                                        <div class="box-footer text-end">
        
                                            <button type="button" class="btn btn-primary ready-btn contact-btn coin-btn"
                                                @click="message">
                                                Submit
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
					</div>
					 
                </div>
				<!--**********************************
					Footer start
				***********************************-->
				 
				<!--**********************************
					Footer end
				***********************************-->
            </div>
			<!-- Modal -->
				 
			<!-- /Modal -->	
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
            form: {
                topic: "",
                email: "",
                subject: "",
                message: "",
                image:""
            },
            success: "",
            url: process.env.mix_api_url
        }
    },

    methods: {
        uploadFile(e){
            this.form.image=e.target.files[0];
        },
        message() {
            var form  = new FormData();
            form.append("image",this.form.image);
            form.append("email",this.form.email);
            form.append("subject",this.form.subject);
            form.append("message",this.form.message);
            form.append("topic",this.form.topic);
            form.append("token",localStorage.token);

            axios.post(this.url + "api/send_message",form).then(res => {
                    this.$toaster.success(res.data.message);
                    console.log(res);
                    this.form.topic = "";
                    this.form.email = "";
                    this.form.subject = "";
                    this.form.message = "";
                    this.form.image="";
                }).catch(err => {
                    this.$toaster.error(err.response.data.message);
                    console.log(err);
                })
        }
    }




}
</script>

