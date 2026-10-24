<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Customer::create([
            'full_name' => 'Juan Dela Cruz',
            'email' => 'juan@example.com',
            'phone' => '09171234567',
        ]);

        Customer::create([
            'full_name' => 'Maria Santos',
            'email' => 'maria@example.com',
            'phone' => '09181234567',
        ]);

        Customer::create([
            'full_name' => 'Pedro Reyes',
            'email' => 'pedro@example.com',
            'phone' => '09191234567',
        ]);

        Customer::create([
            'full_name' => 'Ana Garcia',
            'email' => 'ana@example.com',
            'phone' => '09201234567',
        ]);

        Customer::create([
            'full_name' => 'Mark Wilson',
            'email' => 'mark@example.com',
            'phone' => '09211234567',
        ]);

        User::create([
            'username' => 'admin',
            'full_name' => 'Administrator',
        ]);

        User::create([
            'username' => 'juan01',
            'full_name' => 'Juan Dela Cruz',
        ]);

        User::create([
            'username' => 'maria02',
            'full_name' => 'Maria Santos',
        ]);

        User::create([
            'username' => 'pedro03',
            'full_name' => 'Pedro Reyes',
        ]);

        User::create([
            'username' => 'ana04',
            'full_name' => 'Ana Garcia',
        ]);
    }
}