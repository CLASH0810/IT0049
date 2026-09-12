<?php

namespace App\Controllers;

class Customers extends BaseController
{
    public function index(): string
    {
        $customers = [
            [
                'full_name' => 'Ana Santos',
                'email'     => 'ana.santos@example.com',
                'phone'     => '0917-123-4567'
            ],
            [
                'full_name' => 'Ben Cruz',
                'email'     => 'ben.cruz@example.com',
                'phone'     => '0918-234-5678'
            ],
            [
                'full_name' => 'Carla Reyes',
                'email'     => 'carla.reyes@example.com',
                'phone'     => '0919-345-6789'
            ],
            [
                'full_name' => 'Daniel Garcia',
                'email'     => 'daniel.garcia@example.com',
                'phone'     => '0920-456-7890'
            ],
            [
                'full_name' => 'Ella Mendoza',
                'email'     => 'ella.mendoza@example.com',
                'phone'     => '0921-567-8901'
            ]
        ];

        return view('customers/index', [
            'title'     => 'Customer Accounts',
            'customers' => $customers
        ]);
    }
}