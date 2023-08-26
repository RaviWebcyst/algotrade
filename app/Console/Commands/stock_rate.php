<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\stock_rate as rate;

class stock_rate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'stock:rate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update Stock rates';

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
        //gainer
        $url = 'https://financialmodelingprep.com/api/v3/stock_market/gainers?apikey=01af6b313f93159c7f4ca28a2b5db84d';
         
        $crl = curl_init();
        curl_setopt($crl, CURLOPT_URL, $url);
        curl_setopt($crl, CURLOPT_FRESH_CONNECT, true);
        curl_setopt($crl, CURLOPT_RETURNTRANSFER, true);
         
        $response = curl_exec($crl);
        // print_r($response);

        // $data = json_encode($response);

        rate::updateOrCreate([
            "id"=>1
        ],["response"=>$response,'type'=>"gainer"]);
       
        curl_close($crl);

        //looser
        $url = 'https://financialmodelingprep.com/api/v3/stock_market/losers?apikey=01af6b313f93159c7f4ca28a2b5db84d';
         
        $crl = curl_init();
        curl_setopt($crl, CURLOPT_URL, $url);
        curl_setopt($crl, CURLOPT_FRESH_CONNECT, true);
        curl_setopt($crl, CURLOPT_RETURNTRANSFER, true);
         
        $response = curl_exec($crl);
        // print_r($response);

        // $data = json_encode($response);

        rate::updateOrCreate([
            "id"=>2
        ],["response"=>$response,"type"=>"looser"]);
       
        curl_close($crl);


    }
}
