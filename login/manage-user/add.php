<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | Add Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css" />
    <link rel="stylesheet" href="../style/style.css" />
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
    ?>
    <!-- Navbar -->
    <?php include("../partials/navbar.php"); ?>
    <!-- End Navbar -->

    <a href="index.php" class="btn btn-warning mt-3 ms-3"><i class="fas fa-arrow-left"></i> Back</a>
    <br /><br />
    <div class="container m-auto px-5 py-4 bg-body rounded-5 my-1 shadow-lg mb-5">
        <div class="divider-custom mb-4">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon">
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Add New User</h2>
            </div>
            <div class="divider-custom-line"></div>
        </div>
        <form action="add.php" method="post" name="form1">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label fw-semibold">Username</label>
                <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="usernameHelp" required>
                <div id="usernameHelp" class="form-text">Your Username must be 8-20 characters long, just numbers, and must not contain spaces, special characters, or emoji.</div>
                <div id="usernameHelp" class="form-text">*Contoh: 2020081001</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label fw-semibold">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" required>
                <div id="passwordHelp" class="form-text">Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.</div>
                <div id="passwordHelp" class="form-text">*Contoh : John123456</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label fw-semibold">Name</label>
                <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="nameHelp" required>
                <div id="nameHelp" class="form-text">Your Name must be 1-40 characters long, just Text, and must not contain special characters, or emoji.</div>
                <div id="nameHelp" class="form-text">*Contoh : Dimas Kanjeng</div>
            </div>
            <div class="mb-4">
                <label for="exampleInputEmail1" class="form-label fw-semibold">Level</label>
                <select class="form-select" aria-label="Default select example" name="level" id="level">
                    <option value="admin">Admin</option>
                    <option value="lecturer">Lecturer</option>
                    <option value="student">Student</option>
                </select>
                <div id="levelHelp" class="form-text">Choose Login Level</div>
            </div>
            <button type="submit" name="Submit" value="Add" class="btn btn-primary w-100">Submit</button>
        </form>
    </div>

    <?php

    // Check If form submitted, insert form data into users table.
    if (isset($_POST['Submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $nama = $_POST['nama'];
        $level = $_POST['level'];

        // include database connection file
        include_once("../koneksi.php");

        // Insert user data into table
        $result = mysqli_query($koneksi, "INSERT INTO user(username,password,nama,level) VALUES('$username','$password','$nama','$level')");

        // Show message when user added
        echo ('<script>
        alert("Data Berhasil Ditambah");
        window.location.href = "index.php";
        </script>');
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>