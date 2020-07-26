<?php

namespace MadeITBelgium\VerifyEmail\ServiceProvider;

use Illuminate\Support\ServiceProvider;
use MadeITBelgium\VerifyEmail\VerifyEmail as VE;

/**
 * MadeITBelgium VerifyEmail PHP Library.
 *
 * @version    1.0.0
 *
 * @copyright  Copyright (c) 2020 Made I.T. (https://www.madeit.be)
 * @author     Tjebbe Lievens <tjebbe.lievens@madeit.be>
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-3.txt    LGPL
 */
class VerifyEmail extends ServiceProvider
{
    protected $defer = false;

    protected $rules = [

    ];

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/verify-email.php' => config_path('verify-email.php'),
        ]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('verifyemail', function ($app) {
            $config = $app->make('config')->get('verify-email');

            return new VE($config['email'], $config['port']);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['verifyemail'];
    }
}
