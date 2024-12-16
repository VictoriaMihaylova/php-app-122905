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
<body >
	<div class="container-fluid">
        <?php
            if (isset($_SESSION['user_name'])) {
                include('../includes/menu_logged_in.php');
            } else {
                include('../includes/menu_logged_out.php');
            }
        ?>

		<div class="row my-5">
            <div class="col-12 text-center">
                <h2>За нас</h2>
            </div>
        </div>
		<div class="row my-5">
			<div class="col-12 col-lg-6 mt-5 mt-lg-0 text-center text-lg-start order-2 order-lg-1 d-flex align-items-center justify-content-center">
				<div class="p-2 p-xl-5">
					<p class="">Добре дошли във "Веселата лапичка", мястото, където красотата и здравето на вашия любимец са наш основен приоритет!</p>
                    <p class="">Ние сме специализиран салон за професионален груминг, създаден с мисията да осигурим най-добрата грижа за кучета от всички породи и размери.</p>
      			</div>
			</div>
			<div class="col-12 col-lg-6 text-center order-1 order-lg-2">
				<div class="p-2 p-xl-5">
					<img src="<?= $base_url ?>assets/images/About-1.jpg" alt="image" class="img-fluid rounded shadow-lg">
				</div>
			</div>
		</div>
		<div class="row my-5">
			<div class="col-12 col-lg-6 mt-5 mt-lg-0 text-center text-lg-start order-2 d-flex align-items-center justify-content-center">
				<div class="p-2 p-xl-5">
					<p class="">Нашият екип от сертифицирани грумъри използва съвременни техники и висококачествени продукти, за да гарантира, че вашият домашен любимец ще изглежда и ще се чувства прекрасно. </p>
					<p>Ние се стремим да създадем спокойна и уютна обстановка както за вашето куче, така и за вас.</p>
      			</div>
			</div>
			<div class="col-12 col-lg-6 text-center order-1">
				<div class="p-2 p-xl-5">
					<img src="<?= $base_url ?>assets/images/About-2.jpg" alt="image" class="img-fluid rounded shadow-lg">
				</div>
			</div>
		</div>
		<div class="row my-5">
			<div class="col-12 col-lg-6 mt-5 mt-lg-0 text-center text-lg-start order-2 order-lg-1 d-flex align-items-center justify-content-center">
				<div class="p-2 p-xl-5">
					<p class=""> Вярваме, че всяко животно е уникално и заслужава индивидуален подход. Затова отделяме специално внимание, за да разберем вашите желания и нуждите на домашения ви любимец.</p>
					<p>Доверете ни се, за да превърнем груминга на вашия четириног приятел в приятно преживяване. Вашето доверие и усмивката на вашия домашен любимец са най-голямото ни признание.</p>
      			</div>
			</div>
			<div class="col-12 col-lg-6 text-center order-1 order-lg-2">
				<div class="p-2 p-xl-5">
					<img src="<?= $base_url ?>assets/images/About-3.jpg" alt="image" class="img-fluid rounded shadow-lg">
				</div>
			</div>
		</div>
        <div class="row my-5">
            <div class="col-12 text-center">
                <p class="fw-bold fs-3">Защото те заслужават най-доброто!</p>
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