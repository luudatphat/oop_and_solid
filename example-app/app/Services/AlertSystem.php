<?php

namespace App\Services;

interface AlertSystem
{
    public function send(string $message): string;
}
