<?php

namespace App\Providers;

use App\Models\CartItem;
use App\Models\Category;
use App\Models\News;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Part;
use App\Models\Request;
use App\Models\User;
use App\Policies\Cart\CartPolicy;
use App\Policies\Category\CategoryPolicy;
use App\Policies\News\NewsPolicy;
use App\Policies\Order\OrderPolicy;
use App\Policies\Part\PartPolicy;
use App\Policies\Request\RequestPolicy;
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
        Gate::policy(CartItem::class, CartPolicy::class);
        Gate::policy(Request::class, RequestPolicy::class);
        Gate::policy(OrderItem::class, OrderPolicy::class);
        Gate::policy(Order::class, OrderPolicy::class);

        Gate::define('assign-roles', function (User $user) {
            return $user->hasRole('admin') && $user->hasAllPermissions(['assign employee', 'unsign employee']);
        });

        Gate::define('view-users', function (User $user) {
            return $user->hasRole('admin') && $user->hasPermissionTo('show users');
        });

        Gate::define('history-interaction', function (User $user) {
            return $user->hasRole('admin') && $user->hasPermissionTo('history interaction');
        });
    }
}
