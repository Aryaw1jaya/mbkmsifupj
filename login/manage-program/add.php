<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Manage Program</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css" />
    <link rel="stylesheet" href="../style/style.css" />
</head>

<body>
    <?php
    session_start();

    // cek apakah yang mengakses halaman ini sudah login
    if ($_SESSION['level'] == "") {
        header("location:../index.php");
    }
    // else if ($_SESSION['level'] != "student") {
    //     echo "<script>alert('Anda Bukan Mahasiswa. Silahkan login lagi!');</script>";
    //     header("location:../index.php");
    // }

    // include database connection file
    include("../koneksi.php");

    // $status = mysqli_query($koneksi, "SELECT * FROM registrasi WHERE nim = '$_SESSION[username]'");

    ?>

    <?php
    if (isset($_POST['Submit'])) {
        $nama_program = $_POST['nama_program'];
        $deskripsi = $_POST['deskripsi'];


        $folderUpload = "../img/program/";
        # periksa apakah folder tersedia
        if (!is_dir($folderUpload)) {
            # jika tidak maka folder harus dibuat terlebih dahulu
            mkdir($folderUpload, 0777, $rekursif = true);
        }
        # simpan masing-masing file ke dalam array 
        # dan casting menjadi objek :)
        $file_images = (object) @$_FILES['images'];

        // if ($file_images->size > 1000 * 2000) {
        //   die("File tidak boleh lebih dari 1MB");
        // }

        # mulai upload file
        $uploadSrSukses = move_uploaded_file(
            $file_images->tmp_name,
            "{$folderUpload}/{$file_images->name}"
        );

        // Insert user data into table
        $result = mysqli_query($koneksi, "INSERT INTO program(nama_program, images, deskripsi) VALUES('$nama_program','$file_images->name', '$deskripsi')");
        // Show message when user added
        echo "<script>alert('Pendaftaran Anda Berhasil');</script>";
    }
    ?>

    <!-- Navigation -->
    <?php include("../partials/navbar.php"); ?>

    <a href="index.php" class="btn btn-warning mt-3 ms-3"><i class="fas fa-arrow-left"></i> Back</a>

    <!-- Start Card Registrasi -->
    <div class="container m-auto px-5 py-5 bg-body rounded-5 my-5 shadow-lg">
        <div class="divider-custom mb-5">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon">
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Add Program MBKM</h2>
            </div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Form Registrasi -->
        <form class="mx-auto" action="add.php" method="post" enctype="multipart/form-data">
            <!-- 2 column grid layout with text inputs for the first and last names -->
            <div class="row mb-2">
                <div class="col">
                    <div class="form-outline">
                        <label class="form-label" for="form6Example1">Nama Program</label>
                        <input type="text" id="form6Example1" class="form-control shadow-sm" name="nama_program" />
                    </div>
                </div>
            </div>

            <!-- Text input -->
            <div class="form-outline mb-2">
                <label class="form-label" for="form6Example4">Images</label>
                <input type="file" id="form6Example4" class="form-control shadow-sm" name="images" />
            </div>

            <div class="row mb-2">
                <div class="col">
                    <div class="form-outline">
                        <label class="form-label" for="form6Example1">Deskripsi</label>
                        <textarea type="text" id="form6Example1" class="form-control shadow-sm" name="deskripsi"></textarea>
                    </div>
                </div>
            </div>

            <!-- Submit button -->
            <button type="submit" name="Submit" class="btn btn-primary btn-block mb-1 w-100 shadow-lg">
                Submit
            </button>
        </form>
        <!-- End form registrasi -->
    </div>
    <!-- End Card Registrasi -->

</body>

</html>