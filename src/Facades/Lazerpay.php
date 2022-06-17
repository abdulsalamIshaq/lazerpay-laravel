<?php

namespace Abdulsalamishaq\Lazerpay\Facades;

use Abdulsalamishaq\Lazerpay\Lazerpay as LazerpayClient;
use Illuminate\Support\Facades\Facade;

/**
 * @see \Abdulsalamishaq\Lazerpay\Lazerpay
 */
class Lazerpay extends Facade
{
    protected static function getFacadeAccessor()
    {
        return LazerpayClient::class;
    }
}
