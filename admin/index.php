<?php
session_start();
if (!isset($_SESSION['username'])) header('location: ../login.php');
include "../db/koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>P A G O D A H O T E L - Admin Panel</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
	<!-- Icons -->
	<link rel="stylesheet" href="./assets/vendor/nucleo/css/nucleo.css" type="text/css">
	<link rel="stylesheet" href="./assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
	<!-- Page plugins -->
	<!-- Argon CSS -->
	<link rel="stylesheet" href="./assets/css/argon.css?v=1.2.0" type="text/css">
	<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

</head>

<body>
	<?php include "./sidenav.php";include "../db/cekKamar.php"; ?>
	
	<!-- Main content -->
	<div class="main-content" id="panel">
		<?php include "./topnav.php" ?>
		<div class="container-fluid mt-4" style="min-height: 85vh;">
			<div class="row">
			<?php
			if (!isset($_GET['page'])) echo "<script>window.location.href= 'index.php?page=kamar';</script>";
			if ($_GET['page'] == 'kamar') {
				include "./page/kamar.php";
			} elseif ($_GET['page'] == 'user') {
				include "./page/user.php";
			} elseif ($_GET['page'] == 'booking') {
				include "./page/booking.php";
			} elseif ($_GET['page'] == 'transaksi') {
				include "./page/transaksi.php";
			}
			?>
			</div>
		</div>
		<footer>
			<div class="container-fluid">
				<hr class="my-2">
				<h5>COPYRIGHT &copy; 2022 | P A G O D A   H O T E L</h5>
			</div>
		</footer>
	</div>

	<script src="./assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	<script src="./assets/vendor/js-cookie/js.cookie.js"></script>
	<script src="./assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
	<script src="./assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
	<!-- Optional JS -->
	<script src="./assets/vendor/chart.js/dist/Chart.min.js"></script>
	<script src="./assets/vendor/chart.js/dist/Chart.extension.js"></script>
	<!-- Argon JS -->
	<script src="./assets/js/argon.js?v=1.2.0"></script>
</body>

</html>