<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/project/config.php');
    $base_path = (basename(getcwd()) === 'pages') ? '../' : '';
    $current_page = isset($_GET['page']) ? $_GET['page'] : '';
?>

<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand m-0 p-0" href="<?= $base_url ?>/index.php">
            <img src="<?= $base_path ?>assets/images/logo2.png" alt="Logo" width="122" height="42" class="d-inline-block align-text-center">
        </a>
        <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-md-center" id="navbarNav">
            <ul class="navbar-nav mx-auto p-0">
                <li class="nav-item">
                    <a class="nav-link <?php echo ($current_page == 'index') ? 'active' : ''; ?>" href="<?= $base_url ?>index.php?page=index">Начало</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($current_page == 'services') ? 'active' : ''; ?>" href="<?= $base_url ?>pages/services.php?page=services">Услуги</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($current_page == 'about') ? 'active' : ''; ?>" href="<?= $base_url ?>pages/about.php?page=about">За нас</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($current_page == 'contacts') ? 'active' : ''; ?>" href="<?= $base_url ?>pages/contacts.php?page=contacts">Контакти</a>
                </li>
            </ul>
            <a class="nav-link c-font" href="<?= $base_url ?>pages/login.php">Вход</a>
            <span class="d-none d-lg-block px-2" href="/">/</span>
            <a class="nav-link c-font" href="<?= $base_url ?>pages/register.php">Регистрация</a>
        </div>
    </div>
</nav>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="<?= $base_url ?>assets/js/script.js"></script>