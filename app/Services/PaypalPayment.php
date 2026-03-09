<?php

namespace App\Services;

use App\Contracts\PaymentGateway;

class PaypalPayment implements PaymentGateway
{
    public function charge(int $amount): string
    {
        return "Charged {$amount} VND via PayPal using E-Wallet.";
    }
}
