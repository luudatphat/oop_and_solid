<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Khi StripeController dùng PaymentGateway -> đưa StripePayment
        $this->app->when(\App\Http\Controllers\StripeController::class)
            ->needs(\App\Contracts\PaymentGateway::class)
            ->give(\App\Services\StripePayment::class);

        // Khi PaypalController dùng PaymentGateway -> đưa PaypalPayment
        $this->app->when(\App\Http\Controllers\PaypalController::class)
            ->needs(\App\Contracts\PaymentGateway::class)
            ->give(\App\Services\PaypalPayment::class);

        // Binding BankTransferPayment với tham số cụ thể thông qua Closure
        $this->app->bind(\App\Services\BankTransferPayment::class, function ($app) {
            return new \App\Services\BankTransferPayment('Vietcombank');
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
