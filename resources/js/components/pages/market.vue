<template>
     <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4 p-0">
                <main class="flex-shrink-0 main-content">
                    <div class="header-main p-4 sticky-top m-0">
                        <div class="row">
                            <div class="col-1 text-white" @click="$router.go(-1)"><i class="ri-arrow-left-line"></i></div>
                            <div class="col-10 text-center text-white fw-medium">Market</div>
                        </div>
                    </div>

                    <ul class="nav nav-pills mx-3 my-2">
                        <li class="nav-item">
                            <a class="nav-link active cstm-size" aria-current="page" href="#">Storage</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link cstm-size" href="#">Women-led</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link cstm-size" href="#">Gaming</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link cstm-size" href="#">NFT</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link cstm-size" href="#">POW</a>
                        </li>
                    </ul>

                    <div class="mx-sm-4 mx-2 my-4 text-white">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item bg-transparent text-white">
                                <router-link :to="{name:'trade',params:{id:'XMR'}}" class="text-white text-decoration-none">
                                    <div class="row align-items-center">
                                        <div class="col-2">
                                            <img :src="url+'front/assets/images/crypto/XMR.png'" alt="XMR" class="w-100 rounded-pill">
                                        </div>
                                        <div class="col">
                                            <div class="fw-medium fs-5">XMR</div>
                                            <div class="text-sm">Monero</div>
                                        </div>
                                        <div class="col-4 text-end">
                                            <div class="fs-5">{{ xmr.price }}</div>
                                            <div class="text-sm" :class="xmr.per < 0 ? 'text-danger':'text-green'"><i  :class="xmr.per < 0 ? 'ri-arrow-down-circle-line':'ri-arrow-up-circle-line'"></i> {{xmr.per}}%
                                            </div>
                                        </div>
                                    </div>
                                </router-link>
                            </li>
                            <li class="list-group-item bg-transparent text-white">
                                <router-link :to="{name:'trade',params:{id:'VET'}}" class="text-white text-decoration-none">
                                <div class="row align-items-center">
                                    <div class="col-2">
                                        <img :src="url+'front/assets/images/crypto/VET.png'" alt="VET" class="w-100 rounded-pill">
                                    </div>
                                    <div class="col">
                                        <div class="fw-medium fs-5">VET</div>
                                        <div class="text-sm">VeChain</div>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div class="fs-5">{{ vet.price }}</div>
                                        <div class="text-sm" :class="vet.per < 0 ? 'text-danger':'text-green'"><i  :class="vet.per < 0 ? 'ri-arrow-down-circle-line':'ri-arrow-up-circle-line'"></i> {{vet.per}}%
                                        </div>
                                    </div>
                                </div>
                            </router-link>
                            </li>
                            <li class="list-group-item bg-transparent text-white">
                                <router-link :to="{name:'trade',params:{id:'UNI'}}" class="text-white text-decoration-none">
                                <div class="row align-items-center">
                                    <div class="col-2">
                                        <img :src="url+'front/assets/images/crypto/UNI.png'" alt="UNI" class="w-100 rounded-pill">
                                    </div>
                                    <div class="col">
                                        <div class="fw-medium fs-5">UNI</div>
                                        <div class="text-sm">Uniswap</div>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div class="fs-5">{{ uni.price }}</div>
                                        <div class="text-sm " :class="uni.per < 0 ? 'text-danger':'text-green'"><i  :class="uni.per < 0 ? 'ri-arrow-down-circle-line':'ri-arrow-up-circle-line'"></i> {{uni.per}}%
                                        </div>
                                    </div>
                                </div>
                            </router-link>
                            </li>
                            <li class="list-group-item bg-transparent text-white">
                                <router-link :to="{name:'trade',params:{id:'TRX'}}" class="text-white text-decoration-none">
                                <div class="row align-items-center">
                                    <div class="col-2">
                                        <img :src="url+'front/assets/images/crypto/TRX.png'" alt="TRX" class="w-100 rounded-pill">
                                    </div>
                                    <div class="col">
                                        <div class="fw-medium fs-5">TRX</div>
                                        <div class="text-sm">TRON</div>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div class="fs-5">{{ trx.price }}</div>
                                        <div class="text-sm " :class="trx.per < 0 ? 'text-danger':'text-green'"><i  :class="trx.per < 0 ? 'ri-arrow-down-circle-line':'ri-arrow-up-circle-line'"></i> {{trx.per}}%
                                        </div>
                                    </div>
                                </div>
                            </router-link>
                            </li>
                            <li class="list-group-item bg-transparent text-white">
                                <router-link :to="{name:'trade',params:{id:'SHIB'}}" class="text-white text-decoration-none">
                                <div class="row align-items-center">
                                    <div class="col-2">
                                        <img :src="url+'front/assets/images/crypto/SHIB.png'" alt="SHIB" class="w-100 rounded-pill">
                                    </div>
                                    <div class="col">
                                        <div class="fw-medium fs-5">SHIB</div>
                                        <div class="text-sm">SHIBA INU</div>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div class="fs-5">{{ shib.price }}</div>
                                        <div class="text-sm " :class="shib.per < 0 ? 'text-danger':'text-green'"><i  :class="shib.per < 0 ? 'ri-arrow-down-circle-line':'ri-arrow-up-circle-line'"></i> {{shib.per}}%
                                        </div>
                                    </div>
                                </div>
                                </router-link>
                            </li>
                            <li class="list-group-item bg-transparent text-white">
                                <router-link :to="{name:'trade',params:{id:'MATIC'}}" class="text-white text-decoration-none">
                                <div class="row align-items-center">
                                    <div class="col-2">
                                        <img :src="url+'front/assets/images/crypto/MATIC.png'" alt="MATIC" class="w-100 rounded-pill">
                                    </div>
                                    <div class="col">
                                        <div class="fw-medium fs-5">MATIC</div>
                                        <div class="text-sm">Polygon</div>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div class="fs-5">{{ matic.price }}</div>
                                        <div class="text-sm " :class="matic.per < 0 ? 'text-danger':'text-green'"><i  :class="matic.per < 0 ? 'ri-arrow-down-circle-line':'ri-arrow-up-circle-line'"></i> {{matic.per}}%
                                        </div>
                                    </div>
                                </div>
                                </router-link>
                            </li>
                            <li class="list-group-item bg-transparent text-white">
                                <router-link :to="{name:'trade',params:{id:'LTC'}}" class="text-white text-decoration-none">
                                <div class="row align-items-center">
                                    <div class="col-2">
                                        <img :src="url+'front/assets/images/crypto/LTC.png'" alt="LTC" class="w-100 rounded-pill">
                                    </div>
                                    <div class="col">
                                        <div class="fw-medium fs-5">LTC</div>
                                        <div class="text-sm">Litecoin</div>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div class="fs-5">{{ ltc.price }}</div>
                                        <div class="text-sm " :class="ltc.per < 0 ? 'text-danger':'text-green'"><i  :class="ltc.per < 0 ? 'ri-arrow-down-circle-line':'ri-arrow-up-circle-line'"></i> {{ltc.per}}%
                                        </div>
                                    </div>
                                </div>
                                </router-link>
                            </li>
                            <li class="list-group-item bg-transparent text-white">
                                <router-link :to="{name:'trade',params:{id:'IMX'}}" class="text-white text-decoration-none">
                                <div class="row align-items-center">
                                    <div class="col-2">
                                        <img :src="url+'front/assets/images/crypto/IMX.png'" alt="IMX" class="w-100 rounded-pill">
                                    </div>
                                    <div class="col">
                                        <div class="fw-medium fs-5">IMX</div>
                                        <div class="text-sm">ImmutableX</div>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div class="fs-5">{{ imx.price }}</div>
                                        <div class="text-sm " :class="imx.per < 0 ? 'text-danger':'text-green'"><i  :class="imx.per < 0 ? 'ri-arrow-down-circle-line':'ri-arrow-up-circle-line'"></i> {{imx.per}}%
                                        </div>
                                    </div>
                                </div>
                                </router-link>
                            </li>
                            <li class="list-group-item bg-transparent text-white">
                                <router-link :to="{name:'trade',params:{id:'ICP'}}" class="text-white text-decoration-none">
                                <div class="row align-items-center">
                                    <div class="col-2">
                                        <img :src="url+'front/assets/images/crypto/ICP.png'" alt="ICP" class="w-100 rounded-pill">
                                    </div>
                                    <div class="col">
                                        <div class="fw-medium fs-5">ICP</div>
                                        <div class="text-sm">Internet Computer</div>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div class="fs-5">{{ icp.price }}</div>
                                        <div class="text-sm" :class="icp.per < 0 ? 'text-danger':'text-green'"><i  :class="icp.per < 0 ? 'ri-arrow-down-circle-line':'ri-arrow-up-circle-line'"></i> {{icp.per}}%
                                        </div>
                                    </div>
                                </div>
                                </router-link>
                            </li>
                            <li class="list-group-item bg-transparent text-white">
                                <router-link :to="{name:'trade',params:{id:'HBAR'}}" class="text-white text-decoration-none">
                                <div class="row align-items-center">
                                    <div class="col-2">
                                        <img :src="url+'front/assets/images/crypto/HBAR.png'" alt="HBAR" class="w-100 rounded-pill">
                                    </div>
                                    <div class="col">
                                        <div class="fw-medium fs-5">HBAR</div>
                                        <div class="text-sm">Hedera Hashgraph</div>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div class="fs-5">{{ hbar.price }}</div>
                                        <div class="text-sm " :class="hbar.per < 0 ? 'text-danger':'text-green'"><i  :class="hbar.per < 0 ? 'ri-arrow-down-circle-line':'ri-arrow-up-circle-line'"></i> {{hbar.per}}%
                                        </div>
                                    </div>
                                </div>
                                </router-link>
                            </li>
                            <li class="list-group-item bg-transparent text-white">
                                <router-link :to="{name:'trade',params:{id:'GRT'}}" class="text-white text-decoration-none">
                                <div class="row align-items-center">
                                    <div class="col-2">
                                        <img :src="url+'front/assets/images/crypto/GRT.png'" alt="GRT" class="w-100 rounded-pill">
                                    </div>
                                    <div class="col">
                                        <div class="fw-medium fs-5">GRT</div>
                                        <div class="text-sm">The Graph</div>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div class="fs-5">{{ grt.price }}</div>
                                        <div class="text-sm " :class="grt.per < 0 ? 'text-danger':'text-green'"><i  :class="grt.per < 0 ? 'ri-arrow-down-circle-line':'ri-arrow-up-circle-line'"></i> {{grt.per}}%
                                        </div>
                                    </div>
                                </div>
                                </router-link>
                            </li>
                            <li class="list-group-item bg-transparent text-white">
                                <router-link :to="{name:'trade',params:{id:'FTM'}}" class="text-white text-decoration-none">
                                <div class="row align-items-center">
                                    <div class="col-2">
                                        <img :src="url+'front/assets/images/crypto/FTM.png'" alt="FTM" class="w-100 rounded-pill">
                                    </div>
                                    <div class="col">
                                        <div class="fw-medium fs-5">FTM</div>
                                        <div class="text-sm">Fantom</div>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div class="fs-5">{{ ftm.price }}</div>
                                        <div class="text-sm " :class="ftm.per < 0 ? 'text-danger':'text-green'"><i  :class="ftm.per < 0 ? 'ri-arrow-down-circle-line':'ri-arrow-up-circle-line'"></i> {{ftm.per}}%
                                        </div>
                                    </div>
                                </div>
                                </router-link>
                            </li>
                            <li class="list-group-item bg-transparent text-white">
                                <router-link :to="{name:'trade',params:{id:'ETH'}}" class="text-white text-decoration-none">
                                <div class="row align-items-center">
                                    <div class="col-2">
                                        <img :src="url+'front/assets/images/crypto/ETH.png'" alt="ETH" class="w-100 rounded-pill">
                                    </div>
                                    <div class="col">
                                        <div class="fw-medium fs-5">ETH</div>
                                        <div class="text-sm">Ethereum</div>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div class="fs-5">{{ eth.price }}</div>
                                        <div class="text-sm" :class="eth.per < 0 ? 'text-danger':'text-green'"><i  :class="eth.per < 0 ? 'ri-arrow-down-circle-line':'ri-arrow-up-circle-line'"></i> {{eth.per}}%
                                        </div>
                                    </div>
                                </div>
                                </router-link>
                            </li>
                            <li class="list-group-item bg-transparent text-white">
                                <router-link :to="{name:'trade',params:{id:'EOS'}}" class="text-white text-decoration-none">
                                <div class="row align-items-center">
                                    <div class="col-2">
                                        <img :src="url+'front/assets/images/crypto/EOS.png'" alt="EOS" class="w-100 rounded-pill">
                                    </div>
                                    <div class="col">
                                        <div class="fw-medium fs-5">EOS</div>
                                        <div class="text-sm">EOS</div>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div class="fs-5">{{ eos.price }}</div>
                                        <div class="text-sm " :class="eos.per < 0 ? 'text-danger':'text-green'"><i  :class="eos.per < 0 ? 'ri-arrow-down-circle-line':'ri-arrow-up-circle-line'"></i> {{eos.per}}%
                                        </div>
                                    </div>
                                </div>
                                </router-link>
                            </li>
                            <li class="list-group-item bg-transparent text-white">
                                <router-link :to="{name:'trade',params:{id:'EGLD'}}" class="text-white text-decoration-none">
                                <div class="row align-items-center">
                                    <div class="col-2">
                                        <img :src="url+'front/assets/images/crypto/EGLD.png'" alt="EGLD" class="w-100 rounded-pill">
                                    </div>
                                    <div class="col">
                                        <div class="fw-medium fs-5">EGLD</div>
                                        <div class="text-sm">MultiversX</div>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div class="fs-5">{{ egld.price }}</div>
                                        <div class="text-sm " :class="egld.per < 0 ? 'text-danger':'text-green'"><i  :class="egld.per < 0 ? 'ri-arrow-down-circle-line':'ri-arrow-up-circle-line'"></i> {{egld.per}}%
                                        </div>
                                    </div>
                                </div>
                                </router-link>
                            </li>
                            <li class="list-group-item bg-transparent text-white">
                                <router-link :to="{name:'trade',params:{id:'DOT'}}" class="text-white text-decoration-none">
                                <div class="row align-items-center">
                                    <div class="col-2">
                                        <img :src="url+'front/assets/images/crypto/DOT.png'" alt="DOT" class="w-100 rounded-pill">
                                    </div>
                                    <div class="col">
                                        <div class="fw-medium fs-5">DOT</div>
                                        <div class="text-sm">Polkadot</div>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div class="fs-5">{{ dot.price }}</div>
                                        <div class="text-sm text-green" :class="dot.per < 0 ? 'text-danger':'text-green'"><i  :class="dot.per < 0 ? 'ri-arrow-down-circle-line':'ri-arrow-up-circle-line'"></i> {{dot.per}}%
                                        </div>
                                    </div>
                                </div>
                                </router-link>
                            </li>
                            <li class="list-group-item bg-transparent text-white">
                                <router-link :to="{name:'trade',params:{id:'DAI'}}" class="text-white text-decoration-none">
                                <div class="row align-items-center">
                                    <div class="col-2">
                                        <img :src="url+'front/assets/images/crypto/DAI.png'" alt="DAI" class="w-100 rounded-pill">
                                    </div>
                                    <div class="col">
                                        <div class="fw-medium fs-5">DAI</div>
                                        <div class="text-sm">Dai</div>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div class="fs-5">{{ dai.price }}</div>
                                        <div class="text-sm text-green" :class="dai.per < 0 ? 'text-danger':'text-green'"><i  :class="dai.per < 0 ? 'ri-arrow-down-circle-line':'ri-arrow-up-circle-line'"></i> {{dai.per}}%
                                        </div>
                                    </div>
                                </div>
                                </router-link>
                            </li>
                            <li class="list-group-item bg-transparent text-white">
                                <router-link :to="{name:'trade',params:{id:'BCH'}}" class="text-white text-decoration-none">
                                <div class="row align-items-center">
                                    <div class="col-2">
                                        <img :src="url+'front/assets/images/crypto/BCH.png'" alt="BCH" class="w-100 rounded-pill">
                                    </div>
                                    <div class="col">
                                        <div class="fw-medium fs-5">BCH</div>
                                        <div class="text-sm">Bitcoin Cash</div>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div class="fs-5">{{ bch.price }}</div>
                                        <div class="text-sm " :class="bch.per < 0 ? 'text-danger':'text-green'"><i  :class="bch.per < 0 ? 'ri-arrow-down-circle-line':'ri-arrow-up-circle-line'"></i> {{bch.per}}%
                                        </div>
                                    </div>
                                </div>
                                </router-link>
                            </li>
                            <li class="list-group-item bg-transparent text-white">
                                <router-link :to="{name:'trade',params:{id:'AXS'}}" class="text-white text-decoration-none">
                                <div class="row align-items-center">
                                    <div class="col-2">
                                        <img :src="url+'front/assets/images/crypto/AXS.png'" alt="AXS" class="w-100 rounded-pill">
                                    </div>
                                    <div class="col">
                                        <div class="fw-medium fs-5">AXS</div>
                                        <div class="text-sm">Axis Infinity</div>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div class="fs-5">{{ axs.price }}</div>
                                        <div class="text-sm " :class="axs.per < 0 ? 'text-danger':'text-green'"><i  :class="axs.per < 0 ? 'ri-arrow-down-circle-line':'ri-arrow-up-circle-line'"></i> {{axs.per}}%
                                        </div>
                                    </div>
                                </div>
                                </router-link>
                            </li>
                            <li class="list-group-item bg-transparent text-white">
                                <router-link :to="{name:'trade',params:{id:'AVAX'}}" class="text-white text-decoration-none">
                                <div class="row align-items-center">
                                    <div class="col-2">
                                        <img :src="url+'front/assets/images/crypto/AVAX.png'" alt="AVAX" class="w-100 rounded-pill">
                                    </div>
                                    <div class="col">
                                        <div class="fw-medium fs-5">AVAX</div>
                                        <div class="text-sm">Avalanche</div>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div class="fs-5">{{ avax.price }}</div>
                                        <div class="text-sm " :class="avax.per < 0 ? 'text-danger':'text-green'"><i  :class="avax.per < 0 ? 'ri-arrow-down-circle-line':'ri-arrow-up-circle-line'"></i> {{avax.per}}%
                                        </div>
                                    </div>
                                </div>
                                </router-link>
                            </li>
                            <li class="list-group-item bg-transparent text-white">
                                <router-link :to="{name:'trade',params:{id:'ATOM'}}" class="text-white text-decoration-none">
                                <div class="row align-items-center">
                                    <div class="col-2">
                                        <img :src="url+'front/assets/images/crypto/ATOM.png'" alt="ATOM" class="w-100 rounded-pill">
                                    </div>
                                    <div class="col">
                                        <div class="fw-medium fs-5">ATOM</div>
                                        <div class="text-sm">Cosmos</div>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div class="fs-5">{{ atom.price }}</div>
                                        <div class="text-sm " :class="atom.per < 0 ? 'text-danger':'text-green'"><i  :class="atom.per < 0 ? 'ri-arrow-down-circle-line':'ri-arrow-up-circle-line'"></i> {{atom.per}}%
                                        </div>
                                    </div>
                                </div>
                                </router-link>
                            </li>
                          
                            <li class="list-group-item bg-transparent text-white">
                                <router-link :to="{name:'trade',params:{id:'APT'}}" class="text-white text-decoration-none">
                                <div class="row align-items-center">
                                    <div class="col-2">
                                        <img :src="url+'front/assets/images/crypto/APT.png'" alt="APT" class="w-100 rounded-pill">
                                    </div>
                                    <div class="col">
                                        <div class="fw-medium fs-5">APT</div>
                                        <div class="text-sm">Aptos</div>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div class="fs-5">{{ apt.price }}</div>
                                        <div class="text-sm " :class="apt.per < 0 ? 'text-danger':'text-green'"><i  :class="apt.per < 0 ? 'ri-arrow-down-circle-line':'ri-arrow-up-circle-line'"></i> {{apt.per}}%
                                        </div>
                                    </div>
                                </div>
                                </router-link>
                            </li>
                        </ul>
                    </div>
                    <Footer />
                </main>
           </div>
       </div>
   </div>
</template>
<script>
import carousel from "vue-owl-carousel";
// import Sidebar from "./sidebar.vue";
import Footer from "./footer";
import moment from "moment";

export default {
   name: "market",
   components: {
       carousel,
       Footer
   },
   data() {
       return {
           url: process.env.mix_app_url,
           ltc:{
               price:0,
               per:0
           },
           imx:{
               price:0,
               per:0
           },
           icp:{
               price:0,
               per:0
           },
           hbar:{
               price:0,
               per:0
           },
           grt:{
               price:0,
               per:0
           },
           ftm:{
               price:0,
               per:0
           },
           eos:{
               price:0,
               per:0
           },
           egld:{
               price:0,
               per:0
           },
           dot:{
               price:0,
               per:0
           },
           dai:{
               price:0,
               per:0
           },
           bch:{
               price:0,
               per:0
           },
           axs:{
               price:0,
               per:0
           },
           avax:{
               price:0,
               per:0
           },
           atom:{
               price:0,
               per:0
           },
           apt:{
               price:0,
               per:0
           },
           xmr:{
               price:0,
               per:0
           },
           vet:{
               price:0,
               per:0
           },
           uni:{
               price:0,
               per:0
           },
           shib:{
               price:0,
               per:0
           },
           matic:{
               price:0,
               per:0
           },
           btc:{
               price:0,
               per:0
           },
           trx:{
               price:0,
               per:0
           },
           eth:{
               price:0,
               per:0
           },
           xrp:{
               price:0,
               per:0
           },
           bnb:{
               price:0,
               per:0
           },
           usdc:{
               price:0,
               per:0
           },
           ada:{
               price:0,
               per:0
           },
           doge:{
               price:0,
               per:0
           },
           sol:{
               price:0,
               per:0
           },
           okb:{
               price:0,
               per:0
           },
       };
   },
   created() {
    
   },
   methods: {
       moment(date) {
           return moment(date);
       },
       
   },
   mounted() {

       const socket = new WebSocket("wss://stream.binance.com:9443/ws/!ticker@arr");
       socket.onopen = function(e) {
           console.log(e);
       };
       var vm = this;
       socket.onmessage = function(event) {
           var data = JSON.parse(event.data);
          for(var i=0;i<data.length;i++){
               // var d = data[i];
               // var asset = data[i].s.substring(data[i].s.length - 4);
               var symbol = data[i].s;
               if(symbol == "LTCUSDT"){
                   vm.ltc.price = Number(data[i].c).toFixed(1);
                   vm.ltc.per = data[i].P;
               }
               if(symbol == "IMXUSDT"){
                   vm.imx.price = Number(data[i].c).toFixed(1);
                   vm.imx.per = data[i].P;
               }
               if(symbol == "ICPUSDT"){
                   vm.icp.price = Number(data[i].c).toFixed(1);
                   vm.icp.per = data[i].P;
               }
               if(symbol == "HBARUSDT"){
                   vm.hbar.price = Number(data[i].c).toFixed(1);
                   vm.hbar.per = data[i].P;
               }
               if(symbol == "GRTUSDT"){
                   vm.grt.price = Number(data[i].c).toFixed(1);
                   vm.grt.per = data[i].P;
               }
               if(symbol == "FTMUSDT"){
                   vm.ftm.price = Number(data[i].c).toFixed(1);
                   vm.ftm.per = data[i].P;
               }
               if(symbol == "EOSUSDT"){
                   vm.eos.price = Number(data[i].c).toFixed(1);
                   vm.eos.per = data[i].P;
               }
               if(symbol == "DOTUSDT"){
                   vm.dot.price = Number(data[i].c).toFixed(1);
                   vm.dot.per = data[i].P;
               }
               if(symbol == "EGLDUSDT"){
                   vm.egld.price = Number(data[i].c).toFixed(1);
                   vm.egld.per = data[i].P;
               }
               if(symbol == "DAIUSDT"){
                   vm.dai.price = Number(data[i].c).toFixed(1);
                   vm.dai.per = data[i].P;
               }
               if(symbol == "BCHUSDT"){
                   vm.bch.price = Number(data[i].c).toFixed(1);
                   vm.bch.per = data[i].P;
               }
               if(symbol == "AXSUSDT"){
                   vm.axs.price = Number(data[i].c).toFixed(1);
                   vm.axs.per = data[i].P;
               }
               if(symbol == "AXSUSDT"){
                   vm.axs.price = Number(data[i].c).toFixed(1);
                   vm.axs.per = data[i].P;
               }
               if(symbol == "AVAXUSDT"){
                   vm.avax.price = Number(data[i].c).toFixed(1);
                   vm.avax.per = data[i].P;
               }
               if(symbol == "ATOMUSDT"){
                   vm.atom.price = Number(data[i].c).toFixed(1);
                   vm.atom.per = data[i].P;
               }
               if(symbol == "APTUSDT"){
                   vm.apt.price = Number(data[i].c).toFixed(1);
                   vm.apt.per = data[i].P;
               }
               if(symbol == "XMRUSDT"){
                   vm.xmr.price = Number(data[i].c).toFixed(1);
                   vm.xmr.per = data[i].P;
               }
               if(symbol == "VETUSDT"){
                   vm.vet.price = Number(data[i].c).toFixed(1);
                   vm.vet.per = data[i].P;
               }
               if(symbol == "UNIUSDT"){
                   vm.uni.price = Number(data[i].c).toFixed(1);
                   vm.uni.per = data[i].P;
               }
               if(symbol == "SHIBUSDT"){
                   vm.shib.price = Number(data[i].c).toFixed(1);
                   vm.shib.per = data[i].P;
               }
               if(symbol == "MATICUSDT"){
                   vm.matic.price = Number(data[i].c).toFixed(1);
                   vm.matic.per = data[i].P;
               }
               if(symbol == "BTCUSDT"){
                   vm.btc.price = Number(data[i].c).toFixed(1);
                   vm.btc.per = data[i].P;
               }
               if(symbol == "TRXUSDT"){
                   vm.trx.price = Number(data[i].c).toFixed(1);
                   vm.trx.per = data[i].P;
               }
               if(symbol == "ETHUSDT"){
                   vm.eth.price = Number(data[i].c).toFixed(1);
                   vm.eth.per = data[i].P;
               }
               if(symbol == "DOGEUSDT"){
                   vm.doge.price = Number(data[i].c).toFixed(5);
                   vm.doge.per = data[i].P;
               }
               if(symbol == "XRPUSDT"){
                   vm.xrp.price = Number(data[i].c).toFixed(5);
                   vm.xrp.per = data[i].P;
               }
               if(symbol == "BNBUSDT"){
                   vm.bnb.price = Number(data[i].c).toFixed(4);
                   vm.bnb.per = data[i].P;
               }
               if(symbol == "USDCUSDT"){
                   vm.usdc.price = Number(data[i].c).toFixed(5);
                   vm.usdc.per = data[i].P;
               }
               if(symbol == "ADAUSDT"){
                   vm.ada.price = Number(data[i].c).toFixed(5);
                   vm.ada.per = data[i].P;
               }
               
               if(symbol == "SOLUSDT"){
                   vm.sol.price = Number(data[i].c).toFixed(5);
                   vm.sol.per = data[i].P;
               }
               if(symbol == "OKBUSDT"){
                   vm.okb.price = Number(data[i].c).toFixed(5);
                   vm.okb.per = data[i].P;
               }
               
           }
       };

      
   },
};
</script>
<style>
.search_component_container {
   display: none !important;
   visibility: hidden !important;
}

.search_engine {
   display: none !important;
   visibility: hidden !important;
}
</style>
