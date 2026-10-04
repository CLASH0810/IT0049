<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
</head>
<body>

<nav>
    <a href="<?= base_url('/') ?>">Home</a> |
    <a href="<?= base_url('/about') ?>">About</a> |
    <a href="<?= base_url('/customers') ?>">Customer Accounts</a> |
    <a href="<?= base_url('/users') ?>">User Accounts</a>
</nav>

<h1>Edit User</h1>

<?php if (!empty($validation)): ?>
    <?= $validation->listErrors() ?>
<?php endif; ?>

<?php if (!empty($user['avatar'])): ?>
    <p>Current Avatar:</p>
    <img
        src="<?= base_url('uploads/avatars/' . $user['avatar']) ?>"
        width="120"
        height="120"
        alt="Current Avatar"
    >
<?php endif; ?>

<form
    method="post"
    action="<?= base_url('users/edit/' . $user['id']) ?>"
    enctype="multipart/form-data"
>
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

    <label>Profile Picture:</label><br>
    <input
        type="file"
        name="avatar"
        accept=".jpg,.jpeg,.png"
    >
    <p>Allowed: JPG or PNG, maximum 2MB.</p>

    <button type="submit">Update User</button>
</form>

<br>

<a href="<?= base_url('/users') ?>">Back to Users</a>

</body>
</html>