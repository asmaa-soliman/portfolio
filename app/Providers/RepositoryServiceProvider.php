<?php

namespace App\Providers;

use App\Interfaces\AdminRepositoryInterface;
use App\Interfaces\Home\AboutRepositoryInterface;
use App\Interfaces\Demo\DemoRepositoryInterface;
use App\Interfaces\Home\BlogCategoryRepositoryInterface;
use App\Interfaces\Home\BlogRepositoryInterface;
use App\Interfaces\Home\ContactRepositoryInterface;
use App\Interfaces\Home\FooterRepositoryInterface;
use App\Interfaces\Home\HomeSliderRepositoryInterface;
use App\Interfaces\Home\PortfolioRepositoryInterface;
use App\Repository\AdminRepository;
use App\Repository\Demo\DemoRepository;
use App\Repository\Home\AboutRepository;
use App\Repository\Home\BlogCategoryRepository;
use App\Repository\Home\BlogRepository;
use App\Repository\Home\ContactRepository;
use App\Repository\Home\FooterRepository;
use App\Repository\Home\HomeSliderRepository;
use App\Repository\Home\PortfolioRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Demo
        $this->app->bind(DemoRepositoryInterface::class, DemoRepository::class);
        // home
        $this->app->bind(AboutRepositoryInterface::class, AboutRepository::class);
        $this->app->bind(BlogCategoryRepositoryInterface::class, BlogCategoryRepository::class);
        $this->app->bind(BlogRepositoryInterface::class, BlogRepository::class);
        $this->app->bind(ContactRepositoryInterface::class, ContactRepository::class);
        $this->app->bind(FooterRepositoryInterface::class, FooterRepository::class);
        $this->app->bind(HomeSliderRepositoryInterface::class, HomeSliderRepository::class);
        $this->app->bind(PortfolioRepositoryInterface::class, PortfolioRepository::class);
        // admin
        $this->app->bind(AdminRepositoryInterface::class, AdminRepository::class);

    }
}
