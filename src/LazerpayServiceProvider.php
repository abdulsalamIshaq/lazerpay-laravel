<?php

namespace Abdulsalamishaq\Lazerpay;

use Abdulsalamishaq\Lazerpay\Commands\LazerpayCommand;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LazerpayServiceProvider extends PackageServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function bootingPackage(): void
    {
        Http::macro('lazerpay', function () {
            return Http::withToken(Config::get('lazerpay.secret_key'))->withHeaders([
                'X-api-key' => Config::get('lazerpay.public_key'),
            ])->baseUrl(Config::get('lazerpay.base_url'));
        });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function packageRegistered(): void
    {
        $this->app->singleton(Lazerpay::class, function (Application $app) {
            return new Lazerpay();
        });
    }

    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('lazerpay')
            ->hasConfigFile('lazerpay')
            ->hasRoute('web')
            ->hasCommand(LazerpayCommand::class);
    }
}
