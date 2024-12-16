<?php
    require_once('../functions.php');
    require_once('../db.php');
    session_start();

    $error = '';
    foreach ($_POST as $key => $value) {
        if (mb_strlen($value) == 0) {
            $error = 'Всички полета са задължителни!';
        }
    }

    if (mb_strlen($error) > 0) {
        $_SESSION['flash']['message']['type'] = 'danger';
        $_SESSION['flash']['message']['text'] = $error;
        $_SESSION['flash']['data'] = $_POST;
        header('Location: ../index.php?page=register');
        exit;
    } else if ($_POST['password'] != $_POST['password_confirm']) {
        $_SESSION['flash']['message']['type'] = 'danger';
        $_SESSION['flash']['message']['text'] = 'Паролите не съвпадат!';
        $_SESSION['flash']['data'] = $_POST;
        header('Location: ../index.php?page=register');
        exit;
    } else {
        $first_name = htmlspecialchars($_POST['first-name']);
        $last_name = htmlspecialchars($_POST['last-name']);
        $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);

        $query = "SELECT id FROM users WHERE email = :email";
        $stmt = $pdo->prepare($query);
        $stmt->execute([':email' => $email]);
        $user = $stmt->fetch();

        if ($user) {
            $_SESSION['flash']['message']['type'] = 'danger';
            $_SESSION['flash']['message']['text'] = 'Потребител с този имейл вече съществува!';
            $_SESSION['flash']['data'] = $_POST;
            header('Location: /project/index.php?page=register');
            exit;
        }

        $password = password_hash($_POST['password'], PASSWORD_ARGON2I);

        $query = "INSERT INTO users (email, first_name, last_name, password) VALUES (?, ?, ?, ?)";
        $stmt = $pdo->prepare($query);
        $params = [$email, $first_name, $last_name, $password];
        if ($stmt->execute($params)) {
            $user_id = $pdo->lastInsertId();

            $profile_query = "INSERT INTO profiles (user_id, first_name, last_name) VALUES (?, ?, ?)";
            $profile_stmt = $pdo->prepare($profile_query);
            $profile_params = [$user_id, $first_name, $last_name];
            
            if ($profile_stmt->execute($profile_params)) {
                $_SESSION['flash']['message']['type'] = 'success';
                $_SESSION['flash']['message']['text'] = 'Успешна регистрация! Моля, влезте в профила си.';
                header('Location: ../index.php?page=login');
                exit;
            } else {
                $_SESSION['flash']['message']['type'] = 'danger';
                $_SESSION['flash']['message']['text'] = 'Неуспешно създаване на профил!';
                $_SESSION['flash']['data'] = $_POST;
                header('Location: ../index.php?page=register');
                exit;
            }
        } else {
            $_SESSION['flash']['message']['type'] = 'danger';
            $_SESSION['flash']['message']['text'] = 'Възникна грешка, моля опитайте по-късно!';
            $_SESSION['flash']['data'] = $_POST;
            header('Location: ../index.php?page=register');
            exit;
        }
    }
?>
