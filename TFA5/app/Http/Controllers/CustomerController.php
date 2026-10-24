<?php

namespace App\Http\Controllers;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = [
            [
                'id' => 1,
                'name' => 'Juan Dela Cruz',
                'email' => 'juan@example.com',
                'phone' => '09171234567',
            ],
            [
                'id' => 2,
                'name' => 'Maria Santos',
                'email' => 'maria@example.com',
                'phone' => '09181234567',
            ],
            [
                'id' => 3,
                'name' => 'Pedro Reyes',
                'email' => 'pedro@example.com',
                'phone' => '09191234567',
            ],
            [
                'id' => 4,
                'name' => 'Ana Garcia',
                'email' => 'ana@example.com',
                'phone' => '09201234567',
            ],
            [
                'id' => 5,
                'name' => 'Carlos Mendoza',
                'email' => 'carlos@example.com',
                'phone' => '09211234567',
            ],
        ];

        return view('customers', compact('customers'));
    }
}