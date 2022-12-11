<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Mahasiswa | Registrasi</title>
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
        header("location:../index.php"); // kalau belum login, kembalikan ke halaman login (belum benar)
    } else if ($_SESSION['level'] == "student") {
        echo "<script>alert('Anda Bukan Dosen. Silahkan login lagi!');</script>";
        header("location:../index.php");
    }
    ?>

    <?php
    if (isset($_POST['Submit'])) {
        $nama = $_POST['nama'];
        $prodi_angkatan = $_POST['prodi_angkatan'];
        $testimoni = $_POST['testimoni'];

        $folderUpload = "../img/testimoni";
        # periksa apakah folder tersedia
        if (!is_dir($folderUpload)) {
            # jika tidak maka folder harus dibuat terlebih dahulu
            mkdir($folderUpload, 0777, $rekursif = true);
        }
        # simpan masing-masing file ke dalam array 
        # dan casting menjadi objek :)
        $file_foto = (object) @$_FILES['foto'];

        if ($file_foto->size > 5000 * 2000) {
            die("File tidak boleh lebih dari 5MB");
        }

        // if ($file_foto->type !== 'image/jpg' || $file_foto->type !== 'image/png') {
        //     die("File harus JPG!");
        // }

        # mulai upload file
        $uploadSrSukses = move_uploaded_file(
            $file_foto->tmp_name,
            "{$folderUpload}/{$file_foto->name}"
        );

        // include database connection file
        include("../koneksi.php");

        // Insert user data into table
        $result = mysqli_query($koneksi, "INSERT INTO testimoni(nama, foto, prodi_angkatan, testimoni) VALUES('$nama','$file_foto->name','$prodi_angkatan', '$testimoni')");

        // Show message when user added
        echo "<script>alert('Pendaftaran Anda Berhasil');</script>";
    }
    ?>

    <?php include("../partials/navbar.php"); ?>

    <a href="index.php" class="btn btn-warning mt-3 ms-3"><i class="fas fa-arrow-left"></i> Back</a>

    <!-- Start Card Testimoni -->
    <div class="container m-auto px-5 py-5 bg-body rounded-5 my-5 shadow-lg">
        <div class="divider-custom mb-5">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon">
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Form Add Testimoni</h2>
            </div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Form Testimoni -->
        <form class="mx-auto" action="add.php" method="post" enctype="multipart/form-data">
            <!-- <div class="alert alert-success" role="alert">
          Form Terkirim !!!
        </div> -->
            <!-- 2 column grid layout with text inputs for the first and last names -->
            <div class="row mb-2">
                <div class="col">
                    <div class="form-outline mb-2">
                        <label class="form-label" for="form6Example1">Nama Lengkap</label>
                        <input type="text" id="form6Example1" class="form-control shadow-sm" name="nama" required />
                    </div>
                </div>

                <!-- Image input -->
                <div class="form-outline mb-2">
                    <label class="form-label" for="form6Example2">Foto</label>
                    <input type="file" id="form6Example2" class="form-control shadow-sm" name="foto" required />
                </div>

                <!-- Prodi input -->
                <div class="form-outline mb-2">
                    <label class="form-label" for="form6Example3">Prodi_angkatan</label>
                    <input type="text" id="form6Example3" class="form-control shadow-sm" name="prodi_angkatan" required />
                </div>

                <!-- Text input -->
                <div class="form-outline mb-3">
                    <label class="form-label" for="form6Example4">Testimoni</label>
                    <textarea type="text" id="form6Example4" class="form-control shadow-sm" name="testimoni" required />
                    </textarea>
                </div>


                <!-- Submit button -->
                <button type="submit" name="Submit" class="btn btn-primary btn-block mb-1 w-100 shadow-lg">
                    Add Testimoni
                </button>
        </form>
        <!-- End form Testimoni -->
    </div>
    <!-- End Card Testimoni -->

</body>

</html>