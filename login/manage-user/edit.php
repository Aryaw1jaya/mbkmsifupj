<?php
// include database connection file
include_once("../koneksi.php");

// Check if form is submitted for user update, then redirect to homepage after update
if (isset($_POST['update'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama = $_POST['nama'];
    $level = $_POST['level'];

    // update user data
    $result = mysqli_query($koneksi, "UPDATE user SET password=' $password', nama='$nama', level='$level' WHERE username=$username");

    // Redirect to homepage to display updated user in list
    header("Location: index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$username = $_GET['username'];

// Fetech user data based on id
$result = mysqli_query($koneksi, "SELECT * FROM user WHERE username=$username");

while ($user_data = mysqli_fetch_array($result)) {
    $username = $user_data['username'];
    $password = $user_data['password'];
    $nama = $user_data['nama'];
    $level = $user_data['level'];
}
?>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Edit User Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css" />
    <link rel="stylesheet" href="../style/style.css" />
</head>

<body>
    <a href="index.php" class="btn btn-warning mt-3 ms-3"><i class="fas fa-arrow-left"></i> Kembali</a>
    <br /><br />

    <!-- Start Card Testimoni -->
    <div class="container m-auto px-5 py-4 bg-body rounded-5 my-1 shadow-lg">
        <div class="divider-custom mb-4">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon">
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Form Edit User</h2>
            </div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Form Testimoni -->
        <form class="mx-auto" name="update_user" method="post" action="edit.php">

            <!-- 2 column grid layout with text inputs for the first and last names -->
            <div class="row mb-2">
                <div class="col">
                    <div class="form-outline">
                        <label class="form-label" for="form6Example1">Username</label>
                        <input class="form-control" type="text" name="username" value="<?php echo $username ?>">
                    </div>
                </div>

                <!-- Image input -->
                <div class="form-outline mb-2">
                    <label class="form-label" for="form6Example2">Password</label>
                    <input class="form-control" type="text" name="password" value="<?php echo $password ?>">
                </div>

                <!-- Prodi input -->
                <div class="form-outline mb-2">
                    <label class="form-label" for="form6Example3">Nama Lengkap</label>
                    <input class="form-control" type="text" name="nama" value="<?php echo $nama ?>">
                </div>

                <!-- Text input -->
                <div class="form-outline mb-3">
                    <label class="form-label" for="form6Example4">Level</label>
                    <input class="form-control" type="text" name="level" value=<?php echo $level ?> readonly>
                </div>

                <!-- Submit button -->
                <input class="btn btn-primary btn-block mt-2 w-100 shadow-lg" type="submit" name="update" value="Update">
        </form>
        <!-- End form Testimoni -->
    </div>
    <!-- End Card Testimoni -->
</body>

</html>