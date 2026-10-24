<?php

namespace App\Http\Controllers;

class UserController extends Controller
{
    public function index()
    {
        $users = [
            [
                'id' => 1,
                'username' => 'admin',
                'name' => 'Mark Galicinao',
                'role' => 'Administrator',
            ],
            [
                'id' => 2,
                'username' => 'cashier1',
                'name' => 'John Santos',
                'role' => 'Cashier',
            ],
            [
                'id' => 3,
                'username' => 'cashier2',
                'name' => 'Maria Reyes',
                'role' => 'Cashier',
            ],
            [
                'id' => 4,
                'username' => 'manager',
                'name' => 'Ana Garcia',
                'role' => 'Manager',
            ],
            [
                'id' => 5,
                'username' => 'staff1',
                'name' => 'Carlos Mendoza',
                'role' => 'Staff',
            ],
        ];

        return view('users', compact('users'));
    }
}