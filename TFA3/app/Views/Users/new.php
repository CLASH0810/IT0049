<!DOCTYPE html>
<html>
<head>
    <title>New User</title>
</head>
<body>

<nav>
    <a href="<?= base_url('/') ?>">Home</a> |
    <a href="<?= base_url('/about') ?>">About</a> |
    <a href="<?= base_url('/customers') ?>">Customer Accounts</a> |
    <a href="<?= base_url('/users') ?>">User Accounts</a>
</nav>

<h1>New User</h1>

<?php if (!empty($validation)): ?>
    <?= $validation->listErrors() ?>
<?php endif; ?>

<form method="post" action="<?= base_url('users/new') ?>">
    <?= csrf_field() ?>

    <label>Username:</label><br>
    <input
        type="text"
        name="username"
        value="<?= esc($user['username'] ?? '') ?>"
    >
    <br><br>

    <label>Full Name:</label><br>
    <input
        type="text"
        name="full_name"
        value="<?= esc($user['full_name'] ?? '') ?>"
    >
    <br><br>

    <button type="submit">Save User</button>
</form>

<br>

<a href="<?= base_url('/users') ?>">Back to Users</a>

</body>
</html>