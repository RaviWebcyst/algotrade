<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\price;
use Carbon\Carbon;

class crypto_prices extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crypto:prices';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Store live binance prices';

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
               price::updateOrCreate(
                ["symbol"=>$key],
                [
                "symbol"=>$key,
                "price"=>$price,
                "open_time"=>Carbon::now()
               ]);
                
            }
        }

    }
}
