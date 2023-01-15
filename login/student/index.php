<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Mahasiswa | Dashboard</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
	<link rel="stylesheet" href="../style/style.css" />
</head>

<body>
	<?php
	session_start();
	// echo '<script>alert("Selamat Datang di Dashboard Mahasiswa");</script>';

	// cek apakah yang mengakses halaman ini sudah login
	if ($_SESSION['level'] == "") {
		header("location:../index.php");
	} else if ($_SESSION['level'] != "student") {
		echo "<script>alert('Anda Bukan Mahasiswa. Silahkan login lagi!');</script>";
		header("location:../index.php");
	}

	// Create database connection using config file
	include("../koneksi.php");

	// Fetch all users data from database
	$result = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$_SESSION[username]'");
	$user_data = mysqli_fetch_array($result);
	?>
	<?php

	$data = mysqli_query($koneksi, "SELECT * FROM home");
	$home = mysqli_fetch_array($data);
	?>
	<!-- Navbar -->
	<?php include '../partials/navbar.php'; ?>
	<!-- End Navbar -->

	<!-- Start Content -->
	<div class="container mt-3 text-end">
		<div class="row">
			<div class="col-md-12">
				<h1>Halaman Mahasiswa</h1>
				<p>Selamat Datang <b><?php echo $user_data['nama'] ?></b> Anda telah login sebagai <b><?php echo $_SESSION['level']; ?></b>.</p>
			</div>
		</div>
	</div>

	<!-- Start Hero Section -->
	<section class="container mt-3 mb-5" id="hero">
		<div class="row">
			<div class="col-md-6">
				<img class="img-fluid rounded-4" src="../img/home/<?php echo $home['img'] ?>" />
			</div>
			<div class="col-md-6 text-end pt-5 px-4">
				<h2 class="block fw-bold"><?php echo $home['heading'] ?></h2>
				<p><?php echo $home['summary'] ?></p>
				<a class="btn btn-outline-primary" href="../pendaftaran/registrasi.php"><i class="far fa-paper-plane"></i> Daftarkan Dirimu</a>
				<!-- <a class="btn btn-dark button-home" href="#program-mbkm"><i class="far fa-clone"></i> Telusuri lebih lanjut</a> -->
			</div>
		</div>
	</section>
	<!-- End of Hero Section -->

	<?php include '../partials/footer.php'; ?>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>