<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\wallet;
use App\User;
use App\pack_active;
use App\package;
use Carbon\Carbon;

class dailyRoi extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'daily:roi';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Daily ROI on user wallet Balance';

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
        $packs = pack_active::where("expire",0)->orderBy("id","asc")->get();
        foreach($packs as $pack){
            $package = package::where("id",$pack->package_id)->first();
            $user = User::where("id",$pack->user_id)->first();
           

            $check_income = wallet::where("userId",$pack->user_id)->where("from",$pack->package_id)->where("transaction_type","roi")->whereDate("created_at",Carbon::today())->count();
            //non repeating income
            if($check_income > 0 ){
                continue;
            }
            
                // $credit = wallet::where("userId",$user->id)->where("wallet_type","usd")->where("type","credit")->sum('amount');
                // $debit = wallet::where("userId",$user->id)->where("wallet_type","usd")->where("type","debit")->sum('amount');
                // $compound = $credit - $debit;

                $per = $package->percentage/100;
                $amount = $per * $package->amount;
                $wallet = new wallet();
                $wallet->user_id= $user->uid;
                $wallet->userId= $user->id;
                $wallet->wallet_type= "epin";
                $wallet->transaction_type= "roi";
                $wallet->type= "credit";
                $wallet->from=$pack->package_id;
                $wallet->description= "$package->percentage Daily ROI on amount  $package->amount";
                $wallet->amount= $amount;
                $wallet->save();

                
            
        }
    }
}
