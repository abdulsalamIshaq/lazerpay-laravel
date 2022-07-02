<?php

namespace Abdulsalamishaq\Lazerpay;

use Abdulsalamishaq\Lazerpay\Apis\Misc;
use Abdulsalamishaq\Lazerpay\Apis\Payment;
use Abdulsalamishaq\Lazerpay\Apis\Swap;
use Abdulsalamishaq\Lazerpay\Apis\Transfer;
use Exception;

class Lazerpay
{
    /**
     * Dynamic method to get the api handlers
     *
     * @param string $tag Endpoint Tag Name
     * @throws Exception
     * @since 1.0
     *
     */
    public function __call(string $tag, array $args)
    {
        $map = $this->apiMap();

        if (! isset($map[$tag])) {
            throw new Exception("The [$tag] is not a valid Endpoint tag.");
        }

        $class = $map[$tag];

        return new $class($this);
    }

    /**
     *
     * @return string[]
     */
    public function apiMap(): array
    {
        return [
            'payment' => Payment::class,
            'transfer' => Transfer::class,
            'swaps' => Swap::class,
            'misc' => Misc::class,
        ];
    }
}
