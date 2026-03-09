<?php

namespace App\Http\Controllers;

use App\Services\AlertSystem;
use Illuminate\Http\Request;

class AlertController extends Controller
{
    protected $alert;

    // Dependency Injection: Laravel sẽ tự động inject implementation đã được bind (EmailAlert)
    public function __construct(AlertSystem $alert)
    {
        $this->alert = $alert;
    }

    public function send()
    {
        return $this->alert->send('This is a test message from Simple Binding!');
    }
}
