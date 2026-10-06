<?php

namespace App\Controllers;

use App\Models\TaskModel;

class Tasks extends BaseController
{
    private function requireLogin()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        return null;
    }

    public function index()
    {
        $taskModel = new TaskModel();

        $data['tasks'] = $taskModel
            ->where('is_archived', 0)
            ->orderBy('task_date', 'ASC')
            ->findAll();

        return view('tasks', $data);
    }

    public function new()
    {
        if ($redirect = $this->requireLogin()) {
            return $redirect;
        }

        return view('tasks_new');
    }

    public function create()
    {
        if ($redirect = $this->requireLogin()) {
            return $redirect;
        }

        $rules = [
            'title' => 'required|max_length[150]',
            'task_date' => 'required|valid_date[Y-m-d]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $taskModel = new TaskModel();

        $taskModel->insert([
            'title' => $this->request->getPost('title'),
            'status' => $this->request->getPost('status') ?: 'pending',
            'task_date' => $this->request->getPost('task_date'),
            'created_at' => date('Y-m-d H:i:s'),
            'is_archived' => 0,
        ]);

        return redirect()->to('/tasks')
            ->with('success', 'Task created successfully.');
    }

    public function edit($id)
    {
        if ($redirect = $this->requireLogin()) {
            return $redirect;
        }

        $taskModel = new TaskModel();

        $task = $taskModel
            ->where('is_archived', 0)
            ->find($id);

        if (!$task) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
                'Task not found.'
            );
        }

        return view('tasks_edit', ['task' => $task]);
    }

    public function update($id)
    {
        if ($redirect = $this->requireLogin()) {
            return $redirect;
        }

        $rules = [
            'title' => 'required|max_length[150]',
            'task_date' => 'required|valid_date[Y-m-d]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $taskModel = new TaskModel();

        $task = $taskModel
            ->where('is_archived', 0)
            ->find($id);

        if (!$task) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
                'Task not found.'
            );
        }

        $taskModel->update($id, [
            'title' => $this->request->getPost('title'),
            'status' => $this->request->getPost('status'),
            'task_date' => $this->request->getPost('task_date'),
        ]);

        return redirect()->to('/tasks')
            ->with('success', 'Task updated successfully.');
    }

    public function delete($id)
    {
        if ($redirect = $this->requireLogin()) {
            return $redirect;
        }

        $taskModel = new TaskModel();

        $task = $taskModel
            ->where('is_archived', 0)
            ->find($id);

        if (!$task) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
                'Task not found.'
            );
        }

        // This archives the task instead of deleting the database row.
        $taskModel->update($id, [
            'is_archived' => 1
        ]);

        return redirect()->to('/tasks')
            ->with('success', 'Task archived successfully.');
    }
}