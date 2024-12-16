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
	<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
	<link rel="icon" type="image/png" href="../assets/images/logo.png">
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

	    <div class="row justify-content-center my-5">
	        <div class="col-12 col-md-6 col-lg-4 p-4 justify-content-start rounded shadow-lg d-flex flex-column">
	            <h3 class="text-center">Форма за контакт</h3>
	            <form class="c-form">
	                <div class="mb-3">
	                    <label for="name" class="form-label">Име</label>
	                    <input type="text" class="form-control" id="name" placeholder="Вашето име">
	                </div>
	                <div class="mb-3">
	                    <label for="email" class="form-label">Електронна поща</label>
	                    <input type="email" class="form-control" id="email" placeholder="Вашият имейл">
	                </div>
	                <div class="mb-3">
	                    <label for="phone" class="form-label">Телефон</label>
	                    <input type="tel" class="form-control" id="phone" placeholder="Вашият телефон">
	                </div>
	                <div class="mb-3">
	                    <label for="message" class="form-label">Съобщение</label>
	                    <textarea class="form-control" id="message" rows="3" placeholder="Вашето съобщение"></textarea>
	                </div>
	                <div class="text-center">
	                    <button type="submit" class="btn btn-booking mt-3">Изпратете</button>
	                </div>
	            </form>
	        </div>
	        <div class="col-12 col-md-6 col-lg-4 p-0 d-flex mt-3 mt-md-0">
	            <iframe 
	                src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d5816.026992839656!2d27.918860977357244!3d43.2092062538864!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sg.k.%20BrizPrimorski%2C%20bul.%20%228-mi%20Primorski%20Polk%22%2064!5e0!3m2!1sen!2sbg!4v1732292513914!5m2!1sen!2sbg" 
	                style="border:0;" 
	                class="w-100" 
	                allowfullscreen="" 
	                loading="lazy" 
	                referrerpolicy="no-referrer-when-downgrade">
	            </iframe>
	        </div>
	    </div>
	</div>
    
	<?php
		include('../includes/footer.php');
    ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="../assets/js/script.js"></script>
</body>
</html>