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
<title>Manage Program</title>
</head>

<body>
    <?php
    session_start();

    // cek apakah yang mengakses halaman ini sudah login
    if ($_SESSION['level'] == "") {
        header("location:../index.php"); // kalau belum login, kembalikan ke halaman login (belum benar)
    }
    // else if ($_SESSION['level'] != "lecturer") {
    //     echo "<script>alert('Anda Bukan Dosen. Silahkan login lagi!');</script>";
    //     header("location:../index.php");
    // }
    ?>
    <?php
    // Create database connection using config file
    include("../koneksi.php");

    // Fetch all users data from database
    $result = mysqli_query($koneksi, "SELECT * FROM program ORDER BY id ASC");
    ?>

    <!-- Navbar -->
    <?php include("../partials/navbar.php"); ?>
    <!-- End Navbar -->

    <div class="container-fluid mt-3">
        <h1 class="text-center fw-semibold">List Program</h1>
        <a href="add.php">
            <button type="button" class="btn btn-primary shadow float-end">Add Program</button>
        </a>
        <br>
        <br>
        <!-- Table Program -->
        <table class="table table-striped text-center shadow" border=1>
            <tr class="table-primary">
                <th>Nama Program</th>
                <th>Images</th>
                <th>Deskripsi</th>
                <th>Action</th>
            </tr>

            <?php
            while ($user_data = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $user_data['nama_program'] . "</td>";
                echo "<td><img src='../img/program/" . $user_data['images'] . "' alt='Gambar Program' width='90%' height='auto'></td>";
                echo "<td>" . $user_data['deskripsi'] . "</td>";
                echo "<td>
                        <a href='delete.php?id=$user_data[id]'>
                            <button type='button' class='btn btn-danger shadow w-75'><i class='fas fa-trash'></i></button>
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