<?php

namespace Abdulsalamishaq\Lazerpay\Apis;

use Abdulsalamishaq\Lazerpay\Interfaces\PaymentInterface;
use Illuminate\Support\Facades\Http;

class Payment implements PaymentInterface
{
    /**
     * Initialize transaction
     *
     * @param array $data
     * @return array
     */
    public function initialize(array $data): array
    {
        return (Http::lazerpay()->post('/transaction/initialize', $data))->json();
    }

    /**
     * Verify transaction
     *
     * @param string $reference
     * @return array
     */
    public function verify(string $reference): array
    {
        return (Http::lazerpay()->get("/transaction/verify/$reference"))->json();
    }

    /**
     * Generate payment link
     *
     * @param array $data
     * @return array
     */
    public function links(array $data): array
    {
        return (Http::lazerpay()->post("/payment-links", $data))->json();
    }

    /**
     * Get payment links
     *
     * @param string $reference
     * @return array
     */
    public function getLinks(?string $reference = null): array
    {
        $url = "/payment-links" . (! is_null($reference) ? "/$reference" : "");

        return (Http::lazerpay()->get($url))->json();
    }

    /**
     * Update payment links
     *
     * @param string $reference
     * @param string $status
     * @return array
     */
    public function updateLinks(string $reference, string $status): array
    {
        return (Http::lazerpay()->put("/payment-links/$reference", [
                'status' => $status,
            ]))->json();
    }
}
