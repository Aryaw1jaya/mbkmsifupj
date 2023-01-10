<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css" />
    <link rel="stylesheet" href="../style/style.css" />
</head>
<title>Manage Pendaftar</title>
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
    $result = mysqli_query($koneksi, "SELECT * FROM registrasi ORDER BY timestamp ASC, status DESC");
    ?>

    <!-- Navbar -->
    <?php include("../partials/navbar.php"); ?>
    <!-- End Navbar -->

    <div class="container-fluid mt-3">
        <h1 class="text-center fw-semibold">List Pendaftar</h1>
        <!-- Dropdown Sort By -->
        <div class="dropdown mt-3 mb-4 float-end">
            <a href="print.php" class="btn btn-warning mx-2"><i class="fas fa-print"></i>Print</a>
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
                echo "<td><a href='../document/" . $user_data['surat_rekomendasi'] . "'><button type='button' class='btn btn-info shadow'><i class='fas fa-eye'></i> Lihat</button></a> </td>";
                echo "<td><a href='../document/" . $user_data['sptjm'] . "'><button type='button' class='btn btn-info shadow'><i class='fas fa-eye'></i> Lihat</button></a> </td>";
                echo "<td>" . $user_data['status'] . "</td>";
                echo "<td>
                        <a href='verifikasi.php?id_pendaftaran=$user_data[id_pendaftaran]'>
                            <button type='button' class='btn btn-success shadow w-75'><i class='fas fa-check'></i> Verifikasi</button>
                        </a>
                        <a href='denied.php?id_pendaftaran=$user_data[id_pendaftaran]'>
                            <button type='button' class='btn btn-warning shadow w-75'><i class='fas fa-ban'></i> Tolak</button>
                        </a>
                        <a href='delete.php?id_pendaftaran=$user_data[id_pendaftaran]'>
                            <button type='button' class='btn btn-danger shadow w-75'><i class='fas fa-trash'></i> Hapus</button>
                        </a>
                    </td>
                    </tr>";
            }
            ?>
        </table>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>