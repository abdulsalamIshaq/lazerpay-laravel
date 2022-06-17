<?php

namespace Abdulsalamishaq\Lazerpay;

use Abdulsalamishaq\Lazerpay\Commands\LazerpayCommand;
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
    public function boot()
    {
        Http::macro('lazerpay', function () {
            return Http::withToken(Config::get('lazerpay.secret_key'))->withHeaders([
                'X-api-key' => Config::get('lazerpay.public_key'),
            ])->baseUrl(Config::get('lazerpay.base_url'));
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
            ->hasConfigFile()
            ->hasViews()
            // ->hasMigration('create_lazerpay-laravel_table')
            ->hasCommand(LazerpayCommand::class);
    }
}
