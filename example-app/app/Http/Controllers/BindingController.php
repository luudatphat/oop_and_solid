<?php

namespace App\Http\Controllers;

use App\Services\StandardRandomService;
use App\Services\SingletonRandomService;

class BindingController extends Controller
{
    public function index()
    {
        // Resolve manually để lấy nhiều instances
        // Standard Binding: Mỗi lần gọi app() sẽ tạo instance MỚI
        $standard1 = app(StandardRandomService::class);
        $standard2 = app(StandardRandomService::class);

        // Singleton Binding: Mỗi lần gọi app() sẽ trả về CÙNG instance
        $singleton1 = app(SingletonRandomService::class);
        $singleton2 = app(SingletonRandomService::class);

        return [
            'standard_binding' => [
                'explanation' => 'Mỗi lần resolve (app()) là một instance mới -> ID sẽ khác nhau.',
                'instance_1_id' => $standard1->getId(),
                'instance_2_id' => $standard2->getId(),
                'are_same_object' => $standard1 === $standard2 ? 'true' : 'false',
                'conclusion' => $standard1->getId() !== $standard2->getId() ? '✅ Khác nhau (Đúng)' : '❌ Giống nhau (Sai)'
            ],
            'singleton_binding' => [
                'explanation' => 'Chỉ khởi tạo một lần duy nhất trong suốt vòng đời request -> ID sẽ giống hệt nhau.',
                'instance_1_id' => $singleton1->getId(),
                'instance_2_id' => $singleton2->getId(),
                'are_same_object' => $singleton1 === $singleton2 ? 'true' : 'false',
                'conclusion' => $singleton1->getId() === $singleton2->getId() ? '✅ Giống nhau (Đúng)' : '❌ Khác nhau (Sai)'
            ]
        ];
    }
}
