<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// vue routes start
Route::get('/', function () {
    return redirect('Login');
    // return view('welcome');
});
Route::get('/downline', function () {
    return view('welcome');
});
Route::get('/transactions', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return view('welcome');
})->name('user.home');
Route::get('/stocks', function () {
    return view('welcome');
});
Route::get('/invite', function () {
    return view('welcome');
});
Route::get('/profile', function () {
    return view('welcome');
});
Route::get('/recharge', function () {
    return view('welcome');
});
Route::get('/payment_history', function () {
    return view('welcome');
});
Route::get('/payment', function () {
    return view('welcome');
});
Route::get('/orders', function () {
    return view('welcome');
});
Route::get('/deposit', function () {
    return view('welcome');
});
Route::get('/Login', function () {
    return view('welcome');
});
Route::get('/Register', function () {
    return view('welcome');
});
Route::get('/direct_members', function () {
    return view('welcome');
});
Route::get('/edit_profile', function () {
    return view('welcome');
});
Route::get('/cash_payments', function () {
    return view('welcome');
});
Route::get('/wallet_history', function () {
    return view('welcome');
});
Route::get('/teams', function () {
    return view('welcome');
});
Route::get('/team_list', function () {
    return view('welcome');
});
Route::get('/withdraw', function () {
    return view('welcome');
});
Route::get('/withdraw_details', function () {
    return view('welcome');
});
Route::get('/feed', function () {
    return view('welcome');
});
Route::get('/invest_history', function () {
    return view('welcome');
});
Route::get('/income_history', function () {
    return view('welcome');
});
Route::get('/direct_income', function () {
    return view('welcome');
});
Route::get('/level_incomes', function () {
    return view('welcome');
});
Route::get('/invest', function () {
    return view('welcome');
});
Route::get('/wallets', function () {
    return view('welcome');
});
Route::get('/tickets', function () {
    return view('welcome');
});
Route::get('/recent_tickets', function () {
    return view('welcome');
});
Route::get('/create_ticket', function () {
    return view('welcome');
});
Route::get('/kyc', function () {
    return view('welcome');
});
Route::get('/chat/{id}', function () {
    return view('welcome');
});

Route::get('mining_swap', function () {
    return view('welcome');
});
Route::get('wallets', function () {
    return view('welcome');
});
Route::get('payout_swap', function () {
    return view('welcome');
});
Route::get('payout_swaps', function () {
    return view('welcome');
});
Route::get('nodes_profit', function () {
    return view('welcome');
});
Route::get('payments', function () {
    return view('welcome');
});
Route::get('thankyou', function () {
    return view('welcome');
});
Route::get('market', function () {
    return view('welcome');
});
Route::get('trade/{id}', function () {
    return view('welcome');
});


Route::get("/admin/login",'usersController@admin_login')->name('admin.login');
Route::post("/admin/user_login",'usersController@user_login')->name('admin.user_login');


// Route::get('/{any}', function () {
//     return view('welcome');
// });

// vue routes end



 Auth::routes();


Route::middleware(['auth','is_admin'])->prefix('admin')->group(function(){
    Route::get('home', 'HomeController@adminHome')->name('admin.home');
    Route::get("users",'usersController@users')->name("admin.users");
    Route::get("activeUsers",'usersController@activeUsers')->name("admin.activeUsers");

    Route::get("editUser/{id}",'usersController@editUser')->name("admin.editUser");
    Route::post("updateUser/{id}",'usersController@updateUser')->name("admin.updateUser");

    Route::get("sendEpin/{id}",'usersController@sendEpin')->name("admin.sendEpin");
    Route::post("postEpin/{id}",'usersController@postEpin')->name("admin.postEpin");

    Route::get("direct_incomes",'usersController@direct_income')->name("admin.direct_incomes");
    Route::get("level_incomes",'usersController@level_income')->name("admin.level_incomes");
    Route::get("daily_incomes",'usersController@daily_income')->name("admin.daily_incomes");
    Route::get("transactions",'usersController@all_transactions')->name("admin.transactions");
    
    //user payments
    Route::get("pending_payments",'usersController@pending_payments')->name('admin.pending_payments');
    Route::post("accept_payment",'usersController@accept_payment')->name('admin.accept_payment');
    Route::post("reject_payment",'usersController@reject_payment')->name('admin.reject_payment');

    Route::get("completed_payments",'usersController@completed_payments')->name('admin.completed_payments');
    Route::get("rejected_payments",'usersController@rejected_payments')->name('admin.rejected_payments');

    Route::get("manual_game",'usersController@manual_game')->name('admin.manual_game');
    Route::post("setResult",'usersController@setResult')->name('admin.setResult');

    Route::get("pending_withdraw",'usersController@pending_withdraw')->name('admin.pending_withdraw');
    Route::get("completed_withdraw",'usersController@completed_withdraw')->name('admin.completed_withdraw');
    Route::get("rejected_withdraw",'usersController@rejected_withdraw')->name('admin.rejected_withdraw');
    Route::post("acceptWd",'usersController@acceptWd')->name('admin.acceptWd');
    Route::post("rejectWd",'usersController@rejectWd')->name('admin.rejectWd');

    Route::get("pending_kyc",'usersController@pending_kyc')->name('admin.pending_kyc');
    Route::get("completed_kyc",'usersController@completed_kyc')->name('admin.completed_kyc');
    Route::get("rejected_kyc",'usersController@rejected_kyc')->name('admin.rejected_kyc');
    Route::post("accept_kyc/{id}",'usersController@accept_kyc')->name('admin.accept_kyc');
    Route::post("reject_kyc",'usersController@reject_kyc')->name('admin.reject_kyc');

    Route::get("add_upi",'usersController@add_upi')->name('admin.add_upi');
    Route::post("store_upi",'usersController@store_upi')->name('admin.store_upi');

    Route::get("posts",'usersController@posts')->name('admin.posts');
    Route::get("add_post",'usersController@add_post')->name('admin.add_post');
    Route::get("edit_post/{id}",'usersController@edit_post')->name('admin.edit_post');
    Route::get("delete_post/{id}",'usersController@delete_post')->name('admin.delete_post');
    Route::post("store_post",'usersController@store_post')->name('admin.store_post');
    Route::post("update_post/{id}",'usersController@update_post')->name('admin.update_post');



    Route::get("pending_queries",'usersController@queries')->name("admin.queries");
    Route::get("resolved_queries",'usersController@resolved')->name("admin.resolved");
    Route::post("changeStatus/{id}",'usersController@changeStatus')->name("admin.status");
    Route::get("chat/{id}",'usersController@admin_chat')->name("admin.chat");
    Route::post("sendMessage/{id}",'usersController@sendMessage')->name("admin.sendMessage");


});



// Route::get('/home', 'HomeController@index')->name('home');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
