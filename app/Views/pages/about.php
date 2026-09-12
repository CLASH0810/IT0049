<?= $this->include('layout/header') ?>

<section class="about-card">
    <p class="label">ABOUT THE PROJECT</p>

    <h1>About Simple POS</h1>

    <p>
        Simple POS is the first version of a basic
        Point-of-Sale system created using CodeIgniter 4.
    </p>

    <p>
        The Customer Accounts and User Accounts pages currently
        use static PHP arrays as temporary data sources.
    </p>

    <p>
        No database is required for this version. A database can
        be added in a future version of the system.
    </p>
</section>

<style>
    .about-card {
        padding: 40px;
        background-color: white;
        border: 1px solid #dbe3ee;
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
    }

    .about-card .label {
        margin: 0;
        color: #2563eb;
        font-size: 14px;
        font-weight: bold;
        letter-spacing: 2px;
    }

    .about-card h1 {
        margin: 10px 0;
        color: #172554;
        font-size: 40px;
    }

    .about-card p {
        color: #475569;
        font-size: 17px;
        line-height: 1.7;
    }
</style>

<?= $this->include('layout/footer') ?>