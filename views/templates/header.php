<?php
/**
 * @var string $title
 */
?>

<!DOCTYPE HTML>
<html lang="de">
    <head>
        <title><?= esc($title) . ' | ' . esc(LANG['project_name']) ?></title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="https://cdn.datatables.net/v/dt/dt-2.3.2/datatables.min.css" rel="stylesheet"
              integrity="sha384-d76uxpdVr9QyCSR9vVSYdOAZeRzNUN8A4JVqUHBVXyGxZ+oOfrZVHC/1Y58mhyNg" crossorigin="anonymous" />
        <link rel="stylesheet" href="<?= base_url('assets/css/application.css') ?>" />
        <script src="https://code.jquery.com/jquery-3.7.1.js"
                integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/v/dt/dt-2.3.2/datatables.min.js"
                integrity="sha384-JRUjeYWWUGO171YFugrU0ksSC6CaWnl4XzwP6mNjnnDh4hfFGRyYbEXwryGwLsEp" crossorigin="anonymous"></script>
    </head>
    <body>
        <header>
            <nav>
                <!-- Dashboard -->
                <a href="<?= base_url('dashboard') ?>" title="<?= esc(LANG['nav']['dashboard']) ?>">
                    <?= esc(LANG['nav']['dashboard']) ?>
                </a>

                <!-- Tickets -->
                <a href="<?= base_url('tickets') ?>" title="<?= esc(LANG['nav']['tickets']) ?>">
                    <?= esc(LANG['nav']['tickets']) ?>
                </a>

                <!-- Projects -->
                <a href="<?= base_url('projects') ?>" title="<?= esc(LANG['nav']['projects']) ?>">
                    <?= esc(LANG['nav']['projects']) ?>
                </a>

                <!-- Customers -->
                <a href="<?= base_url('customers') ?>" title="<?= esc(LANG['nav']['customers']) ?>">
                    <?= esc(LANG['nav']['customers']) ?>
                </a>

                <!-- Status -->
                <a href="<?= base_url('status') ?>" title="<?= esc(LANG['nav']['status']) ?>">
                    <?= esc(LANG['nav']['status']) ?>
                </a>

                <!-- Users -->
                <a href="<?= base_url('users') ?>" title="<?= esc(LANG['nav']['users']) ?>">
                    <?= esc(LANG['nav']['users']) ?>
                </a>

                <!-- Logout -->
                <a href="<?= base_url('logout') ?>" title="<?= esc(LANG['actions']['logout']) ?>" class="logout">
                    <?= esc(LANG['actions']['logout']) ?>
                </a>
            </nav>
        </header>
        <main>
            <h1 class="title">
                <?= esc($title) ?>
            </h1>