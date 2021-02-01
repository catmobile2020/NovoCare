<?php

namespace App\Providers;

use App\Configuration;
use Illuminate\Support\ServiceProvider;
use Config;
use Illuminate\Support\Facades\Schema;

class ConfigurationServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('configurations', function ($app) {
            return new Configuration($app);
        });

        // register their aliases
        $loader = \Illuminate\Foundation\AliasLoader::getInstance();
        $loader->alias('Configuration', Configuration::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if (!\App::runningInConsole() && count(Schema::getColumnListing('configurations'))) {
            // get all settings from the database
            $configurations = Configuration::all();

            // bind all settings to the Laravel config, so you can call them like
            // Config::get('settings.contact_email')
            foreach ($configurations as $key => $configuration) {
                Config::set('configurations.'.$configuration->key, $configuration->value);
            }
        }
    }
}
