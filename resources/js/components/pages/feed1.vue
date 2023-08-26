<template>
    <div class="hero_area">
        <!-- header section strats -->
        <Header />
        <div class="slider_section ">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="detail-box">
                            <h2>
                                Buy & Sell Digital <br>
                                Assets In
                                <span>The Vinchi</span>
                            </h2>

                            <h5 class="mt-4">
                                Coin Vinchi is the easiest, safest, and fastest way to buy & sell crypto asset exchange
                            </h5>

                            <div class="btn-box">
                                <button type="button" class="btn btn-info btn-info2 mobile rounded-pill"><a
                                        @click="home()">Get
                                        started now</a></button>
                                        

                            </div>
                            <div class="bottom mt-4">
                                <h4 class="text-light">Our Partners</h4>
                                <div class="row">
                                    <div class="col-12 mt-4">
                                        <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">

                                            <div class="carousel-inner">
                                                <div class="carousel-item marquee active">
                                                    <div class="d-flex">
                                                        <div class="col-3   flex-column  ">
                                                            <div class="  flex-row">
                                                                <i class="fab fa-safari text-light"></i>

                                                            </div>
                                                        </div>
                                                        <div class="col-3   flex-column ">
                                                            <div class="flex-row">
                                                                <i class="fab fa-safari text-light"></i>

                                                            </div>
                                                        </div>
                                                        <div class="col-3 d-flex flex-column ">
                                                            <div class="  flex-row"> <i class="fab fa-safari text-light"></i>


                                                            </div>
                                                        </div>
                                                        <div class="col-3 d-flex flex-column ">
                                                            <div class="  flex-row"> <i class="fab fa-safari text-light"></i>


                                                            </div>
                                                        </div>


                                                    </div>
                                                </div>
                                                <div class="carousel-item ">
                                                    <div class="d-flex">
                                                        <div class="col-3 d-flex flex-column  ">
                                                            <div class="  flex-row">
                                                                <i class="fab fa-safari text-light "></i>


                                                            </div>
                                                        </div>
                                                        <div class="col-3 d-flex flex-column ">
                                                            <div class="  flex-row">
                                                                <i class="fab fa-safari text-light"></i>

                                                            </div>
                                                        </div>
                                                        <div class="col-3 d-flex flex-column ">
                                                            <div class="  flex-row">
                                                                <i class="fab fa-safari text-light"></i>

                                                            </div>
                                                        </div>
                                                        <div class="col-3 d-flex flex-column ">
                                                            <div class="  flex-row">
                                                                <i class="fab fa-safari text-light"></i>

                                                            </div>
                                                        </div>



                                                    </div>
                                                </div>


                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="row">
                            <div class="    ">
                                <div class="  text-center">
                                    <img :src="url + 'frontend/images/banner-01.png.png'" class="w-75" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-5">
            <section class="content content2 border_usd ">
                <div class="container-fluid bg-white " style="border-radius: 20px;">

                    <div class="row p-3 ">
                        <div class="col-lg-3 col-6 ">

                            <div class="small-box bg-light">
                                <div class="inner">
                                    <p><img :src="url + 'frontend/dist/img/bitcoin-logo.png'"
                                            class="mr-2 d-none d-sm-inline-block" width="30">Bitcoin
                                        <span>&nbsp;&nbsp; BTC/USD</span>
                                    </p>
                                    <h4>USD 46,168.95</h4>
                                    <p class="mt-2">36,641.20&nbsp;&nbsp;<span
                                            class="badge rounded-pill bg-danger">-0.79%</span></p>
                                </div>

                            </div>
                        </div>

                        <div class="col-lg-3 col-6">

                            <div class="small-box bg-light">
                                <div class="inner">
                                    <p><img :src="url + 'frontend/dist/img/Eth.png'" class="mr-2 d-none d-sm-inline-block"
                                            width="30">Ethereum
                                        <span>&nbsp;&nbsp; ETH/USD</span>
                                    </p>
                                    <h4>USD 46,168.95</h4>
                                    <p class="mt-2">36,641.20&nbsp;&nbsp;<span
                                            class="badge rounded-pill bg-success">+10.55%</span></p>
                                </div>

                            </div>
                        </div>

                        <div class="col-lg-3 col-6">

                            <div class="small-box bg-light">
                                <div class="inner">
                                    <p><img :src="url + 'frontend/dist/img/tether.png'"
                                            class="mr-2 d-none d-sm-inline-block" width="30">Tether
                                        <span>&nbsp;&nbsp; USDT/USD</span>
                                    </p>
                                    <h4>USD 46,168.95</h4>
                                    <p class="mt-2">36,641.20&nbsp;&nbsp;<span
                                            class="badge rounded-pill bg-danger">-0.09%</span></p>
                                </div>

                            </div>
                        </div>

                        <div class="col-lg-3 col-6">

                            <div class="small-box bg-light">
                                <div class="inner">
                                    <p><img :src="url + 'frontend/dist/img/bnb.png'" class=" d-none d-sm-inline-block mr-2"
                                            width="30">BNB
                                        <span>&nbsp;&nbsp; BNB/USD</span>
                                    </p>
                                    <h4>USD 46,168.95</h4>
                                    <p class="mt-2">36,641.20&nbsp;&nbsp;<span
                                            class="badge rounded-pill bg-danger">-1.24%</span></p>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </section>

            <section class="Tokenomics  mt-3     background_color">
                <h1 class="text-center text-light pt-5">Tokenomics</h1>
                <div class="row py-3">
                    <div class="col-lg-3 text-center">
                        <h1 class="tokenomics_clr border-right border-warning ">210000000</h1>
                        <h5 class="text-light">Total Supply</h5>
                    </div>
                    <div class="col-lg-3 text-center">
                        <h1 class="tokenomics_clr border-right border-warning">50000000</h1>
                        <h5 class="text-light">Supply in Market</h5>

                    </div>
                    <div class="col-lg-3 text-center">
                        <h1 class="tokenomics_clr border-right border-warning">1 VINCHI</h1>
                        <h5 class="text-light">= 1 USDT</h5>
                    </div>
                    <div class="col-lg-3 text-center">
                        <h1 class="tokenomics_clr">BEP20</h1>
                        <h5 class="text-light">Blockchain</h5>
                    </div>
                </div>
            </section>
            <section class="Our Packages shadow text-light">
                <h2 class="text-center"></h2>
                <div class="row ">
                    <div class="col-lg-4">
                        <div class="card border_cstm bg-dark cstm_rounded">
                            <img :src="url + 'frontend/images/Ellipse 7.png'"
                                class=" rounded-circle card-img-top w-50  m-3 mx-auto" alt="...">
                            <div class="">
                                <h2 class="text-center tokenomics_clr">Root Level</h2>
                                <h4 class="py-2 background-color50 text-center ">50 USDT</h4>
                                <div class="card-body">
                                    <span id="circle" class="position-absolute shadow "><span id="circle1"
                                            class="position-absolute shadow "></span> </span>
                                    <p class="mx-3 card-text p-2 position-relative">
                                        Profit Sharing Income 1% Daily
                                        For Next 100 Days + 100%
                                        Vested Amount Return</p>
                                    <span id="circle" class="position-absolute shadow "><span id="circle1"
                                            class="position-absolute shadow "></span> </span>

                                    <p class="card-text p-2 mx-3">Level Wise Income From Level
                                        1st to 5th with the percentage
                                        of 5%, 3%, 0.5%, 0.5%, and 1%.</p>
                                    <div class="mx-auto text-center">
                                        <a href="#" class="btn bgcolor px-5 btn-info2 ">Buy Now</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 ">
                        <div class="card border_cstm_black  bgcolor_card cstm_rounded">
                            <img :src="url + 'frontend/images/Ellipse 8.png'"
                                class=" rounded-circle card-img-top w-50  m-3 mx-auto" alt="...">
                            <div class=" ">
                                <h2 class="text-center ">Root Level</h2>
                                <h4 class="py-2 bg-dark text-center">50 USDT Black</h4>
                                <div class="card-body">
                                    <span class="position-absolute shadow  cstm_background"><span
                                            class="position-absolute shadow  cstm_background2"></span></span>
                                    <p class=" mx-3 card-text p-2">Profit Sharing Income 1% Daily
                                        For Next 100 Days + 100%
                                        Vested Amount Return</p>
                                    <span class="position-absolute shadow  cstm_background"><span
                                            class="position-absolute shadow  cstm_background2"></span></span>

                                    <p class="card-text p-2 mx-3">Level Wise Income From Level
                                        1st to 5th with the percentage
                                        of 5%, 3%, 0.5%, 0.5%, and 1%.</p>
                                    <div class="mx-auto text-center">
                                        <a href="#" class="btn  px-5      btn-info21">Buy Now</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card border_cstm bg-dark cstm_rounded ">
                            <img :src="url + 'frontend/images/Ellipse 9.png'"
                                class=" rounded-circle card-img-top  w-50 m-3 mx-auto" alt="...">
                            <div class="">
                                <h2 class="text-center tokenomics_clr">Root Level</h2>
                                <h4 class="py-2 background-color50 text-center">50 USDT</h4>
                                <div class="card-body"> <span id="circle" class="position-absolute shadow "><span
                                            id="circle1" class="position-absolute shadow "></span></span>
                                    <p class="mx-3 card-text p-2">Profit Sharing Income 1% Daily
                                        For Next 100 Days + 100%
                                        Vested Amount Return</p>
                                    <span id="circle" class="position-absolute shadow "><span id="circle1"
                                            class="position-absolute shadow "></span></span>

                                    <p class=" mx-3 card-text p-2">Level Wise Income From Level
                                        1st to 5th with the percentage
                                        of 5%, 3%, 0.5%, 0.5%, and 1%.</p>
                                    <div class="mx-auto text-center">
                                        <a href="#" class="btn bgcolor px-5 btn-info2">Buy Now</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


            </section>
            <section class="Market Trends text-light container">
                <h1 class="text-light mt-4 text-center">Market Trends</h1>
                <ul class="nav mx-auto d-flex" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link text-warning active" id="all-tab" data-toggle="tab" href="#all" role="tab"
                            aria-controls="all" aria-selected="true">View All</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-warning" id="metaverse-tab" data-toggle="tab" href="#metaverse" role="tab"
                            aria-controls="buy" aria-selected="false">Metaverse</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-warning" id="engry-tab" data-toggle="tab" href="#engry" role="tab"
                            aria-controls="sell" aria-selected="false">Engry</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-warning" id="nft-tab" data-toggle="tab" href="#nft" role="tab"
                            aria-controls="sell" aria-selected="false">NFT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-warning" id="gaming-tab" data-toggle="tab" href="#gaming" role="tab"
                            aria-controls="sell" aria-selected="false">Gaming</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-warning" id="en-tab" data-toggle="tab" href="#en" role="tab"
                            aria-controls="sell" aria-selected="false">Music</a>
                    </li>

                </ul>
                <!-- <a href="#" class="float-end">See All</a> -->
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">


                        <table class="table table-responsive-sm mx-auto text-center">
                            <thead class="border-0">
                                <tr class=" first head_clr">
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Last Price</th>
                                    <th>24h %</th>
                                    <th>Market Cap</th>
                                    <th>Last 7 Days</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="cstm_border_bottom_">
                                    <td>1.</td>
                                    <td>BTC</td>
                                    <td>$880,423,640,582</td>

                                    <td> $100</td>
                                    <td>$880,423,640,582</td>

                                    <td class="text-danger">-3.75%</td>

                                    <td class="badge">Trade</td>
                                </tr>
                                <tr class="cstm_border_bottom_">
                                    <td>2.</td>
                                    <td>BTC</td>
                                    <td>$880,423,640,582</td>
                                    <td> $100</td>
                                    <td class="text-success">+1.45%</td>
                                    <td>$880,423,640,582</td>
                                    <td class="badge">Trade</td>
                                </tr>
                                <tr class="cstm_border_bottom_">
                                    <td>3.</td>
                                    <td>BTC</td>
                                    <td>$880,423,640,582</td>
                                    <td> $100</td>
                                    <td class="text-success">+1.45%</td>
                                    <td>$880,423,640,582</td>
                                    <td class="badge">Trade</td>
                                </tr>
                                <tr class="cstm_border_bottom_">
                                    <td>4.</td>
                                    <td>BTC</td>
                                    <td>$880,423,640,582</td>
                                    <td> $100</td>
                                    <td class="text-success">+1.45%</td>
                                    <td>$880,423,640,582</td>
                                    <td class="badge">Trade</td>
                                </tr>
                                <tr class="cstm_border_bottom_">
                                    <td>5.</td>
                                    <td>BTC</td>
                                    <td>$880,423,640,582</td>
                                    <td> $100</td>
                                    <td class="text-success">+1.45%</td>
                                    <td>$880,423,640,582</td>
                                    <td class="badge">Trade</td>
                                </tr>
                                <tr class="cstm_border_bottom_">
                                    <td>6.</td>
                                    <td>BTC</td>
                                    <td>$880,423,640,582</td>
                                    <td> $100</td>
                                    <td class="text-danger">-3.75%</td>
                                    <td>$880,423,640,582</td>
                                    <td class="badge">Trade</td>
                                </tr>
                            </tbody>
                        </table>



                    </div>
                    <div class="tab-pane fade" id="metaverse" role="tabpanel" aria-labelledby="metaverse-tab">

                        <table class="table table-responsive-sm mx-auto text-center">
                            <thead class="border-0">
                                <tr class=" first head_clr">
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Last Price</th>
                                    <th>24h %</th>
                                    <th>Market Cap</th>
                                    <th>Last 7 Days</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="cstm_border_bottom_">
                                    <td>1.</td>
                                    <td>BTC</td>
                                    <td>$880,423,640,582</td>

                                    <td>
                                        $100
                                    </td>
                                    <td>$880,423,640,582</td>

                                    <td class="text-danger">-3.75%</td>

                                    <td class="badge">Trade</td>
                                </tr>
                                <tr class="cstm_border_bottom_">
                                    <td>2.</td>
                                    <td>BTC</td>
                                    <td>$880,423,640,582</td>
                                    <td>
                                        $100
                                    </td>
                                    <td class="text-success">+1.45%</td>
                                    <td>$880,423,640,582</td>
                                    <td class="badge">Trade</td>
                                </tr>
                                <tr class="cstm_border_bottom_">
                                    <td>3.</td>
                                    <td>BTC</td>
                                    <td>$880,423,640,582</td>
                                    <td>
                                        $100
                                    </td>
                                    <td class="text-success">+1.45%</td>
                                    <td>$880,423,640,582</td>
                                    <td class="badge">Trade</td>
                                </tr>
                                <tr class="cstm_border_bottom_">
                                    <td>4.</td>
                                    <td>BTC</td>
                                    <td>$880,423,640,582</td>
                                    <td>
                                        $100
                                    </td>
                                    <td class="text-success">+1.45%</td>
                                    <td>$880,423,640,582</td>
                                    <td class="badge">Trade</td>
                                </tr>
                                <tr class="cstm_border_bottom_">
                                    <td>5.</td>
                                    <td>BTC</td>
                                    <td>$880,423,640,582</td>
                                    <td>
                                        $100
                                    </td>
                                    <td class="text-success">+1.45%</td>
                                    <td>$880,423,640,582</td>
                                    <td class="badge">Trade</td>
                                </tr>
                                <tr class="cstm_border_bottom_">
                                    <td>6.</td>
                                    <td>BTC</td>
                                    <td>$880,423,640,582</td>
                                    <td>
                                        $100
                                    </td>
                                    <td class="text-danger">-3.75%</td>
                                    <td>$880,423,640,582</td>
                                    <td class="badge">Trade</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="en" role="tabpanel" aria-labelledby="en-tab">
                        <table class="table table-responsive-sm mx-auto text-center">
                            <thead class="border-0">
                                <tr class=" first head_clr">
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Last Price</th>
                                    <th>24h %</th>
                                    <th>Market Cap</th>
                                    <th>Last 7 Days</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="cstm_border_bottom_">
                                    <td>1.</td>
                                    <td>BTC</td>
                                    <td>$880,423,640,582</td>

                                    <td>
                                        $100
                                    </td>
                                    <td>$880,423,640,582</td>

                                    <td class="text-danger">-3.75%</td>

                                    <td class="badge">Trade</td>
                                </tr>
                                <tr class="cstm_border_bottom_">
                                    <td>2.</td>
                                    <td>BTC</td>
                                    <td>$880,423,640,582</td>
                                    <td>
                                        $100
                                    </td>
                                    <td class="text-success">+1.45%</td>
                                    <td>$880,423,640,582</td>
                                    <td class="badge">Trade</td>
                                </tr>
                                <tr class="cstm_border_bottom_">
                                    <td>3.</td>
                                    <td>BTC</td>
                                    <td>$880,423,640,582</td>
                                    <td>
                                        $100
                                    </td>
                                    <td class="text-success">+1.45%</td>
                                    <td>$880,423,640,582</td>
                                    <td class="badge">Trade</td>
                                </tr>
                                <tr class="cstm_border_bottom_">
                                    <td>4.</td>
                                    <td>BTC</td>
                                    <td>$880,423,640,582</td>
                                    <td>
                                        $100
                                    </td>
                                    <td class="text-success">+1.45%</td>
                                    <td>$880,423,640,582</td>
                                    <td class="badge">Trade</td>
                                </tr>
                                <tr class="cstm_border_bottom_">
                                    <td>5.</td>
                                    <td>BTC</td>
                                    <td>$880,423,640,582</td>
                                    <td>
                                        $100
                                    </td>
                                    <td class="text-success">+1.45%</td>
                                    <td>$880,423,640,582</td>
                                    <td class="badge">Trade</td>
                                </tr>
                                <tr class="cstm_border_bottom_">
                                    <td>6.</td>
                                    <td>BTC</td>
                                    <td>$880,423,640,582</td>
                                    <td>
                                        $100
                                    </td>
                                    <td class="text-danger">-3.75%</td>
                                    <td>$880,423,640,582</td>
                                    <td class="badge">Trade</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="engry" role="tabpanel" aria-labelledby="engry-tab">
                        <table class="table table-responsive-sm mx-auto text-center">
                            <thead class="border-0">
                                <tr class=" first head_clr">
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Last Price</th>
                                    <th>24h %</th>
                                    <th>Market Cap</th>
                                    <th>Last 7 Days</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="cstm_border_bottom_">
                                    <td>1.</td>
                                    <td>BTC</td>
                                    <td>$880,423,640,582</td>

                                    <td>
                                        $100
                                    </td>
                                    <td>$880,423,640,582</td>

                                    <td class="text-danger">-3.75%</td>

                                    <td class="badge">Trade</td>
                                </tr>
                                <tr class="cstm_border_bottom_">
                                    <td>2.</td>
                                    <td>BTC</td>
                                    <td>$880,423,640,582</td>
                                    <td>
                                        $100
                                    </td>
                                    <td class="text-success">+1.45%</td>
                                    <td>$880,423,640,582</td>
                                    <td class="badge">Trade</td>
                                </tr>
                                <tr class="cstm_border_bottom_">
                                    <td>3.</td>
                                    <td>BTC</td>
                                    <td>$880,423,640,582</td>
                                    <td>
                                        $100
                                    </td>
                                    <td class="text-success">+1.45%</td>
                                    <td>$880,423,640,582</td>
                                    <td class="badge">Trade</td>
                                </tr>
                                <tr class="cstm_border_bottom_">
                                    <td>4.</td>
                                    <td>BTC</td>
                                    <td>$880,423,640,582</td>
                                    <td>
                                        $100
                                    </td>
                                    <td class="text-success">+1.45%</td>
                                    <td>$880,423,640,582</td>
                                    <td class="badge">Trade</td>
                                </tr>
                                <tr class="cstm_border_bottom_">
                                    <td>5.</td>
                                    <td>BTC</td>
                                    <td>$880,423,640,582</td>
                                    <td>
                                        $100
                                    </td>
                                    <td class="text-success">+1.45%</td>
                                    <td>$880,423,640,582</td>
                                    <td class="badge">Trade</td>
                                </tr>
                                <tr class="cstm_border_bottom_">
                                    <td>6.</td>
                                    <td>BTC</td>
                                    <td>$880,423,640,582</td>
                                    <td>
                                        $100
                                    </td>
                                    <td class="text-danger">-3.75%</td>
                                    <td>$880,423,640,582</td>
                                    <td class="badge">Trade</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="nft" role="tabpanel" aria-labelledby="nft-tab">
                        <table class="table table-responsive-sm mx-auto text-center">
                            <thead class="border-0">
                                <tr class=" first head_clr">
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Last Price</th>
                                    <th>24h %</th>
                                    <th>Market Cap</th>
                                    <th>Last 7 Days</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="cstm_border_bottom_">
                                    <td>1.</td>
                                    <td>BTC</td>
                                    <td>$880,423,640,582</td>

                                    <td>
                                        $100
                                    </td>
                                    <td>$880,423,640,582</td>

                                    <td class="text-danger">-3.75%</td>

                                    <td class="badge">Trade</td>
                                </tr>
                                <tr class="cstm_border_bottom_">
                                    <td>2.</td>
                                    <td>BTC</td>
                                    <td>$880,423,640,582</td>
                                    <td>
                                        $100
                                    </td>
                                    <td class="text-success">+1.45%</td>
                                    <td>$880,423,640,582</td>
                                    <td class="badge">Trade</td>
                                </tr>
                                <tr class="cstm_border_bottom_">
                                    <td>3.</td>
                                    <td>BTC</td>
                                    <td>$880,423,640,582</td>
                                    <td>
                                        $100
                                    </td>
                                    <td class="text-success">+1.45%</td>
                                    <td>$880,423,640,582</td>
                                    <td class="badge">Trade</td>
                                </tr>
                                <tr class="cstm_border_bottom_">
                                    <td>4.</td>
                                    <td>BTC</td>
                                    <td>$880,423,640,582</td>
                                    <td>
                                        $100
                                    </td>
                                    <td class="text-success">+1.45%</td>
                                    <td>$880,423,640,582</td>
                                    <td class="badge">Trade</td>
                                </tr>
                                <tr class="cstm_border_bottom_">
                                    <td>5.</td>
                                    <td>BTC</td>
                                    <td>$880,423,640,582</td>
                                    <td>
                                        $100
                                    </td>
                                    <td class="text-success">+1.45%</td>
                                    <td>$880,423,640,582</td>
                                    <td class="badge">Trade</td>
                                </tr>
                                <tr class="cstm_border_bottom_">
                                    <td>6.</td>
                                    <td>BTC</td>
                                    <td>$880,423,640,582</td>
                                    <td>
                                        $100
                                    </td>
                                    <td class="text-danger">-3.75%</td>
                                    <td>$880,423,640,582</td>
                                    <td class="badge">Trade</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="gaming" role="tabpanel" aria-labelledby="gaming-tab">
                        <table class="table table-responsive-sm mx-auto text-center">
                            <thead class="border-0">
                                <tr class=" first head_clr">
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Last Price</th>
                                    <th>24h %</th>
                                    <th>Market Cap</th>
                                    <th>Last 7 Days</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="cstm_border_bottom_">
                                    <td>1.</td>
                                    <td>BTC</td>
                                    <td>$880,423,640,582</td>

                                    <td>
                                        $100
                                    </td>
                                    <td>$880,423,640,582</td>

                                    <td class="text-danger">-3.75%</td>

                                    <td class="badge">Trade</td>
                                </tr>
                                <tr class="cstm_border_bottom_">
                                    <td>2.</td>
                                    <td>BTC</td>
                                    <td>$880,423,640,582</td>
                                    <td>
                                        $100
                                    </td>
                                    <td class="text-success">+1.45%</td>
                                    <td>$880,423,640,582</td>
                                    <td class="badge">Trade</td>
                                </tr>
                                <tr class="cstm_border_bottom_">
                                    <td>3.</td>
                                    <td>BTC</td>
                                    <td>$880,423,640,582</td>
                                    <td>
                                        $100
                                    </td>
                                    <td class="text-success">+1.45%</td>
                                    <td>$880,423,640,582</td>
                                    <td class="badge">Trade</td>
                                </tr>
                                <tr class="cstm_border_bottom_">
                                    <td>4.</td>
                                    <td>BTC</td>
                                    <td>$880,423,640,582</td>
                                    <td>
                                        $100
                                    </td>
                                    <td class="text-success">+1.45%</td>
                                    <td>$880,423,640,582</td>
                                    <td class="badge">Trade</td>
                                </tr>
                                <tr class="cstm_border_bottom_">
                                    <td>5.</td>
                                    <td>BTC</td>
                                    <td>$880,423,640,582</td>
                                    <td>$100</td>
                                    <td class="text-success">+1.45%</td>
                                    <td>$880,423,640,582</td>
                                    <td class="badge">Trade</td>
                                </tr>
                                <tr class="cstm_border_bottom_">
                                    <td>6.</td>
                                    <td>BTC</td>
                                    <td>$880,423,640,582</td>
                                    <td>
                                        $100
                                    </td>
                                    <td class="text-danger">-3.75%</td>
                                    <td>$880,423,640,582</td>
                                    <td class="badge">Trade</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </section>
            <div class="container currency currency2 mb-5">

                <div class="heading_container heading_center mb-4 mt-3">
            
            
                  <div class="row mt-5">
                    <div class="col-md-6">
                      <h2 class="text-light left">We will help you to start Crypto Investment</h2>
                    </div>
                    <div class="col-md-6">
                      <div class="row one   text-center">
                        <button type="button" class="btn btn-info2">Let's Get Started</button>
                      </div>
            
                    </div>
                  </div>
                </div>
            
              </div>
            <section class="info_section layout_padding2">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <div class="info_detail">
                                <a class="navbar-brand" href="#">
                                    <img src="frontend/images/logo.png" width="50"> <span>VINCHI</span></a>
                                <p>necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful </p>
                            </div>
                            <div class="info_social">
                                <a href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a>
                                <a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a>
                                <a href="#"><i class="fab fa-youtube" aria-hidden="true"></i></a>
                                <a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="info_link_box">
                                <h4>
                                    Links
                                </h4>
                                <div class="info_links">
                                    <a class="active footer-links" href="#">Home</a>
                                    <a class="footer-links" href="#">About</a>
                                    <a class="footer-links" href="#">Services</a>
                                    <a class="footer-links" href="#">Pricing</a>
                                    <a class="footer-links" href="#">Contact Us</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="info_link_box">
                                <h4>Links</h4>
                                <div class="info_links">
                                    <a class="active footer-links" href="#">Home</a>
                                    <a class="footer-links" href="#">About</a>
                                    <a class="footer-links" href="#">Services</a>
                                    <a class="footer-links" href="#">Pricing</a>
                                    <a class="footer-links" href="#">Contact Us</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6">
                            <div class="info_link_box">
                                <h4>
                                    Links
                                </h4>
                                <div class="info_links">
                                    <a class="active footer-links" href="#">

                                        Home
                                    </a>
                                    <a class="footer-links" href="#">

                                        About
                                    </a>
                                    <a class="footer-links" href="#">

                                        Services
                                    </a>
                                    <a class="footer-links" href="#">

                                        Pricing
                                    </a>
                                    <a class="footer-links" href="#">

                                        Contact Us
                                    </a>
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
import Pagination from 'vue-pagination-2';
import moment from "moment";
import Header from './header.vue';



export default {
    name: "posts",
    components: {
        Pagination,
        Header
    },
    data() {
        return {
            url: process.env.mix_api_url,
            posts: [],

        };
    },
    created() {
        this.getPosts();
    },

    methods: {
        home(){
            localStorage.setItem("path", 'home');
            this.$router.push({name: 'home'});
        },
        moment(date) {
            return moment(date);
        },
        getPosts() {
            axios.get(this.url + "api/posts").then(res => {
                this.posts = res.data.posts;
            }).catch(err => {
                console.log(err);
            });
        }
    },
};
</script>