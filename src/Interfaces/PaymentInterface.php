<?php

namespace Abdulsalamishaq\Lazerpay\Interfaces;

interface PaymentInterface
{
    /**
     * Initialize transaction
     *
     * @param array $data
     * @return array
     */
    public function initialize(array $data): array;

    /**
     * Verify transaction
     *
     * @param string $reference
     * @return array
     */
    public function verify(string $reference): array;

    /**
     * Generate payment link
     *
     * @param array $data
     * @return array
     */
    public function links(array $data): array;

    /**
     * Get payment links
     *
     * @param string|null $reference
     * @return array
     */
    public function getLinks(?string $reference = null): array;

    /**
     * Update payment links
     *
     * @param string $reference
     * @param string $status
     * @return array
     */
    public function updateLinks(string $reference, string $status): array;
}
