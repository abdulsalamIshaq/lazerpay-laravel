<?php

namespace Abdulsalamishaq\Lazerpay\Apis;

class Misc extends HttpAbstract
{
    /**
     * List all accepted coins
     *
     * @return array
     */
    public function coins(): array
    {
        return $this->get('/coins');
    }

    /**
     * Get wallet balance
     *
     * @return array
     */
    public function balance(string $coin): array
    {
        return $this->get('wallet/balance', ['coin' => $coin]);
    }

    /**
     * Get rates
     *
     * @retrun array
     */
    public function rate(string $coin, string $currency): array
    {
        return $this->get('rate', [
            'coin' => $coin,
            'currency' => $currency,
        ]);
    }
}
