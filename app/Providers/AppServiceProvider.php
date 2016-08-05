<?php
namespace App\Providers;

use Illuminate\Support\Facades\Facade;
use Illuminate\Support\ServiceProvider;
use App\Service\Url;
use App\Service\Tag;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    }
    protected $defer = false;
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('url_help',function($app){
            return new Url($app['router']);
        });
        $this->app->singleton('TagClass',function(){
            return new Tag();
        });
        
        $this->app->register('Laracasts\Generators\GeneratorsServiceProvider');
    }

}
