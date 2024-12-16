<?php
    require_once('../db.php');
    require_once('../functions.php');
    require_once('../config.php');
    session_start();

    if (!isset($_SESSION['user_id'])) {
        header('Location: ../index.php?page=login');
        exit;
    }

    $user_id = $_SESSION['user_id'];

    $query = "
        SELECT 
            u.email, u.first_name AS user_first_name, u.last_name AS user_last_name,
            p.address, p.phone, p.first_name AS profile_first_name, p.last_name AS profile_last_name, p.image
        FROM 
            users u
        LEFT JOIN 
            profiles p ON u.id = p.user_id
        WHERE 
            u.id = :user_id
    ";

    $stmt = $pdo->prepare($query);
    $stmt->execute(['user_id' => $user_id]);
    $user_data = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user_data) {
        $_SESSION['flash']['message']['type'] = 'danger';
        $_SESSION['flash']['message']['text'] = 'Потребителски данни не са намерени.';
        header('Location: ../index.php');
        exit;
    }

    $email = htmlspecialchars($user_data['email']);
    $first_name = htmlspecialchars($user_data['profile_first_name'] ?? $user_data['user_first_name']);
    $last_name = htmlspecialchars($user_data['profile_last_name'] ?? $user_data['user_last_name']);
    $address = htmlspecialchars($user_data['address'] ?? '');
    $phone = htmlspecialchars($user_data['phone'] ?? '');
    $image = $user_data['image'] ? htmlspecialchars($user_data['image']) : '../assets/images/profiles/default_user.jpg';
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
    <div class="container-fluid">
        <?php
            if (isset($_SESSION['user_name'])) {
                include('../includes/menu_logged_in.php');
            } else {
                include('../includes/menu_logged_out.php');
            }
        ?>

        <div class="row my-5 justify-content-center">
            <div class="col-lg-3">
                <div class="card profile-card p-3 mb-3">
                    <div class="col-12 col-lg-auto text-center">
                        <img src="<?= $image ?>" class="m-0" alt="Profile Image" style="width: 120px; height: 120px; object-fit: cover; border-radius: 10px;">
                    </div>

                    <div class="col-12 col-lg text-center">
                        <h3 class="pt-3"><?= $first_name . ' ' . $last_name ?></h3>
                        <button type="button" class="btn btn-profile btn-sm mt-3">Смени снимка</button>
                    </div>
                </div>
                <div class="card profile-card">
                    <div class="d-flex align-items-start">
                        <div class="nav nav-pills w-100 p-lg-3 m-sm-1 m-lg-0" id="v-pills-tab" role="tablist" aria-orientation="horizontal">
                            <button class="nav-link active text-start" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="true">
                                <i class="fa fa-user fa-fw me-2"></i> Лични данни
                            </button>
                            <button class="nav-link text-start" id="v-pills-pet-tab" data-bs-toggle="pill" data-bs-target="#v-pills-pet" type="button" role="tab" aria-controls="v-pills-pet" aria-selected="false">
                                <i class="fa fa-paw fa-fw me-2"></i> Вашият любимец
                            </button>
                            <button class="nav-link text-start" id="v-pills-security-tab" data-bs-toggle="pill" data-bs-target="#v-pills-security" type="button" role="tab" aria-controls="v-pills-security" aria-selected="false">
                                <i class="fa fa-shield fa-fw me-2"></i> Сигурност
                            </button>
                            <button class="nav-link text-start" id="v-pills-billing-tab" data-bs-toggle="pill" data-bs-target="#v-pills-billing" type="button" role="tab" aria-controls="v-pills-billing" aria-selected="false">
                                <i class="fa fa-credit-card fa-fw me-2"></i> Карти
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="card profile-card mt-sm-1 m-lg-0">
                    <div class="d-flex align-items-start">
                        <div class="tab-content p-3 rounded flex-grow-1" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab" tabindex="0">
                                <form method="POST" action="../handlers/update_profile.php" class="c-form">
                                    <div class="row px-3 gy-3">
                                        <span class="fw-bold px-3 text-center text-md-start">ЛИЧНИ ДАННИ</span>
                                        <hr class="mb-4">
                                        <div class="col-12 ">
                                            <label for="email" class="form-label">Електронна поща</label>
                                            <input type="email" class="form-control" id="user-email" name="email" value="<?= $email ?>" disabled>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label for="first-name" class="form-label">Име</label>
                                            <input type="text" class="form-control" id="first-name" name="first-name" value="<?= $first_name ?>">
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label for="last-name" class="form-label">Фамилия</label>
                                            <input type="text" class="form-control" id="last-name" name="last-name" value="<?= $last_name ?>">
                                        </div>
                                        <div class="col-12">
                                            <label for="address" class="form-label">Адрес</label>
                                            <input type="text" class="form-control" id="address" name="address" value="<?= $address ?>">
                                        </div>
                                        <div class="col-12">
                                            <label for="phone" class="form-label">Телефон</label>
                                            <input type="tel" class="form-control" id="phone" name="phone" value="<?= $phone ?>">
                                        </div>
                                        <div class="col-12 mt-4 text-center text-md-start">
                                            <button type="submit" class="btn btn-login">Запази промените</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="v-pills-pet" role="tabpanel" aria-labelledby="v-pills-pet-tab" tabindex="0">
                                <form class="c-form">
                                    <div class="row px-3 gy-3">
                                        <span class="fw-bold px-3 text-center text-md-start">ДАННИ ЗА ВАШИЯ ЛЮБИМЕЦ</span>
                                        <hr class="mb-4">
                                        <div class="col-12 col-md-6">
                                            <label for="pet-name" class="form-label">Име на любимеца</label>
                                            <input type="text" class="form-control" id="pet-name" name="pet-name" placeholder="Въведете името на вашия любимец" required>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label for="pet-type" class="form-label">Вид животно</label>
                                            <select class="form-select" id="pet-type" name="pet-type" required>
                                                <option value="dog">Куче</option>
                                                <option value="cat">Котка</option>
                                                <option value="other">Друго</option>
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label for="pet-breed" class="form-label">Порода</label>
                                            <input type="text" class="form-control" id="pet-breed" name="pet-breed" placeholder="Въведете породата" required>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label for="pet-age" class="form-label">Възраст</label>
                                            <input type="number" class="form-control" id="pet-age" name="pet-age" placeholder="Въведете възраст в години" min="0" max="50" required>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label for="pet-weight" class="form-label">Тегло (кг)</label>
                                            <input type="number" class="form-control" id="pet-weight" name="pet-weight" placeholder="Въведете теглото" step="0.1" min="0" required>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label for="pet-photo" class="form-label">Снимка на любимеца</label>
                                            <input type="file" class="form-control" id="pet-photo" name="pet-photo" accept="image/*">
                                        </div>
                                        <div class="col-12">
                                            <label for="pet-notes" class="form-label">Допълнителна информация</label>
                                            <textarea class="form-control" id="pet-notes" name="pet-notes" rows="3" placeholder="Добавете бележки или специални изисквания"></textarea>
                                        </div>
                                        <div class="col-12 mt-4 text-center text-md-start">
                                            <button type="submit" class="btn btn-login">Запази промените</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="v-pills-security" role="tabpanel" aria-labelledby="v-pills-security-tab" tabindex="0">
                                <div class="row px-3 gx-4">
                                    <span class="fw-bold px-3 pb-3 text-center text-md-start">НАСТРОЙКИ ЗА СИГУРНОСТ</span>
                                    <hr class="pb-4">
                                    <form class="c-form">
                                        <div class="row">
                                            <div class="col-12 col-md-6">
                                                <div class="fw-bold mb-3">Промяна парола:</div>
                                                <div class="mb-3">
                                                    <label for="current-password" class="form-label">Текуща парола</label>
                                                    <input type="password" class="form-control" id="current-password" name="current-password" placeholder="Въведете текущата си парола">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="new-password" class="form-label">Нова парола</label>
                                                    <input type="password" class="form-control" id="new-password" name="new-password" placeholder="Въведете новата си парола">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="confirm-password" class="form-label">Повтори парола</label>
                                                    <input type="password" class="form-control" id="confirm-password" name="confirm-password" placeholder="Повторете новата си парола">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="fw-bold mb-3">Промяна на емейл:</div>
                                                <div class="mb-3">
                                                    <label for="email" class="form-label">Електронна поща</label>
                                                    <input type="email" class="form-control" id="security-email" name="email" placeholder="Въведете новата си електронна поща" value="user@example.com">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center text-md-start">
                                            <button type="submit" class="btn btn-login mt-4">Запази промените</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            
                            <div class="tab-pane fade" id="v-pills-billing" role="tabpanel" aria-labelledby="v-pills-billing-tab" tabindex="0">
                                <form class="c-form">
                                    <div class="row px-3 gx-4">
                                        <span class="fw-bold px-3 pb-3 text-center text-md-start">ДАННИ ЗА ПЛАЩАНЕ</span>
                                        <hr class="mb-4">
                                        <div class="col-12 col-md-6">
                                            <div class="card shadow-sm my-4">
                                                <div class="card-body">
                                                    <div class="mb-3">
                                                        <label for="card-number-1" class="form-label">Номер на карта</label>
                                                        <input type="text" class="form-control" id="card-number-1" name="card-number-1" placeholder="XXXX XXXX XXXX XXXX" value="1234 5678 9012 3456">
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="mb-3">
                                                                <label for="expiry-date-1" class="form-label">Дата на изтичане</label>
                                                                <input type="text" class="form-control" id="expiry-date-1" name="expiry-date-1" placeholder="MM/YY" value="12/24">
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="mb-3">
                                                                <label for="cvv-1" class="form-label">CVV</label>
                                                                <input type="text" class="form-control" id="cvv-1" name="cvv-1" placeholder="XXX" value="123">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-center text-md-start">
                                                <button type="button" class="btn btn-login mt-3">Запази карта</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
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