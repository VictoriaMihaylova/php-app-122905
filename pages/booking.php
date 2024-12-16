<?php
    require_once('../db.php'); 
    require_once('../functions.php');
    require_once('../config.php');
    session_start(); 
    
    $service_id = $_GET['service_id'] ?? null;

    if ($service_id) {
        $stmt = $pdo->prepare("
            SELECT 
                services.name AS service_name, 
                breed_sizes.id AS size_id,  -- Добавяме ID-то на breed_size
                breed_sizes.name AS breed_size, 
                service_prices.price 
            FROM services
            LEFT JOIN service_prices ON services.id = service_prices.service_id
            LEFT JOIN breed_sizes ON service_prices.size_id = breed_sizes.id
            WHERE services.id = :service_id
        ");

        $stmt->execute(['service_id' => $service_id]);
        $services_data = $stmt->fetchAll();

        if ($services_data) {
            $service_name = $services_data[0]['service_name'];
        } else {
            $service_name = "Услугата не е намерена.";
            $services_data = [];
        }
    } else {
        $service_name = "Няма избрана услуга.";
        $services_data = [];
    }

    if (isset($_SESSION['flash']['message'])) {
        $message = $_SESSION['flash']['message'];
        echo '<div class="alert alert-' . $message['type'] . ' alert-dismissible fade show" role="alert">';
        echo $message['text'];
        echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
        echo '</div>';
    
        unset($_SESSION['flash']['message']);
        unset($_SESSION['flash']['data']);
    }
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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="<?= $base_url ?>assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?= $base_url ?>assets/css/calendar.css">
	<link rel="icon" type="image/png" href="<?= $base_url ?>assets/images/logo.png">
</head>
<body >
	<div class="container-fluid">
        <?php
            if (isset($_SESSION['user_name'])) {
                include('../includes/menu_logged_in.php');
            } else {
                include('../includes/menu_logged_out.php');
            }
        ?>
    
        <div class="container c-container my-5">
            <button class="btn btn-back m-4" onclick="window.history.back()"><span class="btn-back-symbol">&lt;</span> Назад</button>
            <div class="row mb-5">
                <div class="col-6 px-5">
                    <h3><?php echo htmlspecialchars($service_name, ENT_QUOTES, 'UTF-8'); ?></h3>
                    <p>Проверете нашата наличност и резервирайте дата и час, които са подходящи за вас</p>
                </div>
            </div>
            <div class="row my-4">
                <div class="col-lg-4 col-md-12 px-4 my-4 justify-content-center text-center">
                    <div class="shadow px-4 py-3" id="calendar"></div>
                </div>
                <div class="col-lg-4 col-md-12 my-3 px-3">
                    <div class="row pt-3">
                        <div class="col-12 mb-4 text-center fs-5 fst-italic fw-bold">
                            <p id="selected-date"></p>
                        </div>
                    </div>
                    <div class="row g-2 me-lg-4">
                        <div class="col-6">
                            <button type="button" class="btn btn-booking2 w-100">08:00</button>
                        </div>
                        <div class="col-6">
                            <button type="button" class="btn btn-booking2 w-100">09:00</button>
                        </div>
                        <div class="col-6">
                            <button type="button" class="btn btn-booking2 w-100">10:00</button>
                        </div>
                        <div class="col-6">
                            <button type="button" class="btn btn-booking2 w-100">11:00</button>
                        </div>
                        <div class="col-6">
                            <button type="button" class="btn btn-booking2 w-100">12:00</button>
                        </div>
                        <div class="col-6">
                            <button type="button" class="btn btn-booking2 w-100">13:00</button>
                        </div>
                        <div class="col-6">
                            <button type="button" class="btn btn-booking2 w-100">14:00</button>
                        </div>
                        <div class="col-6">
                            <button type="button" class="btn btn-booking2 w-100">15:00</button>
                        </div>
                        <div class="col-6">
                            <button type="button" class="btn btn-booking2 w-100">16:00</button>
                        </div>
                        <div class="col-6">
                            <button type="button" class="btn btn-booking2 w-100">17:00</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 my-3 pe-lg-5">
                    <div class="card c-card border-0 shadow">
                        <div class="card-body">
                            <div class="row my-3">
                                <div class="text-center fs-5 fw-bold pb-3">
                                    <span>Детайли за услугата</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 text-md-end">
                                    <p class="fs-6 fw-bold">Услуга</p>
                                </div>
                                <div class="col-md-9 pb-0">
                                    <p><?php echo htmlspecialchars($service_name, ENT_QUOTES, 'UTF-8'); ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 text-md-end">
                                    <p class="fs-6 fw-bold pt-1">Порода</p>
                                </div>
                                <div class="col-md-9 pt-0">
                                    <select name="service_option" id="service_option" class="form-select py-1">
                                        <option value="" disabled selected>-------------------</option>
                                        <?php foreach ($services_data as $data): ?>
                                            <option value="<?php echo htmlspecialchars($data['size_id'] . '-' . $data['breed_size'] . '-' . $data['price'], ENT_QUOTES, 'UTF-8'); ?>">
                                                <?php echo htmlspecialchars($data['breed_size'], ENT_QUOTES, 'UTF-8'); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row pt-1">
                                <div class="col-md-3 text-md-end">
                                    <p class="fs-6 fw-bold">Цена</p>
                                </div>
                                <div class="col-md-9 fs-6 py-0" id="selected-price"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 text-md-end">
                                    <p class="fs-6 fw-bold">Дата</p>
                                </div>
                                <div class="col-md-9 fs-6">
                                    <span id="selected-date"></span>
                                    <span id="selected-hour"></span>
                                </div>
                            </div>
                            <form action="/project/handlers/save_booking.php" method="POST" class="c-form">
                                <div class="row mb-2 align-items-center">
                                    <div class="col-md-3 text-md-end">
                                        <label for="name" class="form-label fs-6 fw-bold">Име</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" name="customer_name" class="form-control" id="name" placeholder="Вашето име" required>
                                    </div>
                                </div>
                                <div class="row mb-2 align-items-center">
                                    <div class="col-md-3 text-md-end">
                                        <label for="email" class="form-label fs-6 fw-bold">email</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="email" name="customer_email" class="form-control" id="email" placeholder="Вашият имейл" required>
                                    </div>
                                </div>
                                <div class="row mb-2 align-items-center">
                                    <div class="col-md-3 text-md-end">
                                        <label for="phone" class="form-label fs-6 fw-bold">Телефон</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="tel" name="customer_phone" class="form-control" id="phone" placeholder="Вашият телефон" required>
                                    </div>
                                </div>

                                <input type="hidden" name="service_id" value="<?php echo htmlspecialchars($service_id, ENT_QUOTES, 'UTF-8'); ?>">
                                <input type="hidden" name="size_id" id="size_id">
                                <input type="hidden" name="price" id="price">
                                <input type="hidden" name="appointment_date" id="selected_date2">
                                <input type="hidden" name="appointment_time" id="selected_hour">
                                
                                <div class="text-center">
                                    <button type="submit" class="btn btn-login mt-4 mb-3">Запази час</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
		include('../includes/footer.php');
    ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="<?= $base_url ?>assets/js/script.js"></script>
</body>
</html>