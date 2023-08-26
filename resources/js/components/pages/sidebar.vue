<template>
    <div>
        <!-- <div class="ml-auto float-right">
   <a class="nav-link " data-widget="pushmenu" href="#" role="button">X</a>
   </div> -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4" >
            <router-link :to="{ name: 'home' }" class="brand-link text-center">
                <img
                    :src="url + 'frontend/dist/img/logo.png'"
                    alt="Vinchi Logo"
                    width="60"
                />
                <span class="brand-text font-weight-light">AlgoTrade</span>
            </router-link>
            <div class="sidebar">
                <!-- <div class="form-inline ps-5 	d-block d-sm-none">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Find Something Here"
              aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div> -->

                <!-- <div class="user-panel mt-5 pb-3 mb-3 text-center">
          <div class="image">
            <img :src="url + 'frontend/dist/img/Rectangle 61.png'" class="text-center elevation-2" alt="User Image">



          </div>

        </div>
        <div class="info text-center">
          <a href="#" class="d-block">Hello John</a>
          <span>johndoe@gmail.com</span>
        </div>  -->
                <nav class="mt-5">
                    <ul
                        class="nav nav-pills nav-sidebar flex-column"
                        data-widget="treeview"
                        role="menu"
                        data-accordion="false"
                    >
                        <li class="nav-item">
                            <router-link :to="{name:'home'}" class="nav-link">
                                <span class="nav-icon material-symbols-outlined">
                                    empty_dashboard
                                </span>
                                <p>Dashboard</p>
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link :to="{name:'kyc'}" class="nav-link">
                                <span class="material-symbols-outlined nav-icon">
                                fact_check
                                </span>
                                <p>KYC</p>
                            </router-link>
                        </li>
                        <li class="nav-item" :class="{'menu-is-opening menu-open':menu_open}" @click="toggleWalletDropdown">
                            <a
                                href="#"
                                class="nav-link"
                                :class="
                                    $route.name == 'invest' ||
                                    $route.name == 'invest_history'
                                        ? 'active'
                                        : ''
                                "
                            >
                           <span class="nav-icon material-symbols-outlined">
                            crowdsource
                            </span>
                                <p>
                                    Investment
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <router-link
                                        :to="{ name: 'invest' }"
                                        class="nav-link"
                                    >
                                    <i class="far fa-hand-point-right"></i>
                                        <p>Invest</p>
                                    </router-link>
                                </li>

                                <li class="nav-item">
                                    <router-link :to="{name:'invest_history'}" class="nav-link">
                                      <i class="far fa-hand-point-right"></i>
                                        <p>Investments</p>
                                    </router-link>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item" :class="{'menu-is-opening menu-open':menu_open1}" @click="toggleWalletDropdown1">
                            <a
                                href="#"
                                class="nav-link"
                                :class="
                                    $route.name == 'wallet_history' ||
                                    $route.name == 'deposit'
                                        ? 'active'
                                        : ''
                                "
                            >
                            <span class="nav-icon material-symbols-outlined">
                                diversity_3
                                </span>
                                <p>
                                    Deposit
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <router-link
                                        :to="{ name: 'deposit' }"
                                        class="nav-link"
                                    >
                                    <i class="far fa-hand-point-right"></i>
                                        <p>Deposit</p>
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link
                                        :to="{ name: 'payments' }"
                                        class="nav-link"
                                    >
                                    <i class="far fa-hand-point-right"></i>
                                        <p>Payments</p>
                                    </router-link>
                                </li>

                                <li class="nav-item">
                                    <router-link :to="{name:'wallet_history'}" class="nav-link">
                                      <i class="far fa-hand-point-right"></i>
                                        <p>History</p>
                                    </router-link>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item" :class="{'menu-is-opening menu-open':menu_open2}" @click="toggleWalletDropdown2">
                            <a
                                href="#"
                                class="nav-link"
                                :class="
                                    $route.name == 'directs' ||
                                    $route.name == 'teams'
                                        ? 'active'
                                        : ''
                                "
                            >
                            <span class="nav-icon material-symbols-outlined">
                                diversity_3
                                </span>
                                <p>
                                    Teams
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <router-link
                                        :to="{ name: 'direct_members' }"
                                        class="nav-link"
                                    >
                                    <i class="far fa-hand-point-right"></i>
                                        <p>Directs</p>
                                    </router-link>
                                </li>

                                <li class="nav-item">
                                    <router-link :to="{name:'teams'}" class="nav-link">
                                      <i class="far fa-hand-point-right"></i>
                                        <p>Teams</p>
                                    </router-link>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item" :class="{'menu-is-opening menu-open':menu_open3}" @click="toggleWalletDropdown3">
                            <a
                                href="#"
                                class="nav-link"
                                
                            >
                            <i class="nav-icon fas fa-dollar-sign"></i>
                                <p>
                                    Earnings
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <router-link :to="{ name: 'direct_income' }" class="nav-link">
                                    <i class="far fa-hand-point-right"></i>
                                        <p>Direct Incomes</p>
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link :to="{name:'level_incomes'}" class="nav-link">
                                      <i class="far fa-hand-point-right"></i>
                                        <p>Level Incomes</p>
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link :to="{name:'nodes_profit'}" class="nav-link">
                                      <i class="far fa-hand-point-right"></i>
                                        <p>Node Profits</p>
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link class="nav-link" :to="{name:'transactions'}">
                                      <i class="far fa-hand-point-right"></i>
                                        <p> All Transactions</p>
                                    </router-link>
                                </li>
                            </ul>
                        </li>

                        <!-- <li class="nav-item">
                            <router-link :to="{name:'mining_swap'}" class="nav-link">
                                <span class="material-symbols-outlined nav-icon">
                                swap_horiz
                                </span>
                                <p>Swap</p>
                            </router-link>
                        </li> -->
                        <li class="nav-item" :class="{'menu-is-opening menu-open':menu_open4}" @click="toggleWalletDropdown4">
                            <a
                                href="#"
                                class="nav-link"
                                :class="
                                    $route.name == 'mining_swap' ||
                                    $route.name == 'payout_swap' 
                                        ? 'active'
                                        : ''"
                            >
                                <span class="material-symbols-outlined nav-icon">
                                swap_horiz
                                </span>
                                <p>
                                    Swap
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <!-- <li class="nav-item">
                                    <router-link
                                        :to="{ name: 'mining_swap' }"
                                        class="nav-link"
                                    >
                                    <i class="far fa-hand-point-right"></i>
                                        <p>Mining to Deposit</p>
                                    </router-link>
                                </li> -->
                                <li class="nav-item">
                                    <router-link :to="{name:'payout_swap'}" class="nav-link">
                                      <i class="far fa-hand-point-right"></i>
                                        <p>Mining to Payout</p>
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link :to="{name:'payout_swaps'}" class="nav-link">
                                      <i class="far fa-hand-point-right"></i>
                                        <p>Payout Swaps</p>
                                    </router-link>
                                </li>
                               
                            </ul>
                        </li>
                        <li class="nav-item" :class="{'menu-is-opening menu-open':menu_open5}" @click="toggleWalletDropdown5">
                            <a
                                href="#"
                                class="nav-link"
                                :class="
                                    $route.name == 'withdraw' ||
                                    $route.name == 'withdraw_details' 
                                        ? 'active'
                                        : ''"
                            >
                            <i class="nav-icon fas fa-file-invoice-dollar"></i>
                                <p>
                                    Withdraw
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <router-link
                                        :to="{ name: 'withdraw' }"
                                        class="nav-link"
                                    >
                                    <i class="far fa-hand-point-right"></i>
                                        <p>Withdraw</p>
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link :to="{name:'withdraw_details'}" class="nav-link">
                                      <i class="far fa-hand-point-right"></i>
                                        <p>Withdraw History</p>
                                    </router-link>
                                </li>
                               
                            </ul>
                        </li>

                        <li class="nav-item" :class="{'menu-is-opening menu-open':menu_open6}" @click="toggleWalletDropdown6">
                        <a href="#" class="nav-link" :class="($route.name == 'tickets' || $route.name == 'recent_tickets')? 'active':''">
                            <!-- <i class="nav-icon fas fa-columns"></i> -->

                            <span class="material-symbols-outlined nav-icon">
                                message
                            </span>
                            <p>
                                Support
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <router-link :to="{name:'tickets'}" class="nav-link">
                                    <i class="far fa-hand-point-right"></i>
                                    <p>Create New Ticket</p>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link :to="{name:'recent_tickets'}" class="nav-link">
                                    <i class="far fa-hand-point-right"></i>
                                    <p>Recent Tickets</p>
                                </router-link>
                            </li>
                        </ul>
                    </li>

                        
<!-- 
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fab fa-bitcoin"></i>
                                <p>Crypto</p>
                            </a>
                        </li> -->
                        
                        <!-- <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-user-cog"></i>

                                <p>Settings</p>
                            </a>
                        </li> -->
                        <li class="nav-item">
                            <a @click="logout()" class="nav-link">
                                <!-- <i class="nav-icon fas fa-columns"></i> -->
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>Logout</p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
    </div>
</template>

<script>
export default {
    data() {
        return {
            url: process.env.mix_api_url,
            walletDropdownOpen: false,
            isSidebarOpen: false,
            menu_open:false,
            menu_open1:false,
            menu_open2:false,
            menu_open3:false,
            menu_open4:false,
            menu_open5:false,
            menu_open6:false,
        };
    },
    methods: {
        toggleWalletDropdown() {
            // this.walletDropdownOpen = !this.walletDropdownOpen;
            this.menu_open = !this.menu_open;
        },
        toggleWalletDropdown1() {
            // this.walletDropdownOpen = !this.walletDropdownOpen;
            this.menu_open1 = !this.menu_open1;
        },
        toggleWalletDropdown2() {
            // this.walletDropdownOpen = !this.walletDropdownOpen;
            this.menu_open2 = !this.menu_open2;
        },
        toggleWalletDropdown3() {
            // this.walletDropdownOpen = !this.walletDropdownOpen;
            this.menu_open3 = !this.menu_open3;
        },
        toggleWalletDropdown4() {
            // this.walletDropdownOpen = !this.walletDropdownOpen;
            this.menu_open4 = !this.menu_open4;
        },
        toggleWalletDropdown5() {
            // this.walletDropdownOpen = !this.walletDropdownOpen;
            this.menu_open5 = !this.menu_open5;
        },
        toggleWalletDropdown6() {
            // this.walletDropdownOpen = !this.walletDropdownOpen;
            this.menu_open6 = !this.menu_open6;
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
            this.$router.push({ name: "index" });
        },
    },
};
</script>
