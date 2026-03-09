<?php

namespace App\Http\Controllers;

use App\Contracts\PaymentGateway;

class StripeController extends Controller
{
    protected $paymentGateway;

    public function __construct(PaymentGateway $paymentGateway)
    {
        $this->paymentGateway = $paymentGateway;
    }

    public function pay()
    {
        return $this->paymentGateway->charge(100000);
    }
}
