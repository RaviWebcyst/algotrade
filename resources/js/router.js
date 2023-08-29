import Vue from 'vue';
import Router from 'vue-router';

import home from './components/pages/home.vue';
import index from './components/pages/front/index.vue';
import Login from './components/pages/Login.vue';
import stocks from './components/pages/stocks.vue';
import Register from './components/pages/Register.vue';
import forgetpassword from './components/pages/forgetpassword.vue';
import deposit from './components/pages/deposit.vue';
import wallet_history from './components/pages/wallet_history.vue';
import profile from './components/pages/profile.vue';
import income_history from './components/pages/income_history.vue';
import direct_income from './components/pages/direct_income.vue';
import level_incomes from './components/pages/level_incomes.vue';
import withdraw from './components/pages/withdraw.vue';
import withdraw_details from './components/pages/withdraw_details.vue';
import direct_members from './components/pages/directs.vue';
import teams from './components/pages/team.vue';
import feed from './components/pages/feed.vue';
import trades from './components/pages/trades.vue';
import transactions from './components/pages/transactions.vue';
import downline from './components/pages/downline.vue';
import invest from './components/pages/invest.vue';
import invest_history from './components/pages/invest_history.vue';
import wallets from './components/pages/wallets.vue';

import tickets from './components/pages/tickets.vue';
import recent_tickets from './components/pages/recent_tickets.vue';
import create_ticket from './components/pages/create_ticket.vue';
import chat from './components/pages/chat.vue';
import kyc from './components/pages/kyc.vue';
import mining_swap from './components/pages/swap.vue';
import payout_swap from './components/pages/payout_swap.vue';
import payout_swaps from './components/pages/paySwap_history.vue';
import nodes_profit from './components/pages/node_profits.vue';
import payments from './components/pages/payments.vue';

import thankyou from './components/pages/thankyou.vue';
import market from './components/pages/market.vue';
import trade from './components/pages/trade.vue';
import notifications from './components/pages/notifications.vue';

Vue.use(Router);
const routes = [
    {
        path: '/notifications',
        component : notifications,
        name: 'notifications',
        meta: {
            requiresAuth : true
        },
        beforeEnter: (to, from, next) => {
            if( window.innerWidth < 600){
            document.body.classList.add('sidebar-closed','sidebar-collapse');
            document.body.classList.remove('sidebar-open');
            next();
            }
            next();
          }
    },
    {
        path: '/trade/:id',
        component : trade,
        name: 'trade',
        meta: {
            requiresAuth : true
        },
        beforeEnter: (to, from, next) => {
            if( window.innerWidth < 600){
            document.body.classList.add('sidebar-closed','sidebar-collapse');
            document.body.classList.remove('sidebar-open');
            next();
            }
            next();
          }
    },
    {
        path: '/payments',
        component : payments,
        name: 'payments',
        meta: {
            requiresAuth : true
        },
        beforeEnter: (to, from, next) => {
            if( window.innerWidth < 600){
            document.body.classList.add('sidebar-closed','sidebar-collapse');
            document.body.classList.remove('sidebar-open');
            next();
            }
            next();
          }
    },
    {
        path: '/nodes_profit',
        component : nodes_profit,
        name: 'nodes_profit',
        meta: {
            requiresAuth : true
        },
        beforeEnter: (to, from, next) => {
            if( window.innerWidth < 600){
            document.body.classList.add('sidebar-closed','sidebar-collapse');
            document.body.classList.remove('sidebar-open');
            next();
            }
            next();
          }
    },
    {
        path: '/payout_swaps',
        component : payout_swaps,
        name: 'payout_swaps',
        meta: {
            requiresAuth : true
        },
        beforeEnter: (to, from, next) => {
            if( window.innerWidth < 600){
            document.body.classList.add('sidebar-closed','sidebar-collapse');
            document.body.classList.remove('sidebar-open');
            next();
            }
            next();
          }
    },
    {
        path: '/payout_swap',
        component : payout_swap,
        name: 'payout_swap',
        meta: {
            requiresAuth : true
        },
        beforeEnter: (to, from, next) => {
            if( window.innerWidth < 600){
            document.body.classList.add('sidebar-closed','sidebar-collapse');
            document.body.classList.remove('sidebar-open');
            next();
            }
            next();
          }
    },
    {
        path: '/mining_swap',
        component : mining_swap,
        name: 'mining_swap',
        meta: {
            requiresAuth : true
        },
        beforeEnter: (to, from, next) => {
            if( window.innerWidth < 600){
            document.body.classList.add('sidebar-closed','sidebar-collapse');
            document.body.classList.remove('sidebar-open');
            next();
            }
            next();
          }
    },
    {
        path: '/kyc',
        component : kyc,
        name: 'kyc',
        meta: {
            requiresAuth : true
        },
        beforeEnter: (to, from, next) => {
            if( window.innerWidth < 600){
            document.body.classList.add('sidebar-closed','sidebar-collapse');
            document.body.classList.remove('sidebar-open');
            next();
            }
            next();
          }
    },
    {
        path: '/tickets',
        component : tickets,
        name: 'tickets',
        meta: {
            requiresAuth : true
        },
        beforeEnter: (to, from, next) => {
            if( window.innerWidth < 600){
            document.body.classList.add('sidebar-closed','sidebar-collapse');
            document.body.classList.remove('sidebar-open');
            next();
            }
            next();
          }
    },
    {
        path: '/recent_tickets',
        component : recent_tickets,
        name: 'recent_tickets',
        meta: {
            requiresAuth : true
        },
        beforeEnter: (to, from, next) => {
            if( window.innerWidth < 600){
            document.body.classList.add('sidebar-closed','sidebar-collapse');
            document.body.classList.remove('sidebar-open');
            next();
            }
            next();
          }
    },
    {
        path: '/create_ticket',
        component : create_ticket,
        name: 'create_ticket',
        meta: {
            requiresAuth : true
        },
        beforeEnter: (to, from, next) => {
            if( window.innerWidth < 600){
            document.body.classList.add('sidebar-closed','sidebar-collapse');
            document.body.classList.remove('sidebar-open');
            next();
            }
            next();
          }
    },
    {
        path: '/chat/:id',
        component : chat,
        name: 'chat',
        meta: {
            requiresAuth : true
        },
        beforeEnter: (to, from, next) => {
            if( window.innerWidth < 600){
            document.body.classList.add('sidebar-closed','sidebar-collapse');
            document.body.classList.remove('sidebar-open');
            next();
            }
            next();
          }
    },
    {
        path: '/wallets',
        component : wallets,
        name: 'wallets',
        meta: {
            requiresAuth : true
        },
        beforeEnter: (to, from, next) => {
            if( window.innerWidth < 600){
            document.body.classList.add('sidebar-closed','sidebar-collapse');
            document.body.classList.remove('sidebar-open');
            next();
            }
            next();
          }
    },
    {
        path: '/invest_history',
        component : invest_history,
        name: 'invest_history',
        meta: {
            requiresAuth : true
        },
        beforeEnter: (to, from, next) => {
            if( window.innerWidth < 600){
            document.body.classList.add('sidebar-closed','sidebar-collapse');
            document.body.classList.remove('sidebar-open');
            next();
            }
            next();
          }
    },
    {
        path: '/invest',
        component : invest,
        name: 'invest',
        meta: {
            requiresAuth : true
        },
        beforeEnter: (to, from, next) => {
            if( window.innerWidth < 600){
            document.body.classList.add('sidebar-closed','sidebar-collapse');
            document.body.classList.remove('sidebar-open');
            next();
            }
            next();
          }
    },
    {
        path: '/downline',
        component : downline,
        name: 'downline',
        meta: {
            requiresAuth : true
        },
        beforeEnter: (to, from, next) => {
            if( window.innerWidth < 600){
            document.body.classList.add('sidebar-closed','sidebar-collapse');
            document.body.classList.remove('sidebar-open');
            next();
            }
            next();
          }
    },
    {
        path: '/transactions',
        component : transactions,
        name: 'transactions',
        meta: {
            requiresAuth : true
        },
        beforeEnter: (to, from, next) => {
            if( window.innerWidth < 600){
            document.body.classList.add('sidebar-closed','sidebar-collapse');
            document.body.classList.remove('sidebar-open');
            next();
            }
            next();
          }
    },
    {
        path: '/trades',
        component: trades,
        name: "trades",
        meta: {
            requiresAuth: true
        },
        beforeEnter: (to, from, next) => {
            if( window.innerWidth < 600){
            document.body.classList.add('sidebar-closed','sidebar-collapse');
            document.body.classList.remove('sidebar-open');
            next();
            }
            next();
          }
    },
    {
        path: '/feed',
        component: feed,
        name: "feed",
        meta: {
            requiresAuth: true
        },
        beforeEnter: (to, from, next) => {
            if( window.innerWidth < 600){
            document.body.classList.add('sidebar-closed','sidebar-collapse');
            document.body.classList.remove('sidebar-open');
            next();
            }
            next();
          }
    },
    {
        path: '/direct_members',
        component: direct_members,
        name: "direct_members",
        meta: {
            requiresAuth: true
        },
        beforeEnter: (to, from, next) => {
            if( window.innerWidth < 600){
            document.body.classList.add('sidebar-closed','sidebar-collapse');
            document.body.classList.remove('sidebar-open');
            next();
            }
            next();
          }
    },
    {
        path: '/teams',
        component: teams,
        name: "teams",
        meta: {
            requiresAuth: true
        },
        beforeEnter: (to, from, next) => {
            if( window.innerWidth < 600){
            document.body.classList.add('sidebar-closed','sidebar-collapse');
            document.body.classList.remove('sidebar-open');
            next();
            }
            next();
          }
    },
    {
        path: '/withdraw',
        component: withdraw,
        name: "withdraw",
        meta: {
            requiresAuth: true
        },
        beforeEnter: (to, from, next) => {
            if( window.innerWidth < 600){
            document.body.classList.add('sidebar-closed','sidebar-collapse');
            document.body.classList.remove('sidebar-open');
            next();
            }
            next();
          }
    },
    {
        path: '/withdraw_details',
        component: withdraw_details,
        name: "withdraw_details",
        meta: {
            requiresAuth: true
        },
        beforeEnter: (to, from, next) => {
            if( window.innerWidth < 600){
            document.body.classList.add('sidebar-closed','sidebar-collapse');
            document.body.classList.remove('sidebar-open');
            next();
            }
            next();
          }
    },
    {
        path: '/income_history',
        component: income_history,
        name: "income_history",
        meta: {
            requiresAuth: true
        },
        beforeEnter: (to, from, next) => {
            if( window.innerWidth < 600){
            document.body.classList.add('sidebar-closed','sidebar-collapse');
            document.body.classList.remove('sidebar-open');
            next();
            }
            next();
          }
    },
    {
        path: '/direct_income',
        component: direct_income,
        name: "direct_income",
        meta: {
            requiresAuth: true
        },
        beforeEnter: (to, from, next) => {
            if( window.innerWidth < 600){
            document.body.classList.add('sidebar-closed','sidebar-collapse');
            document.body.classList.remove('sidebar-open');
            next();
            }
            next();
          }
    },
    {
        path: '/level_incomes',
        component: level_incomes,
        name: "level_incomes",
        meta: {
            requiresAuth: true
        },
        beforeEnter: (to, from, next) => {
            if( window.innerWidth < 600){
            document.body.classList.add('sidebar-closed','sidebar-collapse');
            document.body.classList.remove('sidebar-open');
            next();
            }
            next();
          }
    },
    {
        path: '/profile',
        component: profile,
        name: "profile",
        meta: {
            requiresAuth: true
        },
        beforeEnter: (to, from, next) => {
            if( window.innerWidth < 600){
            document.body.classList.add('sidebar-closed','sidebar-collapse');
            document.body.classList.remove('sidebar-open');
            next();
            }
            next();
          }
    },
    {
        path: '/wallet_history',
        component: wallet_history,
        name: "wallet_history",
        meta: {
            requiresAuth: true
        },
        beforeEnter: (to, from, next) => {
            if( window.innerWidth < 600){
            document.body.classList.add('sidebar-closed','sidebar-collapse');
            document.body.classList.remove('sidebar-open');
            next();
            }
            next();
          }
    },
    {
        path: '/deposit',
        component: deposit,
        name: "deposit",
        meta: {
            requiresAuth: true
        },
        beforeEnter: (to, from, next) => {
            if( window.innerWidth < 600){
            document.body.classList.add('sidebar-closed','sidebar-collapse');
            document.body.classList.remove('sidebar-open');
            next();
            }
            next();
          }
    },
    {

        path: '/home',
        component: home,
        name: "home",
        meta: {
            requiresAuth: true
        },
        beforeEnter: (to, from, next) => {
            if( window.innerWidth < 600){
            document.body.classList.add('sidebar-closed','sidebar-collapse');
            document.body.classList.remove('sidebar-open');
            next();
            }
            next();
          }


    },
    {

        path: '/market',
        component: market,
        name: "market",
        meta: {
            requiresAuth: true
        },
        beforeEnter: (to, from, next) => {
            if( window.innerWidth < 600){
            document.body.classList.add('sidebar-closed','sidebar-collapse');
            document.body.classList.remove('sidebar-open');
            next();
            }
            next();
          }


    },
    {
        path: '/forgetpassword',
        component: forgetpassword,
        name: "forgetpassword",

    },


    {
        path: '/',
        component: index,
        name: "index"

    },
    {
        path: '/stocks',
        component: stocks,
        name: "stocks"

    },
    {
        path: '/thankyou',
        component: thankyou,
        name: "thankyou"

    },


    {
        path: '/Login',
        component: Login,
        name: "Login",
        
    },


    {
        path: '/Register',
        component: Register,
        name: "Register",
        meta: {
            requiresAuth: false
        },
        beforeEnter: (to, from, next) => {
            if( window.innerWidth < 600){
            document.body.classList.add('sidebar-closed','sidebar-collapse');
            document.body.classList.remove('sidebar-open');
            next();
            }
            next();
          }
    },




];

const router = new Router({
    mode: 'history',
    routes
});

router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.requiresAuth)) {
        if (!localStorage.getItem('token')) {
            next({
                name: 'Login'
            });
        } else {
            next();
        }
    } else {
        next();
    }
});

export default router;