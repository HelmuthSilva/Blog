<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Blade::component('components.navegar', 'navegar');
        Blade::component('components.rodape', 'rodape');
        Blade::component('components.apresentacao', 'apresentacao');
        Blade::component('components.postagens', 'postagens');
        Blade::component('components.postagensPessoal', 'postagensP');
        Blade::component('components.pagPost', 'postagemCompleta');
        Blade::component('components.comentarios', 'comentarios');
        Blade::component('components.navegarAdmin', 'navAdm');
        Blade::component('components.postagensAdmin', 'gerPostagens');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
