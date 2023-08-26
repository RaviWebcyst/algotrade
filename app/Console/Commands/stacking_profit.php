<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\package;
use App\pack_active;
use App\wallet;
use App\level_income;
use App\User;
use Carbon\Carbon;

class stacking_profit extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'stack:profit';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send stack profit on basis of package';

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
        $actives = pack_active::where("condition","!=",0)->get();
        
      
    }
}
