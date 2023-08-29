<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\wallet;
use App\User;
use App\pack_active;
use App\trade;
use App\trade_setting;
use App\package;
use Carbon\Carbon;

class compound_income extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'compound:income';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send compound income';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // $packs = pack_active::where("expire",0)->orderBy("id","asc")->get();
        $trades = trade::where("type","buy")->get();
        foreach($trades as $trade){
            $user = User::where("id",$trade->user_id)->first();
           
            // check income recieved to user
            $check_income = wallet::where("userId",$trade->user_id)->where("from",$trade->id)->where("transaction_type","compound_income")->whereDate("created_at",Carbon::today())->count();
            if($check_income > 0 ){
                continue;
            }

            $sett = trade_setting::where("symbol",$trade->symbol)->first();



            if($sett == null){
                continue;
            }
           
                $per = ($sett->profit/100);
            
            
           
                $credit = wallet::where("userId",$user->id)->where("wallet_type","compound")->where("type","credit")->sum('amount');
                $debit = wallet::where("userId",$user->id)->where("wallet_type","compound")->where("type","debit")->sum('amount');
                $compound = $credit - $debit;

                
                $profit = $compound+$trade->quantity;

                $amount = $per * $profit;
                $wallet = new wallet();
                $wallet->user_id= $user->uid;
                $wallet->userId= $user->id;
                $wallet->wallet_type= "compound";
                $wallet->from= $trade->id;
                $wallet->transaction_type= "compound_income";
                $wallet->type= "credit";
                $wallet->description= "compound income on profit amount $profit";
                $wallet->amount= $amount;
                $wallet->save();
            
        }
    }
}
