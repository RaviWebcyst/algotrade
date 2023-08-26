<template>

<div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4 p-0">
                <main class="flex-shrink-0 main-content">
                    <div class="header-main row align-items-center p-4 sticky-top m-0">
                        <div class="col-3">
                            <a href="#" class="text-decoration-none text-white" @click="$router.go(-1)"><i
                                    class="ri-arrow-left-line fs-2"></i></a>
                        </div>
                        <div class="col text-center">
                            <div class="text-center text-white fw-medium">Deposit</div>
                        </div>
                        <div class="col-3 text-end">
                            <router-link :to="{name:'wallet_history'}" class="text-decoration-none text-white text-truncate">History</router-link>
                        </div>
                    </div>

                    <form class="form-wrapper w-90 p-3 mt-5 mx-auto rounded-4" @submit.prevent="deposit_live">
                        <div class="fs-2 text-center text-white">Deposit</div>
                        <div class="mt-3">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="amount" placeholder="Enter Amount" v-model="form.amount" required>
                                <label for="amount">Amount</label>
                            </div>
                            <div class="d-grid mt-3">
                                <button class="btn btn-main p-2" type="submit" :disabled="disable">Deposit
                                    <div class="spinner-grow spinner-grow-sm text-secondary" role="status" v-if="disable">
                                    <span class="sr-only">Loading...</span>
                                    </div>
                                </button>
                            </div>
                        </div>
                    </form>
                </main>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
</template>

<script>
import carousel from 'vue-owl-carousel'


export default {
    name: 'deposit',
    components:{
        carousel,
    },
    data() {
        return {
            user: {},
            url: process.env.mix_api_url,
            balance: 0,
            user: {},
            text:"",
            toast:"",
            message:"",
            upi_id:"",
            form:{
                transaction_id:"",
                amount:"",
                image:""
            },
            disable:false
        }
    },
    created() {
        this.userDetails();
    },
  
    methods: {
        uploadImg(e){
            this.form.image = e.target.files[0];
        },
        value() {
            alert("Link Copied");
            return this.upi_id;
        },
        userDetails() {
            axios
                .post(this.url + "api/getUserDetails", {
                    token: localStorage.token,
                })
                .then((res) => {
                    this.balance = res.data.balance;
                })
                .catch((err) => {
                    console.log(err);
                });
        },
        deposit(){
           
            if(confirm('Are you sure want to proceed')){
                this.disable = true;
            
            var form = new FormData();
            form.append("image",this.form.image);
            form.append("amount",this.form.amount);
            form.append("upi",this.form.transaction_id);
            form.append("token",localStorage.token);

            axios.post(this.url+"api/payment",form).then(res=>{
                console.log(res);
                this.$toaster.success(res.data.message);
                this.disable = false;
                this.form={};

            }).catch(err=>{
                console.log(err);
                var message = err.response.data.message;
                this.$toaster.error(message);
                this.disable = false;

            });
        }
          
        },
        deposit_live(){
            if(confirm('Are you sure want to proceed')){
                this.disable = true;
            axios.post(this.url+"api/deposit",{
                token:localStorage.token,
                amount:this.form.amount
            }).then(res=>{
                console.log(res);
                this.form.amount = "";
                window.location.href = res.data;
                this.disable = false;
                // this.toast = "show";
                // this.text="Success";
                // this.message = res.data.message;

            }).catch(err=>{
                console.log(err);
                var message = err.response.data.message;
                this.$toaster.error(message);
                this.disable = false;
                
                // this.toast = "show";
                // this.text="error";
                // this.message = message;
            });
        }
          
        }
       
    },
   
}
</script>