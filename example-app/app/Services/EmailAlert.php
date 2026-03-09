<?php

namespace App\Services;

class EmailAlert implements AlertSystem
{
    public function send(string $message): string
    {
        return "Sending email alert: " . $message;
    }
}
