<?php
    require_once('../db.php');
    
    $date = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d');

    try {
        
        $query = "SELECT appointment_time FROM bookings WHERE appointment_date = :appointment_date";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':appointment_date', $date, PDO::PARAM_STR);
        $stmt->execute();

        $bookedTimes = [];

        while ($row = $stmt->fetch()) {
            $time = substr($row['appointment_time'], 0, 5);
            $bookedTimes[] = $time;
        }

        sort($bookedTimes);

        echo json_encode($bookedTimes);
    } catch (PDOException $e) {
        echo json_encode([]);
        error_log("Database error: " . $e->getMessage());
    }
?>
