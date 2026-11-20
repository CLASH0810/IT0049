<x-mail::message>
# Task Completed

The following task has been marked as completed:

**Task:** {{ $task->title }}

**Task Date:** {{ $task->task_date->format('F d, Y') }}

**Status:** {{ ucfirst($task->status) }}

Thank you,<br>
{{ config('app.name') }}
</x-mail::message>