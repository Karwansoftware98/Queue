<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUniqueUntilProcessing;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\Middleware\ThrottlesExceptions;
use Illuminate\Queue\Middleware\WithoutOverlapping;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Cache ;
use Illuminate\Support\Facades\Redis;
use PhpParser\Node\Stmt\Catch_;

class Deploy implements ShouldQueue, ShouldBeUniqueUntilProcessing
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {


            //third way 
        // Redis::throttle('deployments')
        // ->allow(10)
        // ->every(60)
        // ->block(10) //blocking for given amount of time and then the lock will be acquired
        // ->then( function (){
        //     info('started');

        //     sleep(3);

        //     info('finished');
        // });

            //second way
        // using redis for limitting  how may jobs can be excuted at same time of same instance 
        // Redis::funnel('deployments')
        // ->limit(5)  //limiting how many jobs can be excuted at the same time 
        // ->block(10) //blocking for given amount of time and then the lock will be acquired
        // ->then( function (){
        //     info('started');

        //     sleep(3);

        //     info('finished');
        // });

            //first way
        // the job must be finished acquire  then it will excute next job 
        // Cache::lock('deployments')
        // ->block(10 , function (){
        //     info('started');

        //     sleep(3);

        //     info('finished');
        // });


        //jobs will be excuted concurrently 
        info('started');

        sleep(3);

        info('finished');
        
    }

        // below methods are used ShouldUnique interface
    // public function uniqId()
    // {
    //     return 'deployments';
    // }

    // public function uniqueFor()
    // {
    //     return 60;
    // }

        //fourth way 
     public function middleware()
        {
            return [
                // new WithoutOverlapping('deployments')
                   new ThrottlesExceptions(10)
            ];
        }
}
