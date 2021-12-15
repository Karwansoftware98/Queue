<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendWelcomeEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    // number of 
    // public $timeout = 1;

    // number of tries of each job
    public $tries = 10;
    public $maxExceptions = 2;
    // number of second to wait after job is processed
    // public $backoff = [2,10,20];
    

    public function __construct()
    {
    }

    public function handle()
    {
        // sleep(3);
        
        // info('hello');
        throw new \Exception('failed');

        return $this->release();
    }

    // try failed jos until 
    // public function retryUntil()
    // {
    //         return now()->addMinute();
    // }

     public function failed($e)
        {
            info('exception');
        }
}
