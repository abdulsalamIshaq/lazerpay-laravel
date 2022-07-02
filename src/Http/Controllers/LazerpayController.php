<?php

namespace Abdulsalamishaq\Lazerpay\Http\Controllers;

use Abdulsalamishaq\Lazerpay\Events\LazerpayWebhook;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class LazerpayController extends Controller
{
    /**
     * Handle webhook
     *
     * @param Request $request;
     * $return array
     */
    public function webhook(Request $request): array
    {
        $payload = json_decode($request->getContent(), true);

        event(new LazerpayWebhook($payload));

        return $payload;
    }
}
