<?php

namespace Abdulsalamishaq\Lazerpay\Apis;

use Illuminate\Support\Facades\Http;

class Swap
{
    /**
     * Swap coin
     *
     * @param array $data
     * @return array
     */
    public function cryptoSwap(array $data): array
    {
        return (Http::lazerpay()->post('/swap/crypto', $data))->json();
    }

    /**
     * Crypto swap amount
     *
     * @param array $data
     * @return array
     */
    public function amount(array $data): array
    {
        return (Http::lazerpay()->post('/swap/crypto/amount-out', $data))->json();
    }
}
