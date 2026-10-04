<!DOCTYPE html>
<html>
<head>
    <title>User Accounts</title>
</head>
<body>

<nav>
    <a href="<?= base_url('/') ?>">Home</a> |
    <a href="<?= base_url('/about') ?>">About</a> |
    <a href="<?= base_url('/customers') ?>">Customer Accounts</a> |
    <a href="<?= base_url('/users') ?>">User Accounts</a>
</nav>

<h1>User Accounts</h1>

<a href="<?= base_url('/users/new') ?>">
    <button type="button">Add New User</button>
</a>

<br><br>

<table border="1" cellpadding="8">
    <tr>
        <th>Avatar</th>
        <th>Username</th>
        <th>Full Name</th>
        <th>Created At</th>
        <th>Action</th>
    </tr>

    <?php foreach ($users as $user): ?>
        <tr>
            <td>
                <?php if (!empty($user['avatar'])): ?>
                    <img
                        src="<?= base_url('uploads/avatars/' . $user['avatar']) ?>"
                        width="80"
                        height="80"
                        alt="User Avatar"
                    >
                <?php else: ?>
                    <img
                        src="<?= base_url('images/avatar-placeholder.png') ?>"
                        width="80"
                        height="80"
                        alt="Default Avatar"
                    >
                <?php endif; ?>
            </td>

            <td><?= esc($user['username']) ?></td>

            <td><?= esc($user['full_name']) ?></td>

            <td><?= esc($user['created_at']) ?></td>

            <td>
                <a href="<?= base_url('users/edit/' . $user['id']) ?>">
                    <button type="button">Edit User</button>
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>