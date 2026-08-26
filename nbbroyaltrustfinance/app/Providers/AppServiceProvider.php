<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Mail;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Define the custom 'zeptomail' transport in AppServiceProvider
    Mail::extend('zeptomail', function (array $config = []) {
        $client = new ApiClient;
        $client->setApiKey($config['key']);
        return new ZeptoMailTransport($client);
    });
    }
}
