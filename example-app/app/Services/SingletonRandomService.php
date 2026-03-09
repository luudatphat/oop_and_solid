<?php

namespace App\Services;

class SingletonRandomService
{
    protected $id;

    public function __construct()
    {
        $this->id = bin2hex(random_bytes(4)); // Tạo một ID ngẫu nhiên khi khởi tạo
    }

    public function getId(): string
    {
        return $this->id;
    }
}
