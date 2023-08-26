<template >
  <div class="wrapper">
        <Header />
        <sidebar />
        <div class="content-wrapper content-wrapper2">
            <div class="container">
				 
                <!-- row -->
                <div class="row">
					<div class="col-xl-6 col-lg-6 mx-auto">
                        <div class="card card-primary">
                            <div class="card-header bg-primary">
                                <h4 class="card-title">Chat</h4>
                            </div>
                            <div class="card-body px-2">
                                <div class="basic-form">
                                    <form id="contactForm"  class="contact-form">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 mb-3 pb-5 px-5">

                                              <div class="mb-3 border border-primary rounded p-3 h-50  chat py-4" style="overflow:scroll">
                                                  <div v-for="chat in chats">
                                                      <div :class="chat.sender == 'admin' ? 'justify-content-start' : 'justify-content-end'"
                                                          class="d-flex flex-row">
                                                          <div :class="chat.sender == 'admin' ? 'bg-light text-dark' : 'bg-primary text-white'"
                                                              class="mt-1 mb-1 rounded-3 p-2">{{ chat.message }}</div>
                                                      </div>
                                                  </div>
                                              </div>
                                              <label class="form-label text-white">Message</label>
                                              <div class="form-group">
                                                  <textarea class="form-control cstmmm" name="message" rows="3"
                                                      placeholder="Enter Your Message" v-model="form.message"></textarea>
                                              </div>
                                              <button type="button" class="btn btn-primary btn-sm float-end mt-2 mb-0 ml-2"
                                                  @click="message">Send Message</button>
                                        </div>
                                          </div>
                                    </form>
                                </div>
                            </div>
                        </div>
					</div>
					 
                </div>
		
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
                message: "",
                id: this.$route.params.id
            },
            success: "",
            chats: [],
            url:process.env.mix_api_url
        }
    },
    created() {
      this.chatss();
    },

    methods: {
      chatss(){
          axios.get(this.url+"api/chats", {
              params: {
                  id: this.form.id,
                  token:localStorage.usertoken,
              }
          }).then(res => {
              console.log(res);
              this.chats = res.data;
          }).catch(err => {
              console.log(err);
          });
        },
          message() {
            axios.post(this.url+"api/chat", {
                message: this.form.message,
                id: this.form.id,
                token:localStorage.token,
            }).then(res => {
                    this.chatss();
                    this.form.message = "";
                    this.$toaster.success(res.data.message);

                }).catch(err => {
                    this.$toaster.success(err.response.data.message);
                })
        }
    }




}
</script>


