<?php

namespace App\Controllers;

use App\Models\TaskModel;

class Home extends BaseController
{
    public function index()
    {
        $taskModel = new TaskModel();
        $today = date('Y-m-d');

        $data = [
            'tasks' => $taskModel
                ->where('task_date', $today)
                ->orderBy('id', 'ASC')
                ->findAll(),
            'today' => $today,
        ];

        return view('welcome', $data);
    }
}