<?php

namespace App\Services;

use App\Contracts\PaymentGateway;

class BankTransferPayment implements PaymentGateway
{
    protected $bankName;

    public function __construct(string $bankName)
    {
        $this->bankName = $bankName;
    }

    public function charge(int $amount): string
    {
        return "Charged {$amount} VND via Bank Transfer ({$this->bankName}).";
    }
}
