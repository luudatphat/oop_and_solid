<?php

namespace App\Http\Controllers;

use App\Services\BankTransferPayment;

class BankTransferController extends Controller
{
    protected $payment;

    public function __construct(BankTransferPayment $payment)
    {
        $this->payment = $payment;
    }

    public function pay()
    {
        return $this->payment->charge(500000);
    }
}
