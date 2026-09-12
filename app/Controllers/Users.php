<?php

namespace App\Controllers;

class Users extends BaseController
{
    public function index(): string
    {
        $users = [
            [
                'username'  => 'admin',
                'full_name' => 'Mark Wilson Galicinao',
                'role'      => 'Administrator'
            ],
            [
                'username'  => 'cashier01',
                'full_name' => 'Jenny Flores',
                'role'      => 'Cashier'
            ],
            [
                'username'  => 'cashier02',
                'full_name' => 'Paolo Ramos',
                'role'      => 'Cashier'
            ],
            [
                'username'  => 'manager01',
                'full_name' => 'Sofia Lim',
                'role'      => 'Manager'
            ],
            [
                'username'  => 'staff01',
                'full_name' => 'Noel Bautista',
                'role'      => 'Inventory Staff'
            ]
        ];

        return view('users/index', [
            'title' => 'User Accounts',
            'users' => $users
        ]);
    }
}