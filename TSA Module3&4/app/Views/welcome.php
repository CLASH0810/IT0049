<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
</head>
<body>
    <h1>Tasks for Today</h1>

    <a href="<?= site_url('/') ?>">Welcome</a> |
    <a href="<?= site_url('tasks') ?>">Task List</a> |
    <a href="<?= site_url('profile') ?>">Profile</a> |
    <a href="<?= site_url('about') ?>">About</a>

    <h2>Today's Tasks</h2>

    <?php if (empty($tasks)): ?>
        <p>No tasks for today.</p>
    <?php else: ?>
        <ul>
            <?php foreach ($tasks as $task): ?>
                <li>
                    <?= esc($task['title']) ?>
                    - <?= esc($task['status']) ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</body>
</html>