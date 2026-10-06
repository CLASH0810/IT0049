<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
</head>
<body>
    <h1>User Profile</h1>

    <a href="<?= site_url('/') ?>">Welcome</a> |
    <a href="<?= site_url('tasks') ?>">Task List</a> |
    <a href="<?= site_url('profile') ?>">Profile</a> |
    <a href="<?= site_url('about') ?>">About</a>

    <p>Username: <?= esc($user['username']) ?></p>
    <p>Full name: <?= esc($user['full_name']) ?></p>
    <p>Email: <?= esc($user['email']) ?></p>
    <p>Created: <?= esc($user['created_at']) ?></p>
</body>
</html>