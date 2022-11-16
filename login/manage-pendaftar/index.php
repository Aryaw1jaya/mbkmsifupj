<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Lecturer | Manage Pendaftar</title>
</head>

<body>
    <?php
    session_start();

    // cek apakah yang mengakses halaman ini sudah login
    if ($_SESSION['level'] == "") {
        header("location:../index.php"); // kalau belum login, kembalikan ke halaman login (belum benar)
    } else if ($_SESSION['level'] != "lecturer") {
        echo "<script>alert('Anda Bukan Dosen. Silahkan login lagi!');</script>";
        header("location:../index.php");
    }
    ?>
    <?php
    // Create database connection using config file
    include("../koneksi.php");

    // Fetch all users data from database
    $result = mysqli_query($koneksi, "SELECT * FROM registrasi ORDER BY id_pendaftaran ASC");
    ?>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container">
            <a class="navbar-brand text-light" href="#">MBKM SIF UPJ</a>
            <button class="navbar-toggler text-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon text-light"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ">
                    <li class="nav-item ">
                        <a class="nav-link active text-light" aria-current="page" href="../lecturer/index.php">Home</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link text-light" href="index.php">List Pendaftar</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-light float-end" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Account
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item " href="#">Change Password</a></li>
                            <li><a class="dropdown-item " href="../logout.php">Log Out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->

    <div class="container-fluid mt-3">
        <!-- Dropdown Sort By -->
        <div class="dropdown mt-3 mb-4 float-end">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Sort By
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Nama</a></li>
                <li><a class="dropdown-item" href="#">Nim</a></li>
                <li><a class="dropdown-item" href="#">Angkatan</a></li>
                <li><a class="dropdown-item" href="#">Status</a></li>
            </ul>
        </div>

        <!-- Table Pendaftar -->
        <table class="table table-striped text-center shadow" border=1>
            <tr class="table-primary">
                <th>Nama</th>
                <th>NIM</th>
                <th>Program MBKM</th>
                <th>Semester</th>
                <th>Telepon</th>
                <th>Email</th>
                <th>Alamat</th>
                <th>Surat Rekomendasi</th>
                <th>Surat Pernyataan Tanggung Jawab</th>
                <th>Status</th>
                <th>Action</th>
            </tr>

            <?php
            while ($user_data = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $user_data['nama'] . "</td>";
                echo "<td>" . $user_data['nim'] . "</td>";
                echo "<td>" . $user_data['program'] . "</td>";
                echo "<td>" . $user_data['semester'] . "</td>";
                echo "<td>" . $user_data['no_hp'] . "</td>";
                echo "<td>
                        <a href='mailto:" . $user_data['email'] . "'>
                            <button type='button' class='btn btn-primary p-1 shadow'>" . $user_data['email'] . "</button>
                        </a>
                    </td>";
                echo "<td>" . $user_data['alamat'] . "</td>";
                echo "<td><a href='../document/" . $user_data['surat_rekomendasi'] . "'><button type='button' class='btn btn-info shadow'>" . $user_data['surat_rekomendasi'] . "</button></a> </td>";
                echo "<td><a href='../document/" . $user_data['sptjm'] . "'><button type='button' class='btn btn-info shadow'>" . $user_data['sptjm'] . "</button></a> </td>";
                echo "<td>" . $user_data['status'] . "</td>";
                echo "<td>
                        <a href='edit.php?id_pendaftaran=$user_data[id_pendaftaran]'>
                            <button type='button' class='btn btn-warning shadow'>Edit</button>
                        </a>
                        <a href='delete.php?id_pendaftaran=$user_data[id_pendaftaran]'>
                            <button type='button' class='btn btn-danger shadow'>Delete</button>
                        </a>
                    </td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>