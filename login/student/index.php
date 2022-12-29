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
	include_once("../koneksi.php");

	// Fetch all users data from database
	$result = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$_SESSION[username]'");
	$user_data = mysqli_fetch_array($result);
	?>
	<!-- Navbar -->
	<?php include '../partials/navbar.php'; ?>
	<!-- End Navbar -->

	<!-- Start Content -->
	<div class="container mt-3">
		<div class="row">
			<div class="col-md-12">
				<h1>Halaman Mahasiswa</h1>
				<p>Selamat Datang <b><?php echo $user_data['nama'] ?></b> Anda telah login sebagai <b><?php echo $_SESSION['level']; ?></b>.</p>
			</div>
		</div>
	</div>

	<!-- Start Hero Section -->
	<section class="container mt-3" id="hero">
		<div class="row">
			<div class="col-md-6">
				<img class="img-fluid rounded-4" src="https://images.unsplash.com/photo-1515879218367-8466d910aaa4?ixlib=rb-0.3.5&q=85&fm=jpg&crop=entropy&cs=srgb&ixid=eyJhcHBfaWQiOjE0NTg5fQ&s=f6812c92d213124d45a1719e3d2d39ba"></img>
			</div>
			<div class="col-md-6 text-end pt-5 px-4">
				<h2 class="block fw-bold">Merdeka Belajar Kampus Merdeka</h2>
				<p>Sistem Informasi khususnya di Universitas Pembangunan Jaya telah berusaha terus bersinergi dalam mempersiapkan lulusan yang siap terjun di dalam dunia kerja, khususnya di bidang Sistem Informasi.</p>
				<p>Untuk itu Program Merdeka Belajar yang merupakan bagian dari kebijakan Merdeka Belajar oleh Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi Republik Indonesia yang memberikan kesempaatan bagi mahasiswa/i untuk mengasah kemampuan sesuai bakat dan minat dengan terjun langsung ke dunia kerja sebagai persiapan karier masa depan.</p>
				<a class="btn btn-outline-primary" href="../pendaftaran/registrasi.php"><i class="far fa-paper-plane"></i> Daftarkan Dirimu</a>
				<!-- <a class="btn btn-dark button-home" href="#program-mbkm"><i class="far fa-clone"></i> Telusuri lebih lanjut</a> -->
			</div>
		</div>
	</section>
	<!-- End of Hero Section -->

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>