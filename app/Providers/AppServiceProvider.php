<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Applications\Services\ArticleService;
use App\Applications\Services\IArticleService;
use App\Repositories\Article\ArticleRepository;
use App\Repositories\Article\IArticleRepository;
use App\Repositories\ArticleComment\ArticleCommentRepository;
use App\Repositories\ArticleComment\IArticleCommentRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IArticleService::class, ArticleService::class);
        $this->app->bind(IArticleRepository::class, ArticleRepository::class);
        $this->app->bind(IArticleCommentRepository::class, ArticleCommentRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
