<?php

use Illuminate\Support\Facades\Route;
use Abdulsalamishaq\Lazerpay\Http\Controllers\LazerpayController;

Route::get('lazerpay/webhook', [LazerpayController::class, 'webhook']);
