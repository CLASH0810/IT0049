<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;

class PageController extends Controller
{
    public function index()
    {
        $tasks = Task::whereDate('task_date', today())
            ->orderBy('task_date')
            ->get();

        return view('home', compact('tasks'));
    }

    public function tasks()
    {
        $tasks = Task::orderBy('task_date')
            ->get();

        return view('tasks.index', compact('tasks'));
    }

    public function profile()
    {
        $user = User::first();

        return view('profile', compact('user'));
    }

    public function about()
    {
        return view('about');
    }
}