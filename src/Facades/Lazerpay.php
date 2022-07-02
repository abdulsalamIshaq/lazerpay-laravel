<?php

namespace Abdulsalamishaq\Lazerpay\Facades;

use Abdulsalamishaq\Lazerpay\Apis\Payment;
use Abdulsalamishaq\Lazerpay\Apis\Swap;
use Abdulsalamishaq\Lazerpay\Apis\Transfer;
use Abdulsalamishaq\Lazerpay\Lazerpay as LazerpayClient;
use Illuminate\Support\Facades\Facade;

/**
 * @method static Payment payment()
 * @method static Transfer transfer()
 * @method static Swap swaps()
 *
 * @see \Abdulsalamishaq\Lazerpay\Lazerpay
 */
class Lazerpay extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return LazerpayClient::class;
    }
}
