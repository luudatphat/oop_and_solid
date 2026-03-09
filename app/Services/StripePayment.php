<?php

namespace App\Services;

use App\Contracts\PaymentGateway;

class StripePayment implements PaymentGateway
{
    public function charge(int $amount): string
    {
        return "Charged {$amount} VND via Stripe using Visa/MasterCard.";
    }
}
