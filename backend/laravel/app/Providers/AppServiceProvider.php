<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\News;
use App\Models\Part;
use App\Policies\Category\CategoryPolicy;
use App\Policies\News\NewsPolicy;
use App\Policies\Part\PartPolicy;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Event::listen(function (\SocialiteProviders\Manager\SocialiteWasCalled $event) {
            $event->extendSocialite('vkontakte', \SocialiteProviders\VKontakte\Provider::class);
        });

        // Policies
        Gate::policy(News::class, NewsPolicy::class);
        Gate::policy(Category::class, CategoryPolicy::class);
        Gate::policy(Part::class, PartPolicy::class);
    }
}
