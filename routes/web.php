<?php

use App\Jobs\Deploy;
use App\Jobs\ProcessPayment;
use App\Jobs\PullRepo;
use App\Jobs\RunTests;
use App\Jobs\SendWelcomeEmail;
use App\Models\User;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

            RunTests::dispatch('karwan');
        // DB::transaction(function () {
        //     $user = User::create([]);
        //     SendWelcomeEmail::dispatch($user)->afterCommit();
        // });

        
        // Bus::chain([
        //     new Deploy(),
        //     function (){
        //         Bus::batch([...])->dispatch();
        //     }

        // ])->dispatch();


        // $batch = [
        //     [ 
        //         new PullRepo('project1'),
        //         new RunTests('project1'),
        //         new Deploy('project1')
        //     ],
        //     [ 
        //         new PullRepo('project2'),
        //         new RunTests('project2'),
        //         new Deploy('project2')
        //     ]
        // ];
        // Bus::batch($batch)
        //     ->allowFailures()
        //     ->dispatch();


            // $batch = [

            //     new PullRepo('laracasts/project one'),
            //     new PullRepo('laracasts/project two'),
            //     new PullRepo('laracasts/project three')

            // ];

            // Bus::batch($batch)
            // ->allowFailures()
            // ->catch(function ($batch , $e){

            // })
            // ->then(function ($batch){

            // })
            // ->finally(function ($batch){

            // })
            // ->onQueue('deployments')
            // ->onConnection('database')
            // ->dispatch();

            // $chain = [

            //     new PullRepo(),
            //     new RunTests(),
            //     new Deploy()
            // ];

            // Bus::chain($chain)->dispatch();
        // SendWelcomeEmail::dispatch();
        // ProcessPayment::dispatch()->onQueue('payments');
    return view('welcome');
});
