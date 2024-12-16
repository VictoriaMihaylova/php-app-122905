<?php
    require_once('../db.php');
    require_once('../functions.php');
    session_start();

    if (!isset($_SESSION['user_id'])) {
        header('Location: ../index.php?page=login');
        exit;
    }

    $user_id = $_SESSION['user_id'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $first_name = htmlspecialchars($_POST['first-name']);
        $last_name = htmlspecialchars($_POST['last-name']);
        $address = htmlspecialchars($_POST['address']);
        $phone = htmlspecialchars($_POST['phone']);

        $query = "UPDATE users SET first_name = :first_name, last_name = :last_name WHERE id = :user_id";
        $stmt = $pdo->prepare($query);
        $stmt->execute([
            'first_name' => $first_name,
            'last_name' => $last_name,
            'user_id' => $user_id
        ]);

        $query = "UPDATE profiles SET first_name = :profile_first_name, last_name = :profile_last_name, address = :address, phone = :phone WHERE user_id = :user_id";
        $stmt = $pdo->prepare($query);
        $stmt->execute([
            'profile_first_name' => $first_name,
            'profile_last_name' => $last_name,
            'address' => $address,
            'phone' => $phone,
            'user_id' => $user_id
        ]);

        $_SESSION['flash']['message']['type'] = 'success';
        $_SESSION['flash']['message']['text'] = 'Промените са запазени успешно!';
        header('Location: ../pages/profile.php');
        exit;
    }
?>
