<?php
    require_once('../db.php');
    require_once('../functions.php');
    session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $service_id = $_POST['service_id'] ?? null;
        $size_id = $_POST['size_id'] ?? null;
        $price = $_POST['price'] ?? null;
        $appointment_date = $_POST['appointment_date'] ?? null;
        $appointment_time = $_POST['appointment_time'] ?? null;
        $customer_name = $_POST['customer_name'] ?? null;
        $customer_email = $_POST['customer_email'] ?? null;
        $customer_phone = $_POST['customer_phone'] ?? null;

        $missingFields = [];

        if (!$service_id) $missingFields[] = 'услуга';
        if (!$size_id) $missingFields[] = 'размер';
        if (!$price) $missingFields[] = 'цена';
        if (!$appointment_date) $missingFields[] = 'дата на резервация';
        if (!$appointment_time) $missingFields[] = 'час на резервация';
        if (!$customer_name) $missingFields[] = 'име на клиента';
        if (!$customer_email) $missingFields[] = 'имейл';
        if (!$customer_phone) $missingFields[] = 'телефон';

        if (!empty($missingFields)) {
            $errorMessage = "Моля, попълнете следните полета: " . implode(', ', $missingFields) . ".";
            die($errorMessage);
        }

        $stmt = $pdo->prepare("
            INSERT INTO bookings (service_id, size_id, price, appointment_date, appointment_time, customer_name, customer_email, customer_phone, created_at)
            VALUES (:service_id, :size_id, :price, :appointment_date, :appointment_time, :customer_name, :customer_email, :customer_phone, NOW())
        ");
        $stmt->execute([
            'service_id' => $service_id,
            'size_id' => $size_id,
            'price' => $price,
            'appointment_date' => $appointment_date,
            'appointment_time' => $appointment_time,
            'customer_name' => $customer_name,
            'customer_email' => $customer_email,
            'customer_phone' => $customer_phone,
        ]);

        echo "Запазването на час беше успешно!";
    }
?>