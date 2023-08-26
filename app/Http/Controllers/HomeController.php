<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\wallet;
use App\result;
use App\withdraw;
use App\package;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function adminHome()
    {
        $users = User::where("is_admin",0)->count();
        $active_users = User::where("is_admin",0)->where("enable",1)->count();
        $inactive_users = User::where("is_admin",0)->where("enable",0)->count();
        $total_deposit = wallet::where("transaction_type","deposit")->sum('amount');
        $total_interest = wallet::where("transaction_type","roi")->sum('amount');
        $level_income = wallet::where("transaction_type","level_income")->sum('amount');
        $total_withdraw = withdraw::where("status","accepted")->sum('amount');
        $packages=  package::orderBy("id","asc")->get();
        
        return view('admin.home',compact('users','total_deposit','total_interest','inactive_users','active_users','total_withdraw','level_income','packages'));
    }
}
