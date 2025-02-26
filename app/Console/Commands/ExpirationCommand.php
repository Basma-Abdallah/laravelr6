<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class ExpirationCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:expiration-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //$users=User::where('expired' , '=' , 0)->get()->update(['expired'=>1,]);
        //$users=User::where('expired' , '=' , 0)->get();
        // foreach ($users as $user)
        // {

        //     $user ->update(['expired'=>1,]);
        // }
        // users expired = 0

        // get users expired = 0
        // loop user expired = 1



        User::where('expired', '=', 0)
            ->update(['expired' => 1]);
            
    }
}
