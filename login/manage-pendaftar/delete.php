<?php
// include database connection file
include("../koneksi.php");

// Get id from URL to delete that user
$id_pendaftaran = $_GET['id_pendaftaran'];

// Delete user row from table based on given id
$data = mysqli_query($koneksi, "SELECT * FROM registrasi WHERE id_pendaftaran=$id_pendaftaran");
$document = mysqli_fetch_array($data);
unlink("../document/" . $document['surat_rekomendasi']);
unlink("../document/" . $document['sptjm']);

// Delete user row from table based on given id
$result = mysqli_query($koneksi, "DELETE FROM registrasi WHERE id_pendaftaran=$id_pendaftaran");

// After delete redirect to Home, so that latest user list will be displayed.
header("Location:index.php");
