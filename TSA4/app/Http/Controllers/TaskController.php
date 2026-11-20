<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Mail\TaskCompletedMail;
use Illuminate\Support\Facades\Mail;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::where('is_archived', false)
            ->orderBy('task_date')
            ->get();

        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'status' => ['required', 'in:pending,done'],
            'task_date' => ['required', 'date'],
        ]);

        Task::create($validated);

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Task created successfully.');
    }

    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
{
    $validated = $request->validate([
        'title' => ['required', 'string', 'max:255'],
        'status' => ['required', 'in:pending,done'],
        'task_date' => ['required', 'date'],
    ]);

    $wasAlreadyDone = $task->status === 'done';

    $task->update($validated);

    $isNowDone = $task->status === 'done';

    if (!$wasAlreadyDone && $isNowDone) {
        Mail::to(env('TASK_NOTIFICATION_EMAIL'))
            ->send(new TaskCompletedMail($task));
    }

    return redirect()
        ->route('tasks.index')
        ->with('success', 'Task updated successfully.');
}

    public function destroy(Task $task)
    {
        $task->update([
            'is_archived' => true,
        ]);

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Task archived successfully.');
    }
}