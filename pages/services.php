<?php
	require_once('../db.php');
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

		<div class="row my-3">
			<div class="col-12 col-md-6 mt-4 text-center text-md-start">
				<div class="my-4">
      				<h2>Изберете най-доброто за вашия любимец</h2>
      				<br>
      				<br>
      				<p>В нашия салон се грижим за перфектния външен вид и комфорт на вашите домашни любимци! Тук ще откриете разнообразие от услуги, с които ще осигурим пълното удовлетворение на вашия четириног приятел. </p>
      				<p>Всички услуги са предназначени за дълбоко почистване на козината и кожата и включват топло двойно измиване с естествени шампоани и балсами, които не съдържат химикали и не вредят на вашия любимец.</p>
      				<p>Моля, преди да изберете услуга проверете категорията, в която попада вашето куче според големината на породата.</p>
      			</div>
			</div>
			<div class="col-12 col-md-6 mt-4 text-center text-md-start mb-5">
				<div class="my-5 text-center">
					<h4 class="fw-bold">Размери според породата</h4>
				</div>
				<div class="table-responsive">
    				<table class="table c-table-2 align-middle c-font-sz mx-auto">
        				<tbody>
            				<tr>
                				<td class="text-center py-4">
                					<img src="../assets/images/icons/S.png" class="img-fluid" alt="Small dog">
                				</td>
                				<td class="p-0 fw-bold text-start">
                					<div class="p-3">Малки породи /S/</div> 
                				</td>
                				<td class="pe-4 text-end">
                					<div>до 5 кг.</div>
                				</td>
            				</tr>
            				<tr>
            					<td class="text-center py-3">
                					<img src="../assets/images/icons/M.png" class="img-fluid" alt="Medium dog">
                				</td>
                				<td class="p-0 fw-bold text-start">
                					<div class="p-3">Средни породи /M/</div> 
                				</td>
                				<td class="pe-3 text-end">
                					<div>6-15 кг.</div>
                				</td>
            				</tr>
            				<tr>
            					<td class="text-center py-3">
            						<img src="../assets/images/icons/L.png" class="img-fluid" alt="Large dog">
                				</td>
                				<td class="p-0 fw-bold text-start">
                					<div class="p-3">Големи породи /L/</div> 
                				</td>
                				<td class="pe-3 text-end">
                					<div>16-30 кг.</div>
                				</td>
            				</tr>
            				<tr>
            					<td class="text-center">
                   					<img src="../assets/images/icons/XL.png" class="img-fluid" alt="Extra large dog">
                				</td>
                				<td class="p-0 fw-bold text-start">
                					<div class="p-3">Екстра големи /XL/</div> 
                				</td>
                				<td class="pe-3 text-end">
                					<div>над 30 кг.</div>
                				</td>
            				</tr>
       					</tbody>
   					</table>
				</div>
			</div>
		</div>
		<div class="row my-5">
			<div class="col-12 mt-3 text-center">
				<h2>Нашите услуги</h2>
			</div>
		</div>
	
		<div class="row row-cols-lg-3 row-cols-md-2 row-cols-1 g-4">
			<?php
				$stmt = $pdo->query("
					SELECT 
						services.id AS service_id, 
						services.name AS service_name, 
						services.description, 
						services.image AS image_path,
						GROUP_CONCAT(service_prices.price SEPARATOR ',') AS raw_prices -- Събираме цените в суров вид
					FROM services
					LEFT JOIN service_prices ON services.id = service_prices.service_id
					LEFT JOIN breed_sizes ON service_prices.size_id = breed_sizes.id
					GROUP BY services.id
				");
				if ($stmt->rowCount() > 0) {
					while ($row = $stmt->fetch()) {
						$prices_array = explode(',', $row['raw_prices']);
						$formatted_prices = array_map(function($price) {
							return number_format($price, 0) . 'лв.';
						}, $prices_array);

						$prices_text = implode(' / ', $formatted_prices);

						echo '<div class="col">
								<div class="card h-100 c-card text-center p-2">
									<img src="' . htmlspecialchars($row['image_path']) . '" class="card-img-top" alt="image" style="border-radius: 10px;">
									<div class="card-body">
										<h5 class="card-title fw-bold">' . htmlspecialchars($row['service_name']) . '</h5>
										<h6 class="fw-bold">' . htmlspecialchars($prices_text) . '</h6> <!-- Показва форматираните цени -->
										<p class="card-text c-font-sz pt-4">' . htmlspecialchars($row['description']) . '</p>
									</div>
									<div class="text-center p-4">
										<a href="../pages/booking.php?service_id=' . $row['service_id'] . '" class="btn btn-booking">Запази час</a>
									</div>
								</div>
							</div>';
					}
				} else {
					echo "Няма услуги за показване.";
				}
			?>
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