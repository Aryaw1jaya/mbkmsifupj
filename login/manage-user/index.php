<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Admin | Manage User</title>
</head>

<body>
    <?php
    session_start();

    // cek apakah yang mengakses halaman ini sudah login
    if ($_SESSION['level'] == "") {
        header("location:../index.php"); // kalau belum login, kembalikan ke halaman login (belum benar)
    } else if ($_SESSION['level'] != "admin") {
        echo "<script>alert('Anda Bukan Admin. Silahkan login lagi!');</script>";
        header("location:../index.php");
    }
    ?>

    <!-- Navbar -->
    <?php include("../partials/navbar.php"); ?>
    <!-- End Navbar -->

    <div class="container-fluid mt-3">
        <h1 class="text-center fw-semibold">List User</h1>
        <!-- Dropdown Sort By -->
        <div class="container-fluid w-100 d-inline-flex mt-3 mb-4 justify-content-end">
            <div class="button me-3">
                <a href="add.php">
                    <button class="btn btn-success" type="button">
                        Add New User
                    </button>
                </a>
            </div>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Sort By
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Username</a></li>
                    <li><a class="dropdown-item" href="#">Nama</a></li>
                    <li><a class="dropdown-item" href="#">Level</a></li>
                </ul>
            </div>
        </div>


        <?php
        // Create database connection using config file
        include_once("../koneksi.php");

        // Fetch all users data from database
        $result = mysqli_query($koneksi, "SELECT * FROM user ORDER BY username ASC");
        ?>

        <table class="table table-striped text-center shadow" border=1>
            <tr class="table-primary">
                <th>Name</th>
                <th>Username</th>
                <th>Password</th>
                <th>Level</th>
                <th>Action</th>
            </tr>
            <?php
            while ($user_data = mysqli_fetch_array($result)) {
                echo "<tr>
                        <td>" . $user_data['nama'] . "</td>
                        <td>" . $user_data['username'] . "</td>
                        <td>" . $user_data['password'] . "</td>
                        <td>" . $user_data['level'] . "</td>
                        <td>  
                            <a href='edit.php?username=$user_data[username]'>
                                <button type='button' class='btn btn-warning shadow'>Edit</button>
                            </a>
                            <a href='delete.php?username=$user_data[username]'>
                                <button type='button' class='btn btn-danger shadow'>Delete</button>
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