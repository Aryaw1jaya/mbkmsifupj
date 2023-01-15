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

	$data = mysqli_query($koneksi, "SELECT * FROM home");
	$home = mysqli_fetch_array($data);
	?>

	<!-- Navbar -->
	<?php include("../partials/navbar.php"); ?>
	<!-- End Navbar -->

	<div class="container mt-3 text-end">
		<h1>Halaman Admin</h1>

		<p>Halo <b><?php echo $user_data['nama'] ?></b> Anda telah login sebagai <b><?php echo $_SESSION['level']; ?></b>.</p>
	</div>

	<div class="container mt-3 mb-5">
		<h3>Manage Home Page</h3>
		<table class="table border">
			<tr>
				<th>Gambar</th>
				<td> : </td>
				<td> <img src="../img/home/<?php echo $home['img'] ?>" width="50%" height="50%"></td>
			</tr>
			<tr>
				<th>Header</th>
				<td> : </td>
				<td> <?php echo $home['heading'] ?></td>
			</tr>
			<tr>
				<th>Summary</th>
				<td> : </td>
				<td> <?php echo $home['summary'] ?></td>
			</tr>
			<tr>
				<th>Nama Penanggung Jawab</th>
				<td> : </td>
				<td> <?php echo $home['nama_penanggungjawab'] ?></td>
			</tr>
			<tr>
				<th>Nomor Penanggung Jawab</th>
				<td> : </td>
				<td> <a class="btn btn-success" href="https://api.whatsapp.com/send?phone=<?php echo $home['no_penanggungjawab'] ?>"><?php echo $home['no_penanggungjawab'] ?> </a></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td class="float-end">
					<a class="btn btn-warning mb-3 px-4" href="edit.php?id=<?php echo $home['id_home'] ?>">Edit</a </td>
			</tr>
		</table>
	</div>

	<?php include("../partials/footer.php"); ?>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>