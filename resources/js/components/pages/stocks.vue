<template>
    <div class="container  head_container">
        <Header />
        

        <!-- bitcoins carousel start -->
        <section class="mt-cstm">
            <div class="container mt-3">
                <carousel :autoplay="true" :nav="false" :items="2" :margin="20" :dots="false">
                    <div class="item">
                    <img :src="url+'assets/images/bitcoin_1.png'" class="w-100 rounded-4" alt="">
                    </div>
                    <div class="item">
                    <img :src="url+'assets/images/bitcoin_1.png'" class="w-100 rounded-4" alt="">
                    </div>
                    <div class="item">
                    <img :src="url+'assets/images/bitcoin_1.png'" class="w-100 rounded-4" alt="">
                    </div>
                    <div class="item">
                    <img :src="url+'assets/images/bitcoin_1.png'" class="w-100 rounded-4" alt="">
                    </div>
                </carousel>
                <!-- <div class="owl-carousel owl-theme" id="carousel-2">
                    <div class="item">
                        <img :src="url+'assets/images/bitcoin_1.png'" class="w-100 rounded-4" alt="">
                    </div>
                    <div class="item">
                        <img :src="url+'assets/images/bitcoin_1.png'" class="w-100 rounded-4" alt="">
                    </div>
                    <div class="item">
                        <img :src="url+'assets/images/bitcoin_1.png'" class="w-100 rounded-4" alt="">
                    </div>
                    <div class="item">
                        <img :src="url+'assets/images/bitcoin_1.png'" class="w-100 rounded-4" alt="">
                    </div>
                    <div class="item">
                        <img :src="url+'assets/images/bitcoin_1.png'" class="w-100 rounded-4" alt="">
                    </div>
                    <div class="item">
                        <img :src="url+'assets/images/bitcoin_1.png'" class="w-100 rounded-4" alt="">
                    </div>
                    <div class="item">
                        <img :src="url+'assets/images/bitcoin_1.png'" class="w-100 rounded-4" alt="">
                    </div>
                    <div class="item">
                        <img :src="url+'assets/images/bitcoin_1.png'" class="w-100 rounded-4" alt="">
                    </div>
                </div> -->
            </div>
        </section>
        <!-- bitcoins carousel end -->

        <section>
            <div class="container pt-4">
                <div class="row align-items-center pb-3">
                    <div class="col-12 text-center">
                        <a href="#" class="text-decoration-none ">
                            <img :src="url+'invest.png'" width="100">
                            <!-- <div class="header_box_hoverable py-1 text-center bg-warning text-dark rounded-3">
                                <i class="ri-layout-grid-line icon_header"></i>
                                <p>Invest Now</p>
                            </div> -->
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <!-- daily lists section start -->
        <section>
            <div class="container px-4">
                <div class="row">
                    <div class="col-10">
                        <h3 class="text-warning">Daily Movers</h3>
                        <h6 class="text-white">Explore the biggest stock movers on the market</h6>
                    </div>
                    <div class="col-2">
                        <!-- <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                            class="bi bi-arrow-right text-warning" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                        </svg> -->
                    </div>
                </div>
                <div class="table-responsive">
                <table>
                    <tr>
                        <th style="min-width:320px"></th>
                        <th style="min-width:315px"></th>
                    </tr>
                <tr >

                    <td style="padding-right: 25px;">
                <div class="row border_bottom bg-grey_cstm align-items-center mt-4 p-3 " v-if="stocks.length > 0" v-for="(stock,i) in stocks" >
                    <div class="col-3">
                        <img :src="url+'assets/images/bark.png'" class="w-75" />
                    </div>
                    <div class="col-6 ps-0">
                        <p class="text-light mb-0">{{ stock.symbol }}</p>
                        <p class="text-light mb-0">{{ stock.name }}</p>
                    </div>
                    <div class="col-3">
                        <div class="text-success">{{stock.changesPercentage}}%</div>
                    </div>
                </div>
                    </td>
                    <td style="padding-left: 25px;">
                
                <div class="row border_bottom bg-grey_cstm align-items-center mt-4 p-3 " v-if="losers.length > 0" v-for="(data,j) in losers" >
                    <div class="col-3">
                        <img :src="url+'assets/images/bark.png'" class="w-75" />
                    </div>
                    <div class="col-6 ps-0">
                        <p class="text-light mb-0">{{ data.symbol }}</p>
                        <p class="text-light mb-0">{{ data.name }}</p>
                    </div>
                    <div class="col-3">
                        <div class="text-danger">{{data.changesPercentage}}%</div>
                    </div>
                </div>
                </td>
            </tr>
            </table>
                </div>
                <!-- <div class="row border_bottom bg-grey_cstm align-items-center mt-3 p-3">
                    <div class="col-3">
                        <img src="assets/images/bark.png" class="w-75" />
                    </div>
                    <div class="col-6 ps-0">
                        <p class="text-light mb-0">BARK</p>
                        <p class="text-light mb-0">The Original Bark Co</p>
                    </div>
                    <div class="col-3">
                        <div class="text-success">20.18%</div>
                    </div>
                </div>
                <div class="row border_bottom bg-grey_cstm align-items-center mt-3 p-3">
                    <div class="col-3">
                        <img src="assets/images/bark.png" class="w-75" />
                    </div>
                    <div class="col-6 ps-0">
                        <p class="text-light mb-0">BARK</p>
                        <p class="text-light mb-0">The Original Bark Co</p>
                    </div>
                    <div class="col-3">
                        <div class="text-success">20.18%</div>
                    </div>
                </div>
                <div class="row border_bottom bg-grey_cstm align-items-center mt-3 p-3">
                    <div class="col-3">
                        <img src="assets/images/bark.png" class="w-75" />
                    </div>
                    <div class="col-6 ps-0">
                        <p class="text-light mb-0">BARK</p>
                        <p class="text-light mb-0">The Original Bark Co</p>
                    </div>
                    <div class="col-3">
                        <div class="text-success">20.18%</div>
                    </div>
                </div> -->
            </div>
        </section>
        <!-- daily lists section end -->

        <!-- Community Choice lists section start -->
        <section>
            <div class="container mt-5 px-4">
                <h6 class="text-white align-items-center"> Community Choice
                    <svg height="25" width="25" class="p-1">
                        <circle cx="5" cy="5" r="2.5" stroke="white" stroke-width="3" fill="white" />
                    </svg>
                </h6>
                <div class="row">
                    <div class="col-10">
                        <h3 class="text-warning">Show me the most</h3>
                        <h3 class="text-warning">
                            Popular <span class="highlight_word text-success">Stocks</span>
                        </h3>
                    </div>
                    <div class="col-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                            class="bi bi-arrow-right text-warning" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                        </svg>
                    </div>
                </div>
                <div class="row border_bottom bg-grey_cstm align-items-center mt-4 p-3">
                    <div class="col-3">
                        <img :src="url+'assets/images/bark.png'" class="w-75" />
                    </div>
                    <div class="col-6 ps-0">
                        <p class="text-light mb-0">BARK</p>
                        <p class="text-light mb-0">The Original Bark Co</p>
                    </div>
                    <div class="col-3">
                        <p class="text-white mb-0">243.93</p>
                        <p class="mb-0 text-success community_success_font">(20.18%)</p>
                    </div>
                </div>
                <div class="row border_bottom bg-grey_cstm align-items-center mt-3 p-3">
                    <div class="col-3">
                        <img :src="url+'assets/images/bark.png'" class="w-75" />
                    </div>
                    <div class="col-6 ps-0">
                        <p class="text-light mb-0">BARK</p>
                        <p class="text-light mb-0">The Original Bark Co</p>
                    </div>
                    <div class="col-3">
                        <p class="text-white mb-0">243.93</p>
                        <p class="mb-0 text-success community_success_font">(20.18%)</p>
                    </div>
                </div>
                <div class="row border_bottom bg-grey_cstm align-items-center mt-3 p-3">
                    <div class="col-3">
                        <img :src="url+'assets/images/bark.png'" class="w-75" />
                    </div>
                    <div class="col-6 ps-0">
                        <p class="text-light mb-0">BARK</p>
                        <p class="text-light mb-0">The Original Bark Co</p>
                    </div>
                    <div class="col-3">
                        <p class="text-white mb-0">243.93</p>
                        <p class="mb-0 text-success community_success_font">(20.18%)</p>
                    </div>
                </div>
                <div class="row border_bottom bg-grey_cstm align-items-center mt-3 p-3">
                    <div class="col-3">
                        <img :src="url+'assets/images/bark.png'" class="w-75" />
                    </div>
                    <div class="col-6 ps-0">
                        <p class="text-light mb-0">BARK</p>
                        <p class="text-light mb-0">The Original Bark Co</p>
                    </div>
                    <div class="col-3">
                        <p class="text-white mb-0">243.93</p>
                        <p class="mb-0 text-success community_success_font">(20.18%)</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Community Choice lists section start -->

        <!-- Copy section carousel start -->
        <section>
            <div class="container mt-4">
                <div class="row">
                    <div class="col-10">
                        <h3 class="text-warning">CopyTrader</h3>
                        <p class="text-white">Mirrors the portfolios of top investors</p>
                    </div>
                    <div class="col-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                            class="bi bi-arrow-right text-warning" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                        </svg>
                    </div>
                </div>
                <!-- <div class="owl-carousel owl-theme" id="carousel-1"> -->
                    <carousel :autoplay="true" :nav="false" :items="2" :margin="20" :dots="false">
                    <div class="item">
                        <div class="card bg-white text-center rounded-2">
                            <img :src="url+'assets/images/girl.png'" class="w-50 mx-auto d-block mt-3" alt="...">
                            <div class="card-body">
                                <h4 class="card-title">Eliana</h4>
                                <h6 class="card-text mt-0 border-bottom border-warning border-2 pb-2">
                                    @eliana
                                </h6>
                                <div class="row mt-3 align-items-center">
                                    <div class="col-6">
                                        <h5 class="text-success fs-5">67.90%</h5>
                                        <p class="copytrader_font">Return(2y)</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="mb-0 fw-bold fs-5">4.08k</p>
                                        <p class="copytrader_font">Copiers</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card bg-white text-center rounded-2">
                            <img :src="url+'assets/images/girl.png'" class="w-50 mx-auto d-block mt-3" alt="...">
                            <div class="card-body">
                                <h4 class="card-title">Eliana</h4>
                                <h6 class="card-text mt-0 border-bottom border-warning border-2 pb-2">
                                    @eliana
                                </h6>
                                <div class="row mt-3 align-items-center">
                                    <div class="col-6">
                                        <h5 class="text-success fs-5">67.90%</h5>
                                        <p class="copytrader_font">Return(2y)</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="mb-0 fw-bold fs-5">4.08k</p>
                                        <p class="copytrader_font">Copiers</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card bg-white text-center rounded-2">
                            <img :src="url+'assets/images/girl.png'" class="w-50 mx-auto d-block mt-3" alt="...">
                            <div class="card-body">
                                <h4 class="card-title">Eliana</h4>
                                <h6 class="card-text mt-0 border-bottom border-warning border-2 pb-2">
                                    @eliana
                                </h6>
                                <div class="row mt-3 align-items-center">
                                    <div class="col-6">
                                        <h5 class="text-success fs-5">67.90%</h5>
                                        <p class="copytrader_font">Return(2y)</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="mb-0 fw-bold fs-5">4.08k</p>
                                        <p class="copytrader_font">Copiers</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card bg-white text-center rounded-2">
                            <img :src="url+'assets/images/girl.png'" class="w-50 mx-auto d-block mt-3" alt="...">
                            <div class="card-body">
                                <h4 class="card-title">Eliana</h4>
                                <h6 class="card-text mt-0 border-bottom border-warning border-2 pb-2">
                                    @eliana
                                </h6>
                                <div class="row mt-3 align-items-center">
                                    <div class="col-6">
                                        <h5 class="text-success fs-5">67.90%</h5>
                                        <p class="copytrader_font">Return(2y)</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="mb-0 fw-bold fs-5">4.08k</p>
                                        <p class="copytrader_font">Copiers</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- </div> -->
                </carousel>
            </div>
        </section>
        <!-- Copy section carousel start -->

        <!-- Tranding assets cards start -->
        <section>
            <div class="container mt-4">
                <div class="heading_section">
                    <div class="row">
                        <div class="col-10">
                            <h3 class="text-warning">Trending Assets</h3>
                            <p class="text-white">Assets accelerating among our inverstors right now</p>
                        </div>
                        <div class="col-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                class="bi bi-arrow-right text-warning" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="content_section">
                    <!-- <div class="owl-carousel owl-theme" id="carousel-3"> -->
                        <carousel :autoplay="true" :nav="false" :items="2" :margin="20" :dots="false">
                        <div class="item">
                            <div class="card rounded-4 header">
                                <div class="text-center mt-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="40px"
                                        viewBox="0 0 24 24" width="40px" fill="#ffffff">
                                        <g>
                                            <rect fill="none" height="24" width="24" />
                                        </g>
                                        <g>
                                            <path
                                                d="M12.89,11.1c-1.78-0.59-2.64-0.96-2.64-1.9c0-1.02,1.11-1.39,1.81-1.39c1.31,0,1.79,0.99,1.9,1.34l1.58-0.67 C15.39,8.03,14.72,6.56,13,6.24V5h-2v1.26C8.52,6.82,8.51,9.12,8.51,9.22c0,2.27,2.25,2.91,3.35,3.31 c1.58,0.56,2.28,1.07,2.28,2.03c0,1.13-1.05,1.61-1.98,1.61c-1.82,0-2.34-1.87-2.4-2.09L8.1,14.75c0.63,2.19,2.28,2.78,2.9,2.96V19 h2v-1.24c0.4-0.09,2.9-0.59,2.9-3.22C15.9,13.15,15.29,11.93,12.89,11.1z M3,21H1v-6h6v2l-2.48,0c1.61,2.41,4.36,4,7.48,4 c4.97,0,9-4.03,9-9h2c0,6.08-4.92,11-11,11c-3.72,0-7.01-1.85-9-4.67L3,21z M1,12C1,5.92,5.92,1,12,1c3.72,0,7.01,1.85,9,4.67L21,3 h2v6h-6V7l2.48,0C17.87,4.59,15.12,3,12,3c-4.97,0-9,4.03-9,9H1z" />
                                        </g>
                                    </svg>
                                </div>
                                <div class="card-body text-center mt-3">
                                    <h4 class="card-title text-white">LIGHT.NV</h4>
                                    <h6 class="text-white card-text mt-0">25.29</h6>
                                    <p class="text-white">-0.71%</p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="card rounded-4 card_red">
                                <div class="text-center mt-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="40px"
                                        viewBox="0 0 24 24" width="40px" fill="#ffffff">
                                        <g>
                                            <rect fill="none" height="24" width="24" />
                                        </g>
                                        <g>
                                            <path
                                                d="M12.89,11.1c-1.78-0.59-2.64-0.96-2.64-1.9c0-1.02,1.11-1.39,1.81-1.39c1.31,0,1.79,0.99,1.9,1.34l1.58-0.67 C15.39,8.03,14.72,6.56,13,6.24V5h-2v1.26C8.52,6.82,8.51,9.12,8.51,9.22c0,2.27,2.25,2.91,3.35,3.31 c1.58,0.56,2.28,1.07,2.28,2.03c0,1.13-1.05,1.61-1.98,1.61c-1.82,0-2.34-1.87-2.4-2.09L8.1,14.75c0.63,2.19,2.28,2.78,2.9,2.96V19 h2v-1.24c0.4-0.09,2.9-0.59,2.9-3.22C15.9,13.15,15.29,11.93,12.89,11.1z M3,21H1v-6h6v2l-2.48,0c1.61,2.41,4.36,4,7.48,4 c4.97,0,9-4.03,9-9h2c0,6.08-4.92,11-11,11c-3.72,0-7.01-1.85-9-4.67L3,21z M1,12C1,5.92,5.92,1,12,1c3.72,0,7.01,1.85,9,4.67L21,3 h2v6h-6V7l2.48,0C17.87,4.59,15.12,3,12,3c-4.97,0-9,4.03-9,9H1z" />
                                        </g>
                                    </svg>
                                </div>
                                <div class="card-body text-center mt-3">
                                    <h4 class="card-title text-white">LIGHT.NV</h4>
                                    <h6 class="text-white card-text mt-0">25.29</h6>
                                    <p class="text-white">-0.71%</p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="card rounded-4 bg-warning">
                                <div class="text-center mt-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="40px"
                                        viewBox="0 0 24 24" width="40px" fill="#ffffff">
                                        <g>
                                            <rect fill="none" height="24" width="24" />
                                        </g>
                                        <g>
                                            <path
                                                d="M12.89,11.1c-1.78-0.59-2.64-0.96-2.64-1.9c0-1.02,1.11-1.39,1.81-1.39c1.31,0,1.79,0.99,1.9,1.34l1.58-0.67 C15.39,8.03,14.72,6.56,13,6.24V5h-2v1.26C8.52,6.82,8.51,9.12,8.51,9.22c0,2.27,2.25,2.91,3.35,3.31 c1.58,0.56,2.28,1.07,2.28,2.03c0,1.13-1.05,1.61-1.98,1.61c-1.82,0-2.34-1.87-2.4-2.09L8.1,14.75c0.63,2.19,2.28,2.78,2.9,2.96V19 h2v-1.24c0.4-0.09,2.9-0.59,2.9-3.22C15.9,13.15,15.29,11.93,12.89,11.1z M3,21H1v-6h6v2l-2.48,0c1.61,2.41,4.36,4,7.48,4 c4.97,0,9-4.03,9-9h2c0,6.08-4.92,11-11,11c-3.72,0-7.01-1.85-9-4.67L3,21z M1,12C1,5.92,5.92,1,12,1c3.72,0,7.01,1.85,9,4.67L21,3 h2v6h-6V7l2.48,0C17.87,4.59,15.12,3,12,3c-4.97,0-9,4.03-9,9H1z" />
                                        </g>
                                    </svg>
                                </div>
                                <div class="card-body text-center mt-3">
                                    <h4 class="card-title text-white">LIGHT.NV</h4>
                                    <h6 class="text-white card-text mt-0">25.29</h6>
                                    <p class="text-white">-0.71%</p>
                                </div>
                            </div>
                        </div>
                        </carousel>
                    <!-- </div> -->
                </div>
            </div>
        </section>
        <!-- Tranding assets cards start -->

        <!-- Tranding on Feed cards start -->
        <section>
            <div class="container mt-4">
                <div class="row">
                    <div class="col-10">
                        <h3 class="text-warning">Trending on the Feed</h3>
                        <p class="text-white">Assets our users are talking about</p>
                    </div>
                    <div class="col-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                            class="bi bi-arrow-right text-warning" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                        </svg>
                    </div>
                </div>
                <!-- <div class="owl-carousel owl-theme" id="carousel-4"> -->
                    <carousel :autoplay="true" :nav="false" :items="1" :margin="20" :dots="false">
                    <div class="item">
                        <div class="row bg-white p-3 align-items-center rounded-3 w-100 mx-auto">
                            <div class="col-4 custom-border position-relative">
                                <p class="mb-0 fw-bold fs-4">178</p>
                                <p class="mb-0 card_text">POSTS</p>
                            </div>
                            <div class="col-8">
                                <div class="row align-items-center">
                                    <div class="col-6"><img :src="url+'assets/images/card.png'" class="w-100" alt="">
                                    </div>
                                    <div class="col-6">
                                        <p class="mb-0">NSDQ100</p>
                                        <p class="mb-0 text-success">
                                            67.90%
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="row bg-white p-3 align-items-center rounded-3 w-100 mx-auto">
                            <div class="col-4 custom-border position-relative">
                                <p class="mb-0 fw-bold fs-4">178</p>
                                <p class="mb-0 card_text">POSTS</p>
                            </div>
                            <div class="col-8">
                                <div class="row align-items-center">
                                    <div class="col-6"><img :src="url+'assets/images/card.png'" class="w-100" alt="">
                                    </div>
                                    <div class="col-6">
                                        <p class="mb-0">NSDQ100</p>
                                        <p class="mb-0 text-success">
                                            67.90%
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="row bg-white p-3 align-items-center rounded-3 w-100 mx-auto">
                            <div class="col-4 custom-border position-relative">
                                <p class="mb-0 fw-bold fs-4">178</p>
                                <p class="mb-0 card_text">POSTS</p>
                            </div>
                            <div class="col-8">
                                <div class="row align-items-center">
                                    <div class="col-6"><img :src="url+'assets/images/card.png'" class="w-100" alt="">
                                    </div>
                                    <div class="col-6">
                                        <p class="mb-0">NSDQ100</p>
                                        <p class="mb-0 text-success">
                                            67.90%
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- </div> -->
                </carousel>
            </div>
        </section>
        <!-- Tranding on Feed cards end -->

        <!-- Recently Added cards start -->
        <section>
            <div class="container">
                <div class="heading_section">
                    <div class="row">
                        <div class="col-10">
                            <h3 class="text-warning">Recently Added</h3>
                            <p class="text-white">Explore newly listed investments</p>
                        </div>
                        <div class="col-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                class="bi bi-arrow-right text-warning" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="content_section">
                    <!-- <div class="owl-carousel owl-theme" id="carousel-5"> -->
                        <carousel :autoplay="true" :nav="false" :items="2" :margin="20" :dots="false">
                        <div class="item">
                            <div class="card rounded-4 header">
                                <div class="text-center mt-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="40px"
                                        viewBox="0 0 24 24" width="40px" fill="#ffffff">
                                        <g>
                                            <rect fill="none" height="24" width="24" />
                                        </g>
                                        <g>
                                            <path
                                                d="M12.89,11.1c-1.78-0.59-2.64-0.96-2.64-1.9c0-1.02,1.11-1.39,1.81-1.39c1.31,0,1.79,0.99,1.9,1.34l1.58-0.67 C15.39,8.03,14.72,6.56,13,6.24V5h-2v1.26C8.52,6.82,8.51,9.12,8.51,9.22c0,2.27,2.25,2.91,3.35,3.31 c1.58,0.56,2.28,1.07,2.28,2.03c0,1.13-1.05,1.61-1.98,1.61c-1.82,0-2.34-1.87-2.4-2.09L8.1,14.75c0.63,2.19,2.28,2.78,2.9,2.96V19 h2v-1.24c0.4-0.09,2.9-0.59,2.9-3.22C15.9,13.15,15.29,11.93,12.89,11.1z M3,21H1v-6h6v2l-2.48,0c1.61,2.41,4.36,4,7.48,4 c4.97,0,9-4.03,9-9h2c0,6.08-4.92,11-11,11c-3.72,0-7.01-1.85-9-4.67L3,21z M1,12C1,5.92,5.92,1,12,1c3.72,0,7.01,1.85,9,4.67L21,3 h2v6h-6V7l2.48,0C17.87,4.59,15.12,3,12,3c-4.97,0-9,4.03-9,9H1z" />
                                        </g>
                                    </svg>
                                </div>
                                <div class="card-body text-center mt-3">
                                    <h4 class="card-title text-white">LIGHT.NV</h4>
                                    <h6 class="text-white card-text mt-0">25.29</h6>
                                    <p class="text-white">-0.71%</p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="card rounded-4 card_red">
                                <div class="text-center mt-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="40px"
                                        viewBox="0 0 24 24" width="40px" fill="#ffffff">
                                        <g>
                                            <rect fill="none" height="24" width="24" />
                                        </g>
                                        <g>
                                            <path
                                                d="M12.89,11.1c-1.78-0.59-2.64-0.96-2.64-1.9c0-1.02,1.11-1.39,1.81-1.39c1.31,0,1.79,0.99,1.9,1.34l1.58-0.67 C15.39,8.03,14.72,6.56,13,6.24V5h-2v1.26C8.52,6.82,8.51,9.12,8.51,9.22c0,2.27,2.25,2.91,3.35,3.31 c1.58,0.56,2.28,1.07,2.28,2.03c0,1.13-1.05,1.61-1.98,1.61c-1.82,0-2.34-1.87-2.4-2.09L8.1,14.75c0.63,2.19,2.28,2.78,2.9,2.96V19 h2v-1.24c0.4-0.09,2.9-0.59,2.9-3.22C15.9,13.15,15.29,11.93,12.89,11.1z M3,21H1v-6h6v2l-2.48,0c1.61,2.41,4.36,4,7.48,4 c4.97,0,9-4.03,9-9h2c0,6.08-4.92,11-11,11c-3.72,0-7.01-1.85-9-4.67L3,21z M1,12C1,5.92,5.92,1,12,1c3.72,0,7.01,1.85,9,4.67L21,3 h2v6h-6V7l2.48,0C17.87,4.59,15.12,3,12,3c-4.97,0-9,4.03-9,9H1z" />
                                        </g>
                                    </svg>
                                </div>
                                <div class="card-body text-center mt-3">
                                    <h4 class="card-title text-white">LIGHT.NV</h4>
                                    <h6 class="text-white card-text mt-0">25.29</h6>
                                    <p class="text-white">-0.71%</p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="card rounded-4 bg-warning">
                                <div class="text-center mt-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="40px"
                                        viewBox="0 0 24 24" width="40px" fill="#ffffff">
                                        <g>
                                            <rect fill="none" height="24" width="24" />
                                        </g>
                                        <g>
                                            <path
                                                d="M12.89,11.1c-1.78-0.59-2.64-0.96-2.64-1.9c0-1.02,1.11-1.39,1.81-1.39c1.31,0,1.79,0.99,1.9,1.34l1.58-0.67 C15.39,8.03,14.72,6.56,13,6.24V5h-2v1.26C8.52,6.82,8.51,9.12,8.51,9.22c0,2.27,2.25,2.91,3.35,3.31 c1.58,0.56,2.28,1.07,2.28,2.03c0,1.13-1.05,1.61-1.98,1.61c-1.82,0-2.34-1.87-2.4-2.09L8.1,14.75c0.63,2.19,2.28,2.78,2.9,2.96V19 h2v-1.24c0.4-0.09,2.9-0.59,2.9-3.22C15.9,13.15,15.29,11.93,12.89,11.1z M3,21H1v-6h6v2l-2.48,0c1.61,2.41,4.36,4,7.48,4 c4.97,0,9-4.03,9-9h2c0,6.08-4.92,11-11,11c-3.72,0-7.01-1.85-9-4.67L3,21z M1,12C1,5.92,5.92,1,12,1c3.72,0,7.01,1.85,9,4.67L21,3 h2v6h-6V7l2.48,0C17.87,4.59,15.12,3,12,3c-4.97,0-9,4.03-9,9H1z" />
                                        </g>
                                    </svg>
                                </div>
                                <div class="card-body text-center mt-3">
                                    <h4 class="card-title text-white">LIGHT.NV</h4>
                                    <h6 class="text-white card-text mt-0">25.29</h6>
                                    <p class="text-white">-0.71%</p>
                                </div>
                            </div>
                        </div>
                        </carousel>
                    <!-- </div> -->
                </div>
            </div>
        </section>
        <!-- Recently Added cards end -->

        <!-- Smart Portfolios images start -->
        <section>
            <div class="container mt-4">
                <div class="heading_section">
                    <div class="row">
                        <div class="col-10">
                            <h3 class="text-warning">Smart Portfolios</h3>
                            <p class="text-white">Invest in our curated,thematic collection</p>
                        </div>
                        <div class="col-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                class="bi bi-arrow-right text-warning" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                            </svg>
                        </div>
                    </div>
                </div>
                <!-- <div class="owl-carousel owl-theme" id="carousel-6"> -->
                <carousel :autoplay="true" :nav="false" :items="2" :margin="20" :dots="false">
                    <div class="item">
                        <img :src="url+'assets/images/first.jpg'" class="rounded-2" alt="...">
                    </div>
                    <div class="item">
                        <img :src="url+'assets/images/first.jpg'" class="rounded-2" alt="...">
                    </div>
                    <div class="item">
                        <img :src="url+'assets/images/first.jpg'" class="rounded-2" alt="...">
                    </div>
                    <div class="item">
                        <img :src="url+'assets/images/first.jpg'" class="rounded-2" alt="...">
                    </div>
                    </carousel>
                <!-- </div> -->
            </div>
        </section>
        <!-- footer navigation start -->

        <!-- <Footer /> -->
        <!-- footer navigation start -->

    </div>
</template>


<script>
import carousel from 'vue-owl-carousel'
import Header from './header.vue';


export default {
    name: 'stocks',
    components:{
        carousel,
        Header
    },
    data() {
        return {
            user: {},
            url: process.env.mix_api_url,
            balance: 0,
            user: {},
            stocks:[],
            losers:[]
        }
    },
    created() {
        this.userDetails();
        this.getStocks();
        this.getLoser();
    },
    //   methods:{
    //      userDetails(){
    //         axios.post(this.url+'api/getUserDetails',{
    //             token:localStorage.token
    //         }).then(res=>{
    //             console.log(res);
    //             this.user=  res.data.user;
    //             this.balance = res.data.balance;
    //         }).catch(err=>{
    //             console.log(err);
    //         })
    //     }
    //   },
    methods: {
        getStocks(){
            // axios.get("https://financialmodelingprep.com/api/v3/stock_market/gainers?apikey=01af6b313f93159c7f4ca28a2b5db84d").then(res=>{
            //     console.log(res);
            //     this.stocks = res.data;
            // }).catch(err=>{
            //     console.log(err);
            // });
            axios.get(this.url+'api/getGainers').then(res=>{
                console.log(res);
                this.stocks = res.data;
            }).catch(err=>{
                console.log(err);
            });
        },
        getLoser(){

            axios.get(this.url+'api/getLoser').then(res=>{
                console.log(res);
                this.losers = res.data;
            }).catch(err=>{
                console.log(err);
            });
        },

        userDetails() {
            axios
                .post(this.url + "api/getUserDetails", {
                    token: localStorage.token,
                })
                .then((res) => {
                    // console.log(res);
                    this.user = res.data.user;
                    this.balance = res.data.balance;
                    this.interest = res.data.interest;
                    this.commission = res.data.commission;
                })
                .catch((err) => {
                    console.log(err);
                });
        },
        logout() {
            axios
                .post(this.url + "api/userLogout", {
                    token: localStorage.token,
                })
                .then((res) => {
                    console.log(res);
                })
                .catch((err) => {
                    console.log(err);
                });
            localStorage.removeItem("token");
            this.$router.push({ name: "Login" });
        },
    },
    mounted() {
        // if(!localStorage.token){
        //     // this.$router.push("/login");
        // }
    }
}
</script>

 