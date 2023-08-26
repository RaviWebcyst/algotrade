<template>
    <div class="hero_area fonts">
      <front_header />
      <div class="slider_section ">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <div class="detail-box">
                <h2>
                  Let's Crypto <br>
                  Investment With<br>
                  <strong class="header-text">Loss Protection</strong>
                  <!-- <span>Loss Protection</span> -->
                </h2>
                <p class="mt-4 par">
                  Anything embarrassing hidden in the middle of text. All the Lorem Ipsuanything embarrassing
                  hidden in
                  the middle of text. All the Lorem Ipsumm </p>
                <div class="btn-box text-light">
                  <router-link :to="{ name: 'Login' }" class="btn-1">Login</router-link>
                  <router-link :to="{ name: 'Register' }" class="btn-2 text-light">Register</router-link>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="row">
                <div class=" col-lg-10 mx-auto">
                  <div class="img-box hero-sec">
                    <img :src="url + 'frontend/images/hero-img.png'" alt="" >
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container currency mb-5">
        <div class="heading_container heading_center mb-4 mt-3">
          <h4 class="mt-4"><span style="color:#C3D21C;">Top Currencies</span></h4>
          <h2 class="text-light">
            Trending Crypto Currencies
          </h2>
          <div class="row mt-5">
            <div class="col-md-4">
              <h4 class="text-light side">We Have 200+ Crypto Coins <br>with Legality Guarantee</h4>
            </div>
            <!-- <div class="col-md-8">
            <div class="row one">
              <button type="button" class="btn btn-labeled coin text-light">
                <span class="btn-label"><img :src="url + 'frontend/images/Bitcoin.svg.png'" width="40px;"> </span><span
                  style="margin-left:12px;">BITCOIN</span></button>
              <button type="button" class="btn btn-labeled coin text-light">
                <span class="btn-label"><img :src="url + 'frontend/images/Bitcoin.svg.png'" width="40px;"></span><span
                  style="margin-left:12px;">BITCOIN</span></button>
              <button type="button" class="btn btn-labeled coin text-light">
                <span class="btn-label"><img :src="url + 'frontend/images/Bitcoin.svg.png'" width="40px;"></span><span
                  style="margin-left:12px;">BITCOIN</span></button>
            </div>
            <div class="row mt-4 mb-4 one">
              <button type="button" class="btn btn-labeled coin text-light">
                <span class="btn-label"><img :src="url + 'frontend/images/Bitcoin.svg.png'" width="40px;"></span><span
                  style="margin-left:12px;">BITCOIN</span></button>
              <button type="button" class="btn btn-labeled coin text-light">
                <span class="btn-label"><img :src="url + 'frontend/images/Bitcoin.svg.png'" width="40px;"></span><span
                  style="margin-left:12px;">BITCOIN</span></button>
              <button type="button" class="btn btn-labeled coin text-light">
                <span class="btn-label"><img :src="url + 'frontend/images/Bitcoin.svg.png'" width="40px;"></span><span
                  style="margin-left:12px;">BITCOIN</span></button>
            </div>
          </div> -->

            <div class="col-md-8 col-sm-12">
              <div class="  ">

                <button type="button" class="btn btn-labeled coin text-light">
                  <span class="btn-label"><img :src="url + 'frontend/images/Bitcoin.svg.png'" width="40px;"> </span><span
                    style="margin-left:12px;">BITCOIN</span></button>
                <button type="button" class="btn btn-labeled coin text-light">
                  <span class="btn-label"><img :src="url + 'frontend/images/Bitcoin.svg.png'" width="40px;"></span><span
                    style="margin-left:12px;">BITCOIN</span></button>
                <button type="button" class="btn btn-labeled coin text-light">
                  <span class="btn-label"><img :src="url + 'frontend/images/Bitcoin.svg.png'" width="40px;"></span><span
                    style="margin-left:12px;">BITCOIN</span></button>
              </div>
              <div class="  my-4">
                <button type="button" class="btn btn-labeled coin text-light">
                  <span class="btn-label"><img :src="url + 'frontend/images/Bitcoin.svg.png'" width="40px;"></span><span
                    style="margin-left:12px;">BITCOIN</span></button>
                <button type="button" class="btn btn-labeled coin text-light">
                  <span class="btn-label"><img :src="url + 'frontend/images/Bitcoin.svg.png'" width="40px;"></span><span
                    style="margin-left:12px;">BITCOIN</span></button>
                <button type="button" class="btn btn-labeled coin text-light">
                  <span class="btn-label"><img :src="url + 'frontend/images/Bitcoin.svg.png'" width="40px;"></span><span
                    style="margin-left:12px;">BITCOIN</span></button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <section class="container  slide-one">
        <div class="row">
            <div class="col-md-6">
              <h2 class="mb-3  text-light top-hed">Most <span style="color:#C3D21C;">Popular</span> Currency<br>
                Legality Guarantee </h2>

            </div>
            <div class="col-md-6">
              <h5 class="right-hed text-light">We have 200+ Crypto Coins with Legality <br> Guarantee</h5>
              <!-- <a class="btn btn-primary mb-3 mr-1" href="#carouselExampleIndicators2" role="button" data-slide="prev">
                      <i class="fa fa-arrow-left"></i>
                  </a>
                  <a class="btn btn-primary mb-3 " href="#carouselExampleIndicators2" role="button" data-slide="next">
                      <i class="fa fa-arrow-right"></i>
                  </a> -->
            </div>
        </div>
      </section>
      <section class=" ">
        <div class="container-fluid">
         <div class="row">
            <div class="col-12 mt-4">
              <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">

                <div class="carousel-inner">
                  <div class="carousel-item marquee active">
                    <div class="d-flex">
                      <div class="col-lg-3 col-sm-12 col-12 d-flex flex-column mb-3 ">
                        <div class="card flex-row"><img class="card-img-left example-card-img-responsive"
                            :src="url + 'frontend/images/Bitcoin.svg.png'" width="100px;" />
                          <div class="card-body">
                            <h4 class="card-title h5 h4-sm">BITCOIN</h4>
                            <p class="card-text">$896.84BTC <span style="color:#C3D21C">+6.13</span>
                            </p>

                          </div>
                        </div>
                      </div>
                      <div class="col-lg-3 col-sm-12 col-12 d-flex flex-column mb-3">
                        <div class="card flex-row"><img class="card-img-left example-card-img-responsive"
                            :src="url + 'frontend/images/bnb.png'" width="100px;" />
                          <div class="card-body">
                            <h4 class="card-title h5 h4-sm">BNB</h4>
                            <p class="card-text">$896.84BTC<span style="color:#C3D21C">+6.13</span>
                            </p>

                          </div>
                        </div>
                      </div>
                      <div class="col-lg-3 col-sm-12 col-12 d-flex flex-column mb-3">
                        <div class="card flex-row"><img class="card-img-left example-card-img-responsive"
                            :src="url + 'frontend/images/cardano.png'" width="100px;" />
                          <div class="card-body">
                            <h4 class="card-title h5 h4-sm">CARDANO</h4>
                            <p class="card-text">$896.84BTC <span style="color:#C3D21C">+6.13</span>
                            </p>

                          </div>
                        </div>
                      </div>
                      <div class="col-lg-3 col-sm-12 col-12 d-flex flex-column mb-3">
                        <div class="card flex-row"><img class="card-img-left example-card-img-responsive"
                            :src="url + 'frontend/images/etherem.png'" width="100px;" />
                          <div class="card-body">
                            <h4 class="card-title h5 h4-sm">ETHEREUM</h4>
                            <p class="card-text">$896.84BTC<span style="color:#C3D21C">+6.13</span>
                            </p>

                          </div>
                        </div>
                      </div>


                    </div>
                  </div>
                  <div class="carousel-item">
                    <div class="d-flex">

                      <div class="col-lg-3 col-sm-12 col-12 d-flex flex-column mb-3">
                        <div class="card flex-row"><img class="card-img-left example-card-img-responsive"
                            :src="url + 'frontend/images/polygon.png'" width="100px;" />
                          <div class="card-body">
                            <h4 class="card-title h5 h4-sm">POLYGON</h4>
                            <p class="card-text">$896.84BTC <span style="color:#C3D21C">+6.13</span>
                            </p>

                          </div>
                        </div>
                      </div>
                      <div class="col-lg-3 col-sm-12 col-12 d-flex flex-column mb-3">
                        <div class="card flex-row"><img class="card-img-left example-card-img-responsive"
                            :src="url + 'frontend/images/solana.png'" width="100px;" />
                          <div class="card-body">
                            <h4 class="card-title h5 h4-sm">SOLANA</h4>
                            <p class="card-text">$896.84BTC<span style="color:#C3D21C"> +6.13</span>
                            </p>

                          </div>
                        </div>
                      </div>
                      <div class="col-lg-3 col-sm-12 col-12 d-flex flex-column mb-3">
                        <div class="card flex-row"><img class="card-img-left example-card-img-responsive"
                            :src="url + 'frontend/images/lite.jpg'" width="100px;" />
                          <div class="card-body">
                            <h4 class="card-title h5 h4-sm">LITECOIN</h4>
                            <p class="card-text">$896.84BTC<span style="color:#C3D21C"> +6.13</span>
                            </p>

                          </div>
                        </div>
                      </div>
                      <div class="col-lg-3 col-sm-12 col-12 d-flex flex-column mb-3">
                        <div class="card flex-row"><img class="card-img-left example-card-img-responsive"
                            :src="url + 'frontend/images/toncoin.png'" width="100px;" />
                          <div class="card-body">
                            <h4 class="card-title h5 h4-sm">TONCOIN</h4>
                            <p class="card-text">$896.84BTC <span style="color:#C3D21C">
                                +6.13</span></p>

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
          <div class="row">

            <div class="col-md-6">

              <!-- <a class="btn btn-primary mb-3 mr-1" href="#carouselExampleIndicators2" role="button" data-slide="prev">
                      <i class="fa fa-arrow-left"></i>
                  </a>
                  <a class="btn btn-primary mb-3 " href="#carouselExampleIndicators2" role="button" data-slide="next">
                      <i class="fa fa-arrow-right"></i>
                  </a> -->
            </div>
            <div class="col-12 mt-4">
              <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">

                <div class="carousel-inner">
                  <div class="carousel-item marquee active">
                    <div class="d-flex">
                      <div class="col-lg-3 col-sm-12 col-12 d-flex flex-column mb-3 ">
                        <div class="card flex-row"><img class="card-img-left example-card-img-responsive"
                            :src="url + 'frontend/images/Bitcoin.svg.png'" width="100px;" />
                          <div class="card-body">
                            <h4 class="card-title h5 h4-sm">BITCOIN</h4>
                            <p class="card-text">$896.84BTC <span style="color:#C3D21C">+6.13</span>
                            </p>

                          </div>
                        </div>
                      </div>
                      <div class="col-lg-3 col-sm-12 col-12 d-flex flex-column mb-3">
                        <div class="card flex-row"><img class="card-img-left example-card-img-responsive"
                            :src="url + 'frontend/images/bnb.png'" width="100px;" />
                          <div class="card-body">
                            <h4 class="card-title h5 h4-sm">BNB</h4>
                            <p class="card-text">$896.84BTC<span style="color:#C3D21C">+6.13</span>
                            </p>

                          </div>
                        </div>
                      </div>
                      <div class="col-lg-3 col-sm-12 col-12 d-flex flex-column mb-3">
                        <div class="card flex-row"><img class="card-img-left example-card-img-responsive"
                            :src="url + 'frontend/images/cardano.png'" width="100px;" />
                          <div class="card-body">
                            <h4 class="card-title h5 h4-sm">CARDANO</h4>
                            <p class="card-text">$896.84BTC <span style="color:#C3D21C">+6.13</span>
                            </p>

                          </div>
                        </div>
                      </div>
                      <div class="col-lg-3 col-sm-12 col-12 d-flex flex-column mb-3">
                        <div class="card flex-row"><img class="card-img-left example-card-img-responsive"
                            :src="url + 'frontend/images/etherem.png'" width="100px;" />
                          <div class="card-body">
                            <h4 class="card-title h5 h4-sm">ETHEREUM</h4>
                            <p class="card-text">$896.84BTC<span style="color:#C3D21C">+6.13</span>
                            </p>

                          </div>
                        </div>
                      </div>


                    </div>
                  </div>
                  <div class="carousel-item">
                    <div class="d-flex">

                      <div class="col-lg-3 col-sm-12 col-12 d-flex flex-column mb-3">
                        <div class="card flex-row"><img class="card-img-left example-card-img-responsive"
                            :src="url + 'frontend/images/polygon.png'" width="100px;" />
                          <div class="card-body">
                            <h4 class="card-title h5 h4-sm">POLYGON</h4>
                            <p class="card-text">$896.84BTC <span style="color:#C3D21C">+6.13</span>
                            </p>

                          </div>
                        </div>
                      </div>
                      <div class="col-lg-3 col-sm-12 col-12 d-flex flex-column mb-3">
                        <div class="card flex-row"><img class="card-img-left example-card-img-responsive"
                            :src="url + 'frontend/images/solana.png'" width="100px;" />
                          <div class="card-body">
                            <h4 class="card-title h5 h4-sm">SOLANA</h4>
                            <p class="card-text">$896.84BTC<span style="color:#C3D21C"> +6.13</span>
                            </p>

                          </div>
                        </div>
                      </div>
                      <div class="col-lg-3 col-sm-12 col-12 d-flex flex-column mb-3">
                        <div class="card flex-row"><img class="card-img-left example-card-img-responsive"
                            :src="url + 'frontend/images/lite.jpg'" width="100px;" />
                          <div class="card-body">
                            <h4 class="card-title h5 h4-sm">LITECOIN</h4>
                            <p class="card-text">$896.84BTC<span style="color:#C3D21C"> +6.13</span>
                            </p>

                          </div>
                        </div>
                      </div>
                      <div class="col-lg-3 col-sm-12 col-12 d-flex flex-column mb-3">
                        <div class="card flex-row"><img class="card-img-left example-card-img-responsive"
                            :src="url + 'frontend/images/toncoin.png'" width="100px;" />
                          <div class="card-body">
                            <h4 class="card-title h5 h4-sm">TONCOIN</h4>
                            <p class="card-text">$896.84BTC <span style="color:#C3D21C">
                                +6.13</span></p>

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
      </section>

      <section class="about_section layout_padding-bottom">
        <div class="container  ">
          <div class="row">

            <div class="col-md-6 ">
              <div class="img-box">
                <img :src="url + 'frontend/images/about.png'" alt="">
              </div>
            </div>
            <div class="col-md-6">
              <div class="detail-box righ">
                <div class="heading_container">
                  <h6 class="small-hed mb-3 about-btn">BEST SERVICES</h6>
                  <div class="text-light top-hed space-top">
                    LOSS PROTECTION WITH
                    PREDICTION <span style="color:#C3D21C;">AI </span>SYSTEM
                  </div>
                </div>
                <p class="para">
                  TECHNOLOGY 4.0 ARTIFICIAL INTELLIGENCE CAN HAVE<br> UP TO 80% PROFIT </p>
                <a href="" class="about-btn">
                  Learn More
                </a>
              </div>
            </div>
          </div>
        </div>
      </section>


      <!-- end about section -->


      <!-- server section -->

      <div class="about_section service2 layout_padding-bottom">
        <div class="container  ">
          <div class="row">
            <div class="col-md-6">
              <div class="detail-box sec">
                <div class="heading_container">
                  <h6 class="small-hed mb-3 about-btn">BEST SERVICES</h6>
                  <h2 class="text-light top-hed space-top">
                    LOSS PROTECTION WITH
                    PREDICTION <span style="color:#C3D21C;">AI </span>SYSTEM
                  </h2>
                </div>
                <p class="para">
                  TECHNOLOGY 4.0 ARTIFICIAL INTELLIGENCE CAN HAVE<br> UP TO 80% PROFIT </p>
                <a href="" class="about-btn">
                  Learn More
                </a>
              </div>
            </div>
            <div class="col-md-6 ">
              <div class="img-box second">
                <img :src="url + 'frontend/images/about.png'" alt="">
              </div>
            </div>

          </div>
        </div>
      </div>
      <div class="about_section service3 layout_padding-bottom">
        <div class="container  ">
          <div class="row">

            <div class="col-md-6 ">
              <div class="img-box">
                <img :src="url + 'frontend/images/about.png'" alt="">
              </div>
            </div>
            <div class="col-md-6">
              <div class="detail-box righ">
                <div class="heading_container">

                  <h6 class="small-hed mb-3 about-btn">BEST SERVICES</h6>
                  <h2 class="text-light top-hed space-top">
                    LOSS PROTECTION WITH
                    PREDICTION <span style="color:#C3D21C;">AI </span>SYSTEM
                  </h2>
                </div>
                <p class="para">
                  TECHNOLOGY 4.0 ARTIFICIAL INTELLIGENCE CAN HAVE<br> UP TO 80% PROFIT </p>
                <a href="" class="about-btn">
                  Learn More
                </a>
              </div>
            </div>
          </div>
        </div>

      </div>
      <div class="client_section">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <div class="heading_container heading_center res">
                <h6 class="small-hed mb-3">BEST SERVICES</h6>
                <h1 class="text-light ">
                  We will <span style="color:#C3D21C;">help you to start</span><br>
                  Crypto Investment
                </h1>
              </div>
            </div>
            <div class="text-right">
              <button type="button" class="btn btn-info_cstm butn">Let's Get Started</button>
            </div>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="container px-4">
              <div class="row gx-5">
                <div class="col bb">
                  <div class="outer ">
                    <div class="p-4 border acco border border-right-0">
                      <img :src="url + 'frontend/images/one (1).png'" class="num">
                      <h2 class="mt-4">CREATE ACCOUNT</h2>
                      <p class="mb-3">
                        YOUR FIRST STEP IS TO CREATE
                        AN ACCOUNT ON THIS PLATFORM SO YOU CAN START INVESTING IN CRYPTO</p>
                    </div>
                  </div>
                </div>
                <div class="col aa">
                  <div class="outer">
                    <div class="p-4 acco ">
                      <img :src="url + 'frontend/images/one (3).png'" class="num">
                      <h2 class="mt-4">CREATE ACCOUNT</h2>
                      <p>
                        YOUR FIRST STEP IS TO CREATE
                        AN ACCOUNT ON THIS PLATFORM SO YOU CAN START INVESTING IN CRYPTO</p>
                    </div>
                  </div>
                </div>


                <div class="col aa">
                  <div class="outer">
                    <div class="p-4 acco ">
                      <img :src="url + 'frontend/images/one (2).png'" class="num">
                      <h2 class="mt-4">CREATE ACCOUNT</h2>
                      <p>
                        YOUR FIRST STEP IS TO CREATE
                        AN ACCOUNT ON THIS PLATFORM SO YOU CAN START INVESTING IN CRYPTO</p>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
      <section class="client_section client_box">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <div class="heading_container heading_center res">
                <h6 class="small-hed mb-3">BEST SERVICES</h6>
                <h1 class="text-light ">
                  We will <span style="color:#C3D21C;">help you to start</span><br>
                  Crypto Investment
                </h1>
              </div>
            </div>
            <div class="text-right">
              <button type="button" class="btn btn-info_cstm butn">Let's Get Started</button>


            </div>
          </div>
        </div>
        <div class="container">
          <div id="customCarousel2" class="carousel  slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="container">
                  <div class="d-flex">
                    <div class="col-lg-6 col-sm-12 col-12 d-flex flex-column">
                      <div class="box">

                        <div class=" test">
                          <!-- <div class="client_info">
                          <div class="client_name">
                            <h5>
                              Morojink
                            </h5>
                            <h6>
                              Customer
                            </h6>
                          </div>
                          <i class="fa fa-quote-left" aria-hidden="true"></i>
                        </div> -->
                          <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore
                            et
                            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
                            ut
                            aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit
                            esse
                            cillum
                            dolore eu fugia
                          </p>
                          <div class="row">
                            <img :src="url + 'frontend/images/bnb.png'" height="30px" width="30px">
                            <h4 class="px-3">Jai Dev </h4>
                            <div class=" ml-auto pl-3"><i class="fas fa-star text-warning"></i><i
                                class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i
                                class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i></div>

                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6 col-sm-12 col-12 d-flex flex-column">
                      <div class="box">

                        <div class="test">
                          <!-- <div class="client_info">
                          <div class="client_name">
                            <h5>
                              Morojink
                            </h5>
                            <h6>
                              Customer
                            </h6>
                          </div>
                          <i class="fa fa-quote-left" aria-hidden="true"></i>
                        </div> -->
                          <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore
                            et
                            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
                            ut
                            aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit
                            esse
                            cillum
                            dolore eu fugia
                          </p>
                          <div class="row">
                            <img :src="url + 'frontend/images/bnb.png'" height="30px" width="30px">
                            <h4 class="px-3">Jai Dev </h4>
                            <div class=" ml-auto pl-3"><i class="fas fa-star text-warning"></i><i
                                class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i
                                class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i></div>

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="container">
                  <div class="d-flex">
                    <div class="col-lg-6 col-sm-12 col-12 d-flex flex-column">
                      <div class="box">

                        <div class=" test">
                          <!-- <div class="client_info">
                          <div class="client_name">
                            <h5>
                              Morojink
                            </h5>
                            <h6>
                              Customer
                            </h6>
                          </div>
                          <i class="fa fa-quote-left" aria-hidden="true"></i>
                        </div> -->
                          <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore
                            et
                            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
                            ut
                            aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit
                            esse
                            cillum
                            dolore eu fugia
                          </p>
                          <div class="row">
                            <img :src="url + 'frontend/images/bnb.png'" height="30px" width="30px">
                            <h4 class="px-3">Jai Dev </h4>
                            <div class=" ml-auto pl-3"><i class="fas fa-star text-warning"></i><i
                                class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i
                                class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i></div>

                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6 col-sm-12 col-12 d-flex flex-column">
                      <div class="box">

                        <div class="test">
                          <!-- <div class="client_info">
                          <div class="client_name">
                            <h5>
                              Morojink
                            </h5>
                            <h6>
                              Customer
                            </h6>
                          </div>
                          <i class="fa fa-quote-left" aria-hidden="true"></i>
                        </div> -->
                          <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore
                            et
                            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
                            ut
                            aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit
                            esse
                            cillum
                            dolore eu fugia
                          </p>
                          <div class="row">
                            <img :src="url + 'frontend/images/bnb.png'" height="30px" width="30px">
                            <h4 class="px-3">Jai Dev </h4>
                            <div class=" ml-auto pl-3"><i class="fas fa-star text-warning"></i><i
                                class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i
                                class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i></div>

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="container">
                  <div class="d-flex">
                    <div class="col-lg-6 col-sm-12 col-12 d-flex flex-column">
                      <div class="box">

                        <div class=" test">
                          <!-- <div class="client_info">
                          <div class="client_name">
                            <h5>
                              Morojink
                            </h5>
                            <h6>
                              Customer
                            </h6>
                          </div>
                          <i class="fa fa-quote-left" aria-hidden="true"></i>
                        </div> -->
                          <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore
                            et
                            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
                            ut
                            aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit
                            esse
                            cillum
                            dolore eu fugia
                          </p>
                          <div class="row">
                            <img :src="url + 'frontend/images/bnb.png'" height="30px" width="30px">
                            <h4 class="px-3">Jai Dev </h4>
                            <div class=" ml-auto pl-3"><i class="fas fa-star text-warning"></i><i
                                class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i
                                class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i></div>

                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6 col-sm-12 col-12 d-flex flex-column">
                      <div class="box">

                        <div class="test">
                          <!-- <div class="client_info">
                          <div class="client_name">
                            <h5>
                              Morojink
                            </h5>
                            <h6>
                              Customer
                            </h6>
                          </div>
                          <i class="fa fa-quote-left" aria-hidden="true"></i>
                        </div> -->
                          <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore
                            et
                            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
                            ut
                            aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit
                            esse
                            cillum
                            dolore eu fugia
                          </p>
                          <div class="row">
                            <img :src="url + 'frontend/images/bnb.png'" height="30px" width="30px">
                            <h4 class="px-3">Jai Dev </h4>
                            <div class=" ml-auto pl-3"><i class="fas fa-star text-warning"></i><i
                                class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i
                                class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i></div>

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="carousel_btn-box">
              <a class="carousel-control-prev" href="#customCarousel2" role="button" data-slide="prev">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#customCarousel2" role="button" data-slide="next">
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
        </div>
      </section>

      <div class="container currency currency2 mb-5">

        <div class="heading_container heading_center mb-4 mt-3">


          <div class="row mt-5">
            <div class="col-md-6">
              <h2 class="text-light left">We will help you to start<br>
                Crypto Investment</h2>
            </div>
            <div class="col-md-6">
              <div class="row one">
                <!-- <button type="button" class="btn btn-info2">Let's Get Started</button> -->
                <button type="button" class="btn btn-info2">Let's Get Started</button>

              </div>

            </div>
          </div>
        </div>

      </div>
      <section class="info_section layout_padding2">
        <div class="container">
          <div class="row">
            <div class="col-md-3">
              <div class="info_detail">
                <a class="navbar-brand" href="#">
                  <img src="frontend/images/logo.png" width="50"> <span>VINCHI</span>
                </a>

                <p>
                  necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin
                  words, combined with a handful
                </p>
              </div>
              <div class="info_social">
                <a href="#">
                  <i class="fab fa-facebook" aria-hidden="true"></i>
                </a>
                <a href="#">
                  <i class="fab fa-twitter" aria-hidden="true"></i>
                </a>
                <a href="#">
                  <i class="fab fa-youtube" aria-hidden="true"></i>
                </a>
                <a href="#">
                  <i class="fab fa-instagram" aria-hidden="true"></i>
                </a>
              </div>
            </div>
            <div class="col-md-3">
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
            <div class="col-md-3">
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

            <div class="col-md-3">
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

      <Footer />
    </div>
</template>

<script>
import front_header from "./header.vue";
export default {
  name: 'IndexPage',
  components: {
    front_header
  },
  data() {   
    return {
      url: process.env.mix_api_url,
    };
  },
  created() {

  },
  mounted() {

  }
}
</script>
