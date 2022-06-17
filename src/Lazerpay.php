<?php

namespace Abdulsalamishaq\Lazerpay;

use Abdulsalamishaq\Lazerpay\Apis\Payment;
use Abdulsalamishaq\Lazerpay\Apis\Swap;
use Abdulsalamishaq\Lazerpay\Apis\Transfer;
use Illuminate\Support\Facades\Http;

class Lazerpay
{
    public function payment(): Payment
    {
        return new Payment();
    }

    public function transfer(): Transfer
    {
        return new Transfer();
    }

    public function swaps(): Swap
    {
        return new Swap();
    }

    public function coins(): array
    {
        return (Http::lazerpay()->get('/coins'))->json();
    }

    public function rate(string $coin, string $currency): array
    {
        return (Http::lazerpay()->get('/rate', [$coin, $currency]))->json();
    }

    public function balance(string $coin): array
    {
        return (Http::lazerpay()->get('/wallet/balance', [$coin]))->json();
    }

    /**
     * Dynamic method to get the api handlers
     *
     * @since 1.0
     *
     * @param string $tag Endpoint Tag Name
     */
    public function __set(string $tag, array $args)
    {
        // dd([]);
        $map = $this->apiMap();

        if (! isset($map[$tag])) {
            throw new \Exception("The [$tag] is not a valid Endpoint tag.");
        }

        $class = $map[$tag];

        return new $class($this);
    }

    public function apiMap()
    {
        return [
            'payment' => \Abdulsalamishaq\Lazerpay\Apis\Payment::class,
            'transfer' => Transfer::class,
        ];
    }
}
