<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\Facades\App;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class SettingServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
   /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('settings', function () {
            return new Setting();
        });
        $loader = AliasLoader::getInstance();
        $loader->alias('Setting', Setting::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if (!App::runningInConsole() && count(Schema::getColumnListing('settings'))) {
            $setting = Setting::get();
            foreach ($setting as $value) {
                Config::set('settings.' . $value->key, $value->value);
            }
        }
    }
}
