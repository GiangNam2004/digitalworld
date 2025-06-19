<?php

namespace App\Providers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
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
        View::share('total_quantity', array_sum(array_map(function ($item) {
            return $item['quantity']; // hoặc cách lấy giá trị từ đối tượng nếu có
        }, Session::get('cart', []))));
    }
}
