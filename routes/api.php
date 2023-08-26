<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post("user",'usersController@user');

Route::post("deposit_history",'usersController@deposit_history');
Route::post("allOrders",'usersController@allOrders');
Route::post("getResult",'usersController@getResult');
Route::post("transactions",'usersController@transactions');
Route::post("getUserDetails",'usersController@userDetails');
Route::post("userlogin",'usersController@userlogin');
Route::post("getSponser",'usersController@getSponser');
Route::post("payment",'usersController@payment');
Route::post("getPayments",'usersController@getPayments');
Route::post("submitBet",'usersController@submitBet');
Route::post("updateProfile",'usersController@updateProfile');
Route::post("prevGames",'usersController@prevGames');
Route::post("lastGame",'usersController@lastGame');
Route::post("allGames",'usersController@allGames');
Route::get("getGameId",'usersController@getGameId');
Route::post("userLogout",'usersController@userLogout');
Route::post("cash_payments",'usersController@cash_payments');
Route::post("direct_members",'usersController@direct_list');
Route::post("team_members",'usersController@team_list');
Route::post("withdraw",'usersController@withdraw');
Route::post("withdraws",'usersController@withdraw_details');

Route::post("upi",'usersController@getUpi');
Route::post("getTime",'usersController@getTime');

Route::post("post_swap",'usersController@swap');
Route::post("user_register",'usersController@user_register');
Route::get("getGainers",'usersController@getGainers');
Route::get("getLoser",'usersController@getLoser');
Route::get("packages",'usersController@packages');
Route::post("buy_package",'usersController@buy_package');
Route::post("invest_details",'usersController@my_packages');
Route::post("level_incomes",'usersController@level_incomes');
Route::post("direct_incomes",'usersController@direct_incomes');
Route::post("income_history",'usersController@income_history');
Route::get("top_price",'usersController@top_price');
Route::get("getPrices",'usersController@getPrices');
Route::get("posts",'usersController@getPosts');
Route::get("crypto_price",'usersController@crypto_price');

Route::post("deposit",'usersController@deposit');
Route::post("success_url",'usersController@success_url');
Route::post("trades",'usersController@trades');


Route::post("send_message","usersController@sendMsg");
Route::get("recent_tickets","usersController@recentTickets");
Route::get("resolved_tickets","usersController@resolvedTickets");
Route::post("chat","usersController@chat");
Route::get("chats","usersController@recentChat");
Route::post("getBalance","usersController@walletBalance");

Route::post("node_balances","usersController@node_balances");
Route::post("paySwap_history","usersController@paySwap_history");
Route::post("node_profits","usersController@node_profits");

Route::post("payment_history","usersController@payment_history");


Route::post("store_kyc","usersController@user_kyc");

Route::post("swap","usersController@swap");
Route::post("swap_payout","usersController@swap_payout");







Route::get("test",'usersController@test');
