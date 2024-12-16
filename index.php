<?php 
    require_once('./functions.php');
	require_once('./config.php');
	$current_page = isset($_GET['page']) ? $_GET['page'] : '';
    session_start(); 

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
	<link rel="stylesheet" type="text/css" href="<?= $base_url ?>assets/css/style.css">
	<link rel="icon" type="image/png" href="<?= $base_url ?>assets/images/logo.png">
</head>
<body >
	<div class="container-fluid">
		<?php
            if (isset($_SESSION['user_name'])) {
                include('includes/menu_logged_in.php');
            } else {
                include('includes/menu_logged_out.php');
            }
        ?>
		<div class="row my-5">
			<div class="col-12 col-md-6 mt-4 text-center text-md-start">
				<div class="my-5">
					<div class="display-3 fw-bold my-4">
						Най-добрите фризьори на домашни любимци
					</div>
      				<h3>За перфектен външен вид и усещане</h3>
      				<hr class="c-line my-4">
      				<br>
      				<a href="pages/services.php" class="btn btn-booking">Запазете час</a>
      			</div>
			</div>
			<div class="col-12 col-md-6 order-md-1 order-2 my-3 text-center">
				<div class=" my-3 text-center">
					<img src="assets/images/pngegg2-h.png" alt="Responsive image" class="img-fluid d-block w-100">
				</div>
			</div>
		</div>

		<div class="row mt-5 mb-1">
			<div class="col-12 mt-5 text-center">
				<h2>Вашият домашен любимец</h2>
				<h2>заслужава да бъде поглезен!</h2>
			</div>
		</div>
		<div class="row my-3 gx-4 justify-content-center text-center">
			<div class="col-auto text-nowrap">
				<i class="fa fa-bath me-2 fs-3" aria-hidden="true"></i>
				<span class="c-font">Вана или душ</span>
			</div>
			<div class="col-auto text-nowrap">
				<i class="fa fa-paw me-2 fs-3" aria-hidden="true"></i>
				<span class="c-font">Грижа за лапичките</span>
			</div>
			<div class="col-auto text-nowrap">
				<i class="fa fa-scissors me-2 fs-3" aria-hidden="true"></i>
				<span class="c-font me-4">Хубава фризура</span>
			</div>
		</div>
		<div class="row my-5">
			<div class="col-12 d-flex justify-content-center mt-5">
        		<a href="pages/services.php" class="btn btn-booking">Нашите услуги</a>
    		</div>
		</div>

		<div class="row mx-5">
			<div class="col-12 col-sm-12 col-md-6 col-lg-3 image-hover my-5">
            	<img src="assets/images/1.jpg" class="img-fluid rounded" alt="Image 1">
        	</div>
        	<div class="col-12 col-sm-12 col-md-6 col-lg-3 image-hover my-5">
            	<img src="assets/images/2.jpg" class="img-fluid rounded" alt="Image 2">
        	</div>
        	<div class="col-12 col-sm-12 col-md-6 col-lg-3 image-hover my-5">
            	<img src="assets/images/3.jpg" class="img-fluid rounded" alt="Image 3">
        	</div>
        	<div class="col-12 col-sm-12 col-md-6 col-lg-3 image-hover my-5">
            	<img src="assets/images/4.jpg" class="img-fluid rounded" alt="Image 4">
        	</div>
		</div>

		<div class="row my-5">
			<div class="col-12 mt-5 text-center">
				<h2>Какво мислят</h2>
				<h2>клиентите за нас</h2>
			</div>
		</div>
		<div class="row g-5 my-3 mb-5 mx-4 justify-content-center">
			<div class="col-xl-4 col-lg-6 col-md-6 mb-3 mb-lg-5">
				<div class="card h-100 shadow-lg c-card">
					<div class="d-flex">
    					<img src="assets/images/profiles/profile1.jpg" class="m-4" alt="Client 1" style="width: 80px; height: 80px; object-fit: cover; border-radius: 10px;">
    					<span class="ms-auto text-end pt-4 pe-4">
        					<i class="bi bi-star-fill"></i>
        					<i class="bi bi-star-fill"></i>
        					<i class="bi bi-star-fill"></i>
        					<i class="bi bi-star-fill"></i>
        					<i class="bi bi-star-fill"></i>
    					</span>
					</div>
					<div class="card-body px-4">
						Изключителна грижа и внимание към моя домашен любимец! Кучето ми излезе не само добре подстригано, но и щастливо. Екипът е много мил и професионален. Препоръчвам с две ръце!
					</div>
					<div class="text-end px-4 pb-4">Алина Петрова</div>
				</div>
			</div>
			<div class="col-xl-4 col-lg-6 col-md-6 mb-3 mb-lg-5">
				<div class="card h-100 shadow-lg c-card">
					<div class="d-flex">
    					<img src="assets/images/profiles/profile2.jpg" class="m-4" alt="Client 3" style="width: 80px; height: 80px; object-fit: cover; border-radius: 10px;">
    					<span class="ms-auto text-end pt-4 pe-4">
        					<i class="bi bi-star-fill"></i>
        					<i class="bi bi-star-fill"></i>
        					<i class="bi bi-star-fill"></i>
        					<i class="bi bi-star-fill"></i>
        					<i class="bi bi-star-fill"></i>
    					</span>
					</div>
					<div class="card-body px-4">
						Най-добрият груминг салон, на който съм попадал! Персоналът се грижи с много любов за животните, а услугите са на най-високо ниво. Котката ми изглежда невероятно – чиста, пухкава и спокойна след процедурата.
					</div>
					<div class="text-end px-4 pb-4">Явор Димитров</div>
				</div>
			</div>
			<div class="col-xl-4 col-lg-6 col-md-6 mb-3 mb-lg-5">
				<div class="card h-100 shadow-lg c-card">
					<div class="d-flex">
    					<img src="assets/images/profiles/profile3.jpg" class="m-4" alt="Client 3" style="width: 80px; height: 80px; object-fit: cover; border-radius: 10px;">
    					<span class="ms-auto text-end pt-4 pe-4">
        					<i class="bi bi-star-fill"></i>
        					<i class="bi bi-star-fill"></i>
        					<i class="bi bi-star-fill"></i>
        					<i class="bi bi-star-fill"></i>
        					<i class="bi bi-star-half"></i>
    					</span>
					</div>
					<div class="card-body px-4">
						<p>Много съм доволен от качеството на услугата, но се наложи да чакам малко повече от очакваното. Въпреки това, крайният резултат беше страхотен – кучето ми изглеждаше чудесно. Ще се върна отново!</p>
					</div>
					<div class="text-end px-4 pb-4">Михаил Станчев</div>
				</div>
			</div> 
		</div>

		<div class="row my-5">
			<div class="col-12 mt-5 text-center">
				<h2>Разгледайте галерията</h2>
				<h2>с нашите любимци</h2>
			</div>
		</div>
		<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 mx-5 mb-5">
			<div class="col image-hover">
            	<img src="assets/images/gallery/gallery1.jpg" class="img-fluid rounded" alt="Image 1">
        	</div>
        	<div class="col image-hover">
            	<img src="assets/images/gallery/gallery2.jpg" class="img-fluid rounded" alt="Image 2">
        	</div>
        	<div class="col image-hover">
            	<img src="assets/images/gallery/gallery3.jpg" class="img-fluid rounded" alt="Image 3">
        	</div>
        	<div class="col image-hover">
            	<img src="assets/images/gallery/gallery4.jpg" class="img-fluid rounded" alt="Image 4">
        	</div>
			<div class="col image-hover">
            	<img src="assets/images/gallery/gallery5.jpg" class="img-fluid rounded" alt="Image 5">
        	</div>
        	<div class="col image-hover">
            	<img src="assets/images/gallery/gallery6.jpg" class="img-fluid rounded" alt="Image 6">
        	</div>
        	<div class="col image-hover">
            	<img src="assets/images/gallery/gallery7.jpg" class="img-fluid rounded" alt="Image 7">
        	</div>
        	<div class="col image-hover">
            	<img src="assets/images/gallery/gallery8.jpg" class="img-fluid rounded" alt="Image 8">
        	</div>
		</div>
		<div class="row my-5 me-5">
    		<div class="col-12 d-flex justify-content-center mb-5 me-5">
        		<a href="#" class="btn btn-booking">Разгледай още</a>
    		</div>
		</div>
	</div>

	<?php
		include('includes/footer.php');
    ?>

	<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content" id="registerModalContent">
			
			</div>
		</div>
	</div>

  	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
	<script src="<?= $base_url ?>assets/js/script.js"></script>
</body>
</html>