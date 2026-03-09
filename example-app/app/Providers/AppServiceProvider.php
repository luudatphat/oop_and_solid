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

        // 1. Standard Binding (bind): Tạo mới mỗi lần gọi
        $this->app->bind(\App\Services\StandardRandomService::class, function ($app) {
            return new \App\Services\StandardRandomService();
        });

        // 2. Singleton Binding (singleton): Chỉ tạo 1 lần duy nhất, dùng lại cho các lần sau
        $this->app->singleton(\App\Services\SingletonRandomService::class, function ($app) {
            return new \App\Services\SingletonRandomService();
        });

        // Simple Binding: Bất cứ khi nào AlertSystem được yêu cầu, hãy trả về EmailAlert
        $this->app->bind(
            \App\Services\AlertSystem::class,
            \App\Services\EmailAlert::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
