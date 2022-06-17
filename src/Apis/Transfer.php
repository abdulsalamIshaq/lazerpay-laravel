<?php

namespace Abdulsalamishaq\Lazerpay\Apis;

use Illuminate\Support\Facades\Http;

class Transfer
{
    /**
     * Crypto transfer
     *
     * @param array $data
     * @return array
     */
    public function crypto(array $data): array
    {
        return (Http::lazerpay()->post('/transfer', $data))->json();
    }
}
