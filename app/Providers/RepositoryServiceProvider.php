<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Contracts\EloquentInterface', 'App\Repositories\EloquentRepository');
        $this->app->bind('App\Contracts\Models\PageInterface', 'App\Repositories\Models\PageRepository');
        $this->app->bind('App\Contracts\Models\RoleInterface', 'App\Repositories\Models\RoleRepository');
        $this->app->bind('App\Contracts\Models\MenuInterface', 'App\Repositories\Models\MenuRepository');
        $this->app->bind('App\Contracts\Models\FarmInterface', 'App\Repositories\Models\FarmRepository');
        $this->app->bind('App\Contracts\Models\UserInterface', 'App\Repositories\Models\UserRepository');
        $this->app->bind('App\Contracts\Models\MedicalInterface', 'App\Repositories\Models\MedicalRepository');
        $this->app->bind('App\Contracts\Models\CompanyInterface', 'App\Repositories\Models\CompanyRepository');
        $this->app->bind('App\Contracts\Models\TemplateInterface', 'App\Repositories\Models\TemplateRepository');
        $this->app->bind('App\Contracts\Models\CategoryInterface', 'App\Repositories\Models\CategoryRepository');
        $this->app->bind('App\Contracts\Models\PermissionInterface', 'App\Repositories\Models\PermissionRepository');
        $this->app->bind('App\Contracts\Models\ApplicationInterface', 'App\Repositories\Models\ApplicationRepository');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // 
    }
}
