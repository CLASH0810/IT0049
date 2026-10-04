<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>POS Login</title>
</head>
<body>

<h1>POS Login</h1>

<?php if (!empty($error)): ?>
    <p><?= esc($error) ?></p>
<?php endif; ?>

<?php if (!empty($validation)): ?>
    <?= $validation->listErrors() ?>
<?php endif; ?>

<form method="post" action="<?= site_url('login') ?>">
    <?= csrf_field() ?>

    <label>Username</label>
    <input type="text" name="username" required>

    <br><br>

    <label>Password</label>
    <input type="password" name="password" required>

    <br><br>

    <button type="submit">Login</button>
</form>

</body>
</html>