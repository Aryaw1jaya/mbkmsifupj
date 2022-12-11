<?php
// include database connection file
include("../koneksi.php");

// Get id from URL to delete that user
$id_pendaftaran = $_GET['id_pendaftaran'];

// Delete user row from table based on given id
$result = mysqli_query($koneksi, "UPDATE registrasi SET status = 'diTolak' WHERE id_pendaftaran=$id_pendaftaran");

// After delete redirect to Home, so that latest user list will be displayed.
header("Location:index.php");
