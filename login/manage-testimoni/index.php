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
    $result = mysqli_query($koneksi, "SELECT * FROM testimoni ORDER BY id ASC");
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
        <h1 class="text-center">List Testimoni</h1>
        <a href="add.php">
            <button type="button" class="btn btn-primary shadow float-end">Add Testimoni</button>
        </a>
        <br>
        <br>

        <!-- Table Testimoni -->
        <table class="table table-striped text-center shadow" border=1>
            <tr class="table-primary">
                <th>Foto</th>
                <th>Nama</th>
                <th>Prodi_angkatan</th>
                <th>Testimoni</th>
                <th>Action</th>
            </tr>

            <?php
            while ($user_data = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $user_data['foto'] . "</td>";
                echo "<td>" . $user_data['nama'] . "</td>";
                echo "<td>" . $user_data['prodi_angkatan'] . "</td>";
                echo "<td>" . $user_data['testimoni'] . "</td>";
                echo "<td>
                        <a href='edit.php?id=$user_data[id]'>
                            <button type='button' class='btn btn-warning shadow'>Edit</button>
                        </a>
                        <a href='delete.php?id=$user_data[id]'>
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