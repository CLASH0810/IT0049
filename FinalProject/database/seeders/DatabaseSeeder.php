<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@pos.test'],
            [
                'name' => 'Administrator',
                'full_name' => 'POS Administrator',
                'password' => Hash::make('password123'),
                'role' => 'admin',
            ]
        );

        Product::updateOrCreate(
            ['name' => 'Coffee'],
            [
                'price' => 80.00,
                'stock_quantity' => 50,
                'is_archived' => false,
            ]
        );

        Product::updateOrCreate(
            ['name' => 'Milk Tea'],
            [
                'price' => 120.00,
                'stock_quantity' => 30,
                'is_archived' => false,
            ]
        );

        Product::updateOrCreate(
            ['name' => 'Cheeseburger'],
            [
                'price' => 150.00,
                'stock_quantity' => 20,
                'is_archived' => false,
            ]
        );

        Customer::updateOrCreate(
            ['email' => 'juan@example.com'],
            [
                'full_name' => 'Juan Dela Cruz',
                'phone' => '09171234567',
            ]
        );

        Customer::updateOrCreate(
            ['email' => 'maria@example.com'],
            [
                'full_name' => 'Maria Santos',
                'phone' => '09181234567',
            ]
        );
    }
}