<?php 

namespace App\Providers;

use Aerospike;
use Illuminate\Support\ServiceProvider;
use Makbulut\Aerospike\AerospikeServiceProvider;

class CachingServiceProvider extends ServiceProvider 
{

    /**
     * Bootstrap service 
     */
    public function boot() 
    {
        // if (!app()->runningInConsole()) {
        //     $this->app->singleton("Aerospike", function() {
        //         return new Aerospike(config('cache.stores.aerospike.servers'));
        //     });
        // }

    }
    
    /**
     * Register service
     */
    public function register() 
    {
        //load service provider here to use cache aerospike driver
        // $this->app->register(AerospikeServiceProvider::class);
    }
}