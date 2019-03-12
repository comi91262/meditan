<?php

namespace App\Providers;

use Laravel\Passport\Passport;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \App\Repositories\Question\QuestionRepositoryInterface::class,
            \App\Repositories\Question\QuestionRepository::class
        );
        $this->app->bind(
            \App\Repositories\Term\TermRepositoryInterface::class,
            \App\Repositories\Term\TermRepository::class
        );
        $this->app->bind(
            \App\Services\Question\QuestionServiceInterface::class,
            \App\Services\Question\QuestionService::class
        );
        $this->app->bind(
            \App\Services\Term\TermServiceInterface::class,
            \App\Services\Term\TermService::class
        );
        $this->app->bind(
            \App\Services\UserTerm\UserTermServiceInterface::class,
            \App\Services\UserTerm\UserTermService::class
        );
        $this->app->bind(
            \App\Repositories\Department\DepartmentRepositoryInterface::class,
            \App\Repositories\Department\DepartmentRepository::class
        );

        // laravel passport によるマイグレーションを防ぐ
        Passport::ignoreMigrations();
    }
}
