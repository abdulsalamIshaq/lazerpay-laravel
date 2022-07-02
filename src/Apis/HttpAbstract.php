<?php

namespace Abdulsalamishaq\Lazerpay\Apis;

use Illuminate\Support\Facades\Http;

abstract class HttpAbstract
{
    public function get(string $url, ?array $query = null): array
    {
        return (Http::lazerpay()->get($url, $query))->json();
    }

    public function post(string $url, ?array $data = null): array
    {
        return (Http::lazerpay()->post($url, $data))->json();
    }

    public function put(string $url, ?array $data = null): array
    {
        return (Http::lazerpay()->put($url, $data))->json();
    }
}
