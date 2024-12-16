<?php 
    require_once('../functions.php');
	require_once('../config.php');
    $current_page = isset($_GET['page']) ? $_GET['page'] : '';
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Pet grooming salon</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= $base_url ?>assets/css/style.css">
	<link rel="icon" type="image/png" href="<?= $base_url ?>assets/images/logo.png">
</head>
<body>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-6 c-container px-5 py-3">
                <button class="btn btn-back mb-3" onclick="window.history.back()"><span class="btn-back-symbol">&lt;</span> Назад</button>
                <div class="row">
                    <div class="col-12 mb-3">
                        <div class="text-center ">
                            <h4><b>Регистрация</b></h4>
                            <hr class="border-secondary">
                        </div>
                    </div>
                </div>
                <form method="POST" action="<?= $base_url ?>handlers/handle_register.php" class="c-form">
                    <div class="row">
                        <div class="col-12 mb-2">
                            <label for="email" class="form-label">Имейл адрес</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Вашият имейл" required>
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="first-name" class="form-label">Име</label>
                            <input type="text" class="form-control" id="first-name" name="first-name" value="" placeholder="Вашето име" required>
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="last-name" class="form-label">Фамилия</label>
                            <input type="text" class="form-control" id="last-name" name="last-name" value="" placeholder="Вашата фамилия" required>
                        </div>
                        <div class="col-12 mb-2">
                                <label for="password" class="form-label">Парола</label>
                                <input type="password" class="form-control" name="password" id="password" value="" placeholder="Вашата парола" required>
                        </div>
                        <div class="col-12 mb-2">
                                <label for="password" class="form-label">Повтори парола</label>
                                <input type="password" class="form-control" name="password_confirm" id="password_confirm" value="" placeholder="Повтори парола" required>
                        </div>                                
                        <div class="col-12 my-4">
                            <div class="d-grid">
                                <button class="btn btn-login w-100" type="submit">Регистрирай се</button>
                            </div>
                        </div>
                    </div>
                </form>
                <?php
                    if (isset($_SESSION['flash']['message'])) {
                        $message = $_SESSION['flash']['message'];
                        echo '<div class="alert alert-' . $message['type'] . ' alert-dismissible fade show" role="alert">';
                        echo $message['text'];
                        echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                        echo '</div>';
                        unset($_SESSION['flash']['message']);
                    }
                ?>
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-md-center">
                            <a class="text-secondary" href="<?= $base_url ?>pages/login.php">Вече си регистиран? Влез!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="<?= $base_url ?>assets/js/script.js"></script>
</body>
</html>