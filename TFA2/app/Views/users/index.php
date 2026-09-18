<?= $this->include('layout/header') ?>

<section class="page-heading">
    <p class="label">STAFF RECORDS</p>
    <h1>User Accounts</h1>
    <p>These records are retrieved from the MySQL users table.</p>
</section>

<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Full Name</th>
                <th>Date Created</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= esc($user['id']) ?></td>
                    <td><?= esc($user['username']) ?></td>
                    <td><?= esc($user['full_name']) ?></td>
                    <td><?= esc($user['created_at']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<style>
    .page-heading {
        margin-bottom: 25px;
    }

    .page-heading .label {
        margin: 0;
        color: #2563eb;
        font-size: 14px;
        font-weight: bold;
        letter-spacing: 2px;
    }

    .page-heading h1 {
        margin: 5px 0;
        color: #172554;
        font-size: 40px;
    }

    .page-heading p {
        color: #64748b;
    }

    .table-container {
        overflow-x: auto;
        background-color: white;
        border: 1px solid #dbe3ee;
        border-radius: 12px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.06);
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 16px;
        border-bottom: 1px solid #dbe3ee;
        text-align: left;
    }

    th {
        background-color: #eff6ff;
        color: #172554;
    }

    tbody tr:hover {
        background-color: #f8fafc;
    }

    tbody tr:last-child td {
        border-bottom: none;
    }
</style>

<?= $this->include('layout/footer') ?>