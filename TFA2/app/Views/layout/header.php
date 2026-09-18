<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= esc($title) ?> | Simple POS</title>

    <style>
        body {
            margin: 0;
            background-color: #f4f6f9;
            color: #333;
            font-family: Arial, sans-serif;
        }

        header {
            padding: 20px 40px;
            background-color: #172554;
            color: white;
        }

        nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .brand {
            color: white;
            font-size: 24px;
            font-weight: bold;
            text-decoration: none;
        }

        .navigation a {
            margin-left: 20px;
            color: white;
            text-decoration: none;
        }

        .navigation a:hover {
            color: #93c5fd;
        }

        main {
            width: 90%;
            max-width: 1100px;
            min-height: 70vh;
            margin: 40px auto;
        }
    </style>
</head>

<body>

<header>
    <nav>
        <a class="brand" href="<?= site_url('/') ?>">
            Simple POS
        </a>

        <div class="navigation">
            <a href="<?= site_url('/') ?>">Home</a>
            <a href="<?= site_url('about') ?>">About</a>
            <a href="<?= site_url('customers') ?>">Customers</a>
            <a href="<?= site_url('users') ?>">Users</a>
        </div>
    </nav>
</header>

<main>