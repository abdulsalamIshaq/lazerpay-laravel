<?php

namespace Abdulsalamishaq\Lazerpay\Apis;

class Swap extends HttpAbstract
{
    /**
     * Swap coin
     *
     * @param array $data
     * @return array
     */
    public function crypto(array $data): array
    {
        return $this->post('/swap/crypto', $data);
    }

    /**
     * Crypto swap amount
     *
     * @param array $data
     * @return array
     */
    public function amount(array $data): array
    {
        return $this->post('/swap/crypto/amount-out', $data);
    }
}
