<?php namespace Bazzoloviale\viewModels;

use Illuminate\Support\ServiceProvider;
use Bazzoloviale\viewModels\ViewModelContainer;
use Bazzoloviale\viewModels\ViewModelFileLoader;

class ViewModelServiceProvider extends ServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerCommandTranslator();
    }

    /**
     * Register the command translator binding
     */
    protected function registerCommandTranslator()
    {
        $this->app->singleton('Bazzoloviale\viewModels\ViewModelContainer', function() {
            return new ViewModelContainer(new ViewModelFileLoader);
        });
    }

}