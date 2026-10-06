<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>

    <?php if (session()->getFlashdata('error')): ?>
        <p style="color: red;">
            <?= esc(session()->getFlashdata('error')) ?>
        </p>
    <?php endif; ?>

    <form method="post" action="<?= site_url('login') ?>">
        <?= csrf_field() ?>

        <p>
            <label>Username:</label><br>
            <input type="text" name="username"
                   value="<?= old('username') ?>">
        </p>

        <p>
            <label>Password:</label><br>
            <input type="password" name="password">
        </p>

        <button type="submit">Login</button>
    </form>

    <p>
        <a href="<?= site_url('/') ?>">Back to Welcome</a>
    </p>
</body>
</html>