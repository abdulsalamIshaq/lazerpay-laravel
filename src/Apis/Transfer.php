<?php

namespace Abdulsalamishaq\Lazerpay\Apis;

class Transfer extends HttpAbstract
{
    /**
     * Crypto transfer
     *
     * @param array $data
     * @return array
     */
    public function crypto(array $data): array
    {
        return $this->post('/transfer', $data);
    }
}
