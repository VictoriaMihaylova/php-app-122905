<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/project/config.php');
    $base_path = (basename(getcwd()) === 'pages') ? '../' : '';
    $current_page = isset($_GET['page']) ? $_GET['page'] : '';
?>

<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand m-0 p-0" href="<?= $base_url ?>index.php">
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
            <div class="dropdown">
                <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-person-circle px-2 fs-4"></i> <?php echo htmlspecialchars($_SESSION['user_name']); ?>
                </a>
                <ul class="dropdown-menu dropdown-menu-end text-end">
                    <li><a class="dropdown-item" href="<?= $base_url ?>pages/profile.php">Редактиране на профил</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="<?= $base_url ?>handlers/handle_logout.php">Изход</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>