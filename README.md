# Lazerpay Laravel Package

A package for integrating Lazerpay services with your laravel application.
## Requirements

* PHP ^8.1
* Laravel ^9.0

## Installation

Via [Composer](https://getcomposer.org).
To get the latest version of Laravel Lazerpay, simply run at the root of your laravel project.
```bash
composer require abdulsalamishaq/laravel-lazerpay
```
After Composer has installed the Laravel Lazerpay package, you may run the `lazerpay:install` Artisan command. This command publishes the configuration file of the package named `lazerpay.php`:
```bash
php artisan lazerpay:install
```
## Setup
Open your .env file and add your api key, sender id, channel and so on:
```php
LARZERPAY_SECRET_KEY="XXXXXXXXXXXXXXXXXXXXXXXXXXXX"
LARZERPAY_PUBLIC_KEY="XXXXXXXXXXXXXXXXXXXXXXXXXXXX"
```
## Usage

### payments
#### Accept payment
```php
<?php 
use Abdulsalamishaq\Lazerpay\Facades\Lazerpay;

Lazerpay::payment()->initialize([
    'customer_name' => 'Abdulsalam Ishaq',
    'customer_email' => 'Abdulsalamkayodeishaq@gmail.com',
    'coin' => 'USDT',
    'currency' => 'NGN',
    'amount' => 2000,
]);
```

#### Verify payment
```php 
<?php 
use Abdulsalamishaq\Lazerpay\Facades\Lazerpay;

Lazerpay::payment()->verify(reference: 'kjlakdr4387');
```
#### Payment link
##### Create payment link
```php 
<?php
use Abdulsalamishaq\Lazerpay\Facades\Lazerpay;

Lazerpay::payment()->links([
    'title' => 'Link title',
    'description' => 'Link description'
    'amount' => 2000,
    'type' => 'standard',
    'logo' => 'https://example.com/logo.png',
    'currency' => 'NGN',
    'redirect_url' => 'https://example.com/redirect-url',
]);
```
##### Fetch payment links
```php 
<?php
use Abdulsalamishaq\Lazerpay\Facades\Lazerpay;

Lazerpay::payment()->getLinks();
```
##### Fetch payment link
```php 
<?php
use Abdulsalamishaq\Lazerpay\Facades\Lazerpay;

Lazerpay::payment()->getLinks(reference: 'lksdfjiefh');
```
##### Update a payment link
```php
<?php
use Abdulsalamishaq\Lazerpay\Facades\Lazerpay;

Lazerpay::payment()->updateLinks(reference: 'ljhfkjds', status: 'active');
```
### Transfer
#### Crypto transfer
```php
<?php
use Abdulsalamishaq\Lazerpay\Facades\Lazerpay;

Lazerpay::transfer()->crypto([
    'amount' => 12334,
    'recipient' => '0x248a0Bb3906213AFA871aa5265Fd688d668647F8',
    'coin' => 'USDT',
    'metadata' => [ 'name' => 'Hello'],
    'blockchain' => 'Binance Smart Chain',
]);
```
### Swaps
#### Crypto swap
```php
<?php
use Abdulsalamishaq\Lazerpay\Facades\Lazerpay;

Lazerpay::swaps()->crypto([
    'amount' => 1234,
    'fromCoin' => 'USDT',
    'toCoin' => 'USDC',
    'metadata' => [
        'description' => 'USDT to USDC swap'
    ],
    'blockchain' => 'Binance Smart Chain',
]);
```
### 
#### List coins
```php
<?php
use Abdulsalamishaq\Lazerpay\Facades\Lazerpay;

Lazerpay::misc()->coins();
```

#### Rate
```php
<?php
use Abdulsalamishaq\Lazerpay\Facades\Lazerpay;

Lazerpay::misc()->rate(coin: 'USDT', currency: 'NGN');
```

#### Wallet balance
```php
<?php
use Abdulsalamishaq\Lazerpay\Facades\Lazerpay;

Lazerpay::misc()->balance('USDT');
```

### Handling Webhook
Loading.....
