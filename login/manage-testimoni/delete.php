<?php
// include database connection file
include("../koneksi.php");

// Get id from URL to delete that user
$id = $_GET['id'];

// Delete user row from table based on given id
$data = mysqli_query($koneksi, "SELECT * FROM testimoni WHERE id=$id");
$testimoni = mysqli_fetch_array($data);
unlink("../img/testimoni/" . $testimoni['foto']);

$result = mysqli_query($koneksi, "DELETE FROM testimoni WHERE id=$id");

// After delete redirect to Home, so that latest user list will be displayed.
header("Location:index.php");
