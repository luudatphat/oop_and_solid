<?php

namespace App\Http\Controllers;

use App\Services\StandardRandomService;
use App\Services\SingletonRandomService;
use App\Services\ScopedRandomService;

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

        // Scoped Binding: Giống singleton TRONG 1 request, reset sau mỗi request
        $scoped1 = app(ScopedRandomService::class);
        $scoped2 = app(ScopedRandomService::class);

        return [
            'standard_binding' => [
                'type' => 'bind()',
                'explanation' => 'Mỗi lần resolve (app()) là một instance mới -> ID sẽ khác nhau.',
                'instance_1_id' => $standard1->getId(),
                'instance_2_id' => $standard2->getId(),
                'are_same_object' => $standard1 === $standard2 ? 'true' : 'false',
                'conclusion' => $standard1->getId() !== $standard2->getId() ? '✅ Khác nhau (Đúng)' : '❌ Giống nhau (Sai)'
            ],
            'singleton_binding' => [
                'type' => 'singleton()',
                'explanation' => 'Chỉ khởi tạo một lần duy nhất trong suốt vòng đời ứng dụng -> ID sẽ giống hệt nhau.',
                'instance_1_id' => $singleton1->getId(),
                'instance_2_id' => $singleton2->getId(),
                'are_same_object' => $singleton1 === $singleton2 ? 'true' : 'false',
                'conclusion' => $singleton1->getId() === $singleton2->getId() ? '✅ Giống nhau (Đúng)' : '❌ Khác nhau (Sai)'
            ],
            'scoped_binding' => [
                'type' => 'scoped()',
                'explanation' => 'Giống singleton TRONG 1 request, nhưng sẽ reset sau mỗi request (quan trọng cho Octane/Queue).',
                'instance_1_id' => $scoped1->getId(),
                'instance_2_id' => $scoped2->getId(),
                'are_same_object' => $scoped1 === $scoped2 ? 'true' : 'false',
                'conclusion' => $scoped1->getId() === $scoped2->getId() ? '✅ Giống nhau trong request này (Đúng)' : '❌ Khác nhau (Sai)',
                'note' => 'Refresh trang nhiều lần - ID sẽ thay đổi mỗi request (khác với singleton)'
            ],
            'summary' => [
                'bind' => 'Tạo mới mỗi lần resolve',
                'singleton' => 'Tạo 1 lần, dùng mãi mãi (ngay cả qua nhiều request trong Octane)',
                'scoped' => 'Tạo 1 lần PER REQUEST, reset sau mỗi request (an toàn hơn singleton trong Octane)'
            ]
        ];
    }
}
