<?php

namespace Abdulsalamishaq\Lazerpay\Apis;

use Abdulsalamishaq\Lazerpay\Interfaces\PaymentInterface;

class Payment extends HttpAbstract implements PaymentInterface
{
    /**
     * Initialize transaction
     *
     * @param array $data
     * @return array
     */
    public function initialize(array $data): array
    {
        return $this->post('/transaction/initialize', $data);
    }

    /**
     * Verify transaction
     *
     * @param string $reference
     * @return array
     */
    public function verify(string $reference): array
    {
        return $this->get("/transaction/verify/$reference");
    }

    /**
     * Generate payment link
     *
     * @param array $data
     * @return array
     */
    public function links(array $data): array
    {
        return $this->post("/payment-links", $data);
    }

    /**
     * Get payment links
     *
     * @param string|null $reference
     * @return array
     */
    public function getLinks(?string $reference = null): array
    {
        $url = "/payment-links" . (! is_null($reference) ? "/$reference" : "");

        return $this->get($url);
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
        return $this->put("/payment-links/$reference", [
                'status' => $status,
            ]);
    }
}
