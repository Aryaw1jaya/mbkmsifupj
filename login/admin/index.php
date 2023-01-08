<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin | Home</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

</head>

<body>
	<?php
	session_start();

	// cek apakah yang mengakses halaman ini sudah login
	if ($_SESSION['level'] == "") {
		header("location:../index.php");
	} else if ($_SESSION['level'] != "admin") {
		echo "<script>alert('Anda Bukan Admin. Silahkan login lagi!');</script>";
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

	<div class="container mt-3">
		<h1>Halaman Admin</h1>

		<p>Halo <b><?php echo $user_data['nama'] ?></b> Anda telah login sebagai <b><?php echo $_SESSION['level']; ?></b>.</p>
	</div>


	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>