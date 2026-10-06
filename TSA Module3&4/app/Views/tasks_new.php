<!DOCTYPE html>
<html>
<head>
    <title>New Task</title>
</head>
<body>
    <h1>Create New Task</h1>

    <p>
        <a href="<?= site_url('tasks') ?>">Back to Task List</a>
    </p>

    <?php if (session()->getFlashdata('errors')): ?>
        <ul style="color: red;">
            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form method="post" action="<?= site_url('tasks/create') ?>">
        <?= csrf_field() ?>

        <p>
            <label for="title">Task title:</label><br>
            <input
                type="text"
                id="title"
                name="title"
                value="<?= old('title') ?>"
            >
        </p>

        <p>
            <label for="status">Status:</label><br>
            <select id="status" name="status">
                <option value="pending">Pending</option>
                <option value="in progress">In Progress</option>
                <option value="completed">Completed</option>
            </select>
        </p>

        <p>
            <label for="task_date">Task date:</label><br>
            <input
                type="date"
                id="task_date"
                name="task_date"
                value="<?= old('task_date') ?>"
            >
        </p>

        <button type="submit">Save Task</button>
    </form>
</body>
</html>