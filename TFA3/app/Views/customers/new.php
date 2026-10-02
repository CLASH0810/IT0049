<!DOCTYPE html>
<html>
<head>
    <title>New Customer</title>
</head>
<body>

<nav>
    <a href="<?= base_url('/') ?>">Home</a> |
    <a href="<?= base_url('/about') ?>">About</a> |
    <a href="<?= base_url('/customers') ?>">Customer Accounts</a> |
    <a href="<?= base_url('/users') ?>">User Accounts</a>
</nav>

<h1>New Customer</h1>

<?php if (!empty($validation)): ?>
    <?= $validation->listErrors() ?>
<?php endif; ?>

<form method="post" action="<?= base_url('customers/new') ?>">
    <?= csrf_field() ?>

    <label>Full Name:</label><br>
    <input
        type="text"
        name="full_name"
        value="<?= esc($customer['full_name'] ?? '') ?>"
    >
    <br><br>

    <label>Email:</label><br>
    <input
        type="email"
        name="email"
        value="<?= esc($customer['email'] ?? '') ?>"
    >
    <br><br>

    <label>Phone:</label><br>
    <input
        type="text"
        name="phone"
        value="<?= esc($customer['phone'] ?? '') ?>"
    >
    <br><br>

    <button type="submit">Save Customer</button>
</form>

<br>

<a href="<?= base_url('/customers') ?>">Back to Customers</a>

</body>
</html>