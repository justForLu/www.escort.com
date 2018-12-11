<?php

namespace App\Providers;

use App\Services\TreeService;
use Illuminate\Support\ServiceProvider;

class TreeServiceProvider extends ServiceProvider
{
    /**
     * 延迟加载
     * @var bool
     */
    protected $defer = true;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(TreeService::class, function(){
            return new TreeService();
        });
    }

    public function provides()
    {
        return [TreeService::class];
    }
}
