<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dosen | Home</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

</head>

<body>
	<?php
	session_start();

	// cek apakah yang mengakses halaman ini sudah login
	if ($_SESSION['level'] == "") {
		header("location:../index.php");
	} else if ($_SESSION['level'] != "lecturer") {
		echo "<script>alert('Anda Bukan Dosen. Silahkan login lagi!');</script>";
		header("location:../index.php");
	}

	// Create database connection using config file
	include_once("../koneksi.php");

	// Fetch all users data from database
	$result = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$_SESSION[username]'");
	$user_data = mysqli_fetch_array($result);
	?>

	<!-- Navbar -->
	<?php include("../partials/navbar.php"); ?>
	<!-- End Navbar -->

	<div class="container mt-3 text-end">
		<h1>Halaman Dosen</h1>

		<p>Halo <b><?php echo $user_data['nama'] ?></b> Anda telah login sebagai <b><?php echo $_SESSION['level']; ?></b>.</p>
	</div>

	<div class="mx-auto mb-5 border py-2 px-5" style="width: 80%;">
		<h3>Statistik Pendaftar Program MBKM</h3>
		<canvas id="myChart"></canvas>
	</div>

	<?php include("../partials/footer.php"); ?>

	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

	<script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ["Pendaftar", "Verifikasi", "Pending", "Ditolak"],
				datasets: [{
					label: "",
					data: [
						<?php
						$jumlah = mysqli_query($koneksi, "select * from registrasi");
						echo mysqli_num_rows($jumlah);
						?>,
						<?php
						$jumlah_verif = mysqli_query($koneksi, "select * from registrasi where status='Terverifikasi'");
						echo mysqli_num_rows($jumlah_verif);
						?>,
						<?php
						$jumlah_pending = mysqli_query($koneksi, "select * from registrasi where status='Belum Diverifikasi'");
						echo mysqli_num_rows($jumlah_pending);
						?>,
						<?php
						$jumlah_tolak = mysqli_query($koneksi, "select * from registrasi where status='diTolak'");
						echo mysqli_num_rows($jumlah_tolak);
						?>

					],
					backgroundColor: [
						'rgba(255, 99, 132, 0.2)',
						'rgba(54, 162, 235, 0.2)',
						'rgba(255, 206, 86, 0.2)',
						'rgba(75, 192, 192, 0.2)'
					],
					borderColor: [
						'rgba(255,99,132,1)',
						'rgba(54, 162, 235, 1)',
						'rgba(255, 206, 86, 1)',
						'rgba(75, 192, 192, 1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero: true
						}
					}]
				}
			}
		});
	</script>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>