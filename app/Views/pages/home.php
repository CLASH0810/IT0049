<?= $this->include('layout/header') ?>

<section class="hero">
    <p class="label">POINT-OF-SALE SYSTEM</p>

    <h1>Welcome to Simple POS</h1>

    <p>
        This first version provides quick access to customer
        and staff account records.
    </p>

    <div class="buttons">
        <a href="<?= site_url('customers') ?>" class="button">
            View Customers
        </a>

        <a href="<?= site_url('users') ?>" class="button secondary">
            View Users
        </a>
    </div>
</section>

<style>
    .hero {
        padding: 60px;
        background: linear-gradient(135deg, white, #eff6ff);
        border: 1px solid #dbe3ee;
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
    }

    .label {
        margin: 0;
        color: #2563eb;
        font-size: 14px;
        font-weight: bold;
        letter-spacing: 2px;
    }

    .hero h1 {
        margin: 10px 0;
        color: #172554;
        font-size: 48px;
    }

    .hero p {
        font-size: 18px;
    }

    .buttons {
        display: flex;
        gap: 12px;
        margin-top: 25px;
    }

    .button {
        padding: 12px 20px;
        background-color: #2563eb;
        border-radius: 7px;
        color: white;
        font-weight: bold;
        text-decoration: none;
    }

    .button.secondary {
        background-color: #dbeafe;
        color: #1d4ed8;
    }
</style>

<?= $this->include('layout/footer') ?>