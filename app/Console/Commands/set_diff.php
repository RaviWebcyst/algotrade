<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\price;
use App\top_coin;

class set_diff extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'set:diff';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Binance prices differnce';

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
        
        $api = new \Binance\API('3OBD1scSD7YspxFQgjXrWfjM9gQ09eVKJqo0eddMA0DfQJNkxzKtZfrACPZhDlbl','lslNptpwsMfg6gDopP4X4pmO4kQtJjh7vXmojY6Df2HDFYpKUqAbQ9TUE51C4iWS');
        $prices = $api->prices();
        foreach($prices as $key=>$price){
            $symbol = substr($key,-4);
            if($symbol == "USDT"){
               $pri = price::where("symbol",$key)->first();
               $diff = $price - $pri->price;
               $pri->difference = $diff;
               $pri->new_price = $price;
               $pri->save();
            }
        }
                $top = price::whereRaw('difference = (select max(`difference`) from prices)')->first();
                $per = $top->difference / $top->price;
                top_coin::create([
                    "symbol"=>$top->symbol,
                    "price"=>$top->new_price,
                    "percentage"=>$per,
                    "open_time"=>$top->open_time
                ]);
    }
}
