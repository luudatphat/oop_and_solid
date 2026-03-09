<?php

namespace App\Services;

class SmsAlert implements AlertSystem
{
    public function send(string $message): string
    {
        return "Sending SMS alert: " . $message;
    }
}
