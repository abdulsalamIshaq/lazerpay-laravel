<?php

namespace Abdulsalamishaq\Lazerpay\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class LazerpayWebhook
{
    use Dispatchable;
    use SerializesModels;

    /**
     * lazerpay payload
     *
     * @var array
     */
    public array $payload;

    /**
     * Create new event instance
     *
     * @param array $payload
     * @retrun void
     */
    public function __construct(array $payload)
    {
        $this->payload = $payload;
    }
}
