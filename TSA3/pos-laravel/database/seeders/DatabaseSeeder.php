<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Task;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::create([
            'username' => 'markwilson',
            'full_name' => 'Mark Wilson Galicinao',
            'email' => 'markwilson@example.com',
        ]);

        Task::create([
            'title' => 'Review Laravel routes',
            'status' => 'pending',
            'task_date' => now()->toDateString(),
        ]);

        Task::create([
            'title' => 'Check today’s assignments',
            'status' => 'completed',
            'task_date' => now()->toDateString(),
        ]);

        Task::create([
            'title' => 'Study Blade templates',
            'status' => 'pending',
            'task_date' => now()->toDateString(),
        ]);

        Task::create([
            'title' => 'Prepare project documentation',
            'status' => 'pending',
            'task_date' => now()->addDay()->toDateString(),
        ]);

        Task::create([
            'title' => 'Test the task system',
            'status' => 'pending',
            'task_date' => now()->addDay()->toDateString(),
        ]);

        Task::create([
            'title' => 'Read Laravel notes',
            'status' => 'completed',
            'task_date' => now()->subDay()->toDateString(),
        ]);

        Task::create([
            'title' => 'Review database migration',
            'status' => 'completed',
            'task_date' => now()->subDay()->toDateString(),
        ]);

        Task::create([
            'title' => 'Plan next laboratory activity',
            'status' => 'pending',
            'task_date' => now()->addDays(2)->toDateString(),
        ]);
    }
}