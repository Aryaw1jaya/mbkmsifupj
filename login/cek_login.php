<?php 
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'koneksi.php';

// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];
// $nama = mysqli_query($koneksi,"select nama from user where username='$username'");


// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi,"select * from user where username='$username' and password='$password'");


// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if($cek > 0){

	$data = mysqli_fetch_assoc($login);

	// cek jika user login sebagai admin
	if($data['level']=="admin"){

		// buat session login dan username
		// $nama = mysqli_query($koneksi,"select nama from user where username='$username'");
		// $_SESSION['nama'] = $nama;
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "admin";
		// alihkan ke halaman dashboard admin
		header("location:./admin/index.php");

	// cek jika user login sebagai pegawai
	}else if($data['level']=="lecturer"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "lecturer";
		// alihkan ke halaman dashboard pegawai
		header("location:./lecturer/index.php");

	// cek jika user login sebagai pengurus
	}else if($data['level']=="student"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "student";
		// alihkan ke halaman dashboard pengurus
		header("location:./student/index.php");

	}else{

		// alihkan ke halaman login kembali
		header("location:index.php?pesan=gagal");
	}

}else{
	header("location:index.php?pesan=gagal");
}
