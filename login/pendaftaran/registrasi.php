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
    header("location:../index.php");
  } else if ($_SESSION['level'] != "student") {
    echo "<script>alert('Anda Bukan Mahasiswa. Silahkan login lagi!');</script>";
    header("location:../index.php");
  }

  ?>

  <?php
  if (isset($_POST['Submit'])) {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $program = $_POST['program'];
    $semester = $_POST['semester'];
    $no_hp = $_POST['no_hp'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    // $surat_rekomendasi = $_FILES['surat_rekomendasi'];
    // $sptjm = $_FILES['sptjm'];

    $folderUpload = "../document";
    # periksa apakah folder tersedia
    if (!is_dir($folderUpload)) {
      # jika tidak maka folder harus dibuat terlebih dahulu
      mkdir($folderUpload, 0777, $rekursif = true);
    }
    # simpan masing-masing file ke dalam array 
    # dan casting menjadi objek :)
    $file_surat_rekomendasi = (object) @$_FILES['surat_rekomendasi'];
    $file_sptjm = (object) @$_FILES['sptjm'];

    // if ($file_surat_rekomendasi->size > 1000 * 2000) {
    //   die("File tidak boleh lebih dari 1MB");
    // }

    // if ($file_sptjm->type !== 'pdf') {
    //   die("File harus PDF!");
    // }

    # mulai upload file
    $uploadSrSukses = move_uploaded_file(
      $file_surat_rekomendasi->tmp_name,
      "{$folderUpload}/{$file_surat_rekomendasi->name}"
    );

    $uploadSptjmSukses = move_uploaded_file(
      $file_sptjm->tmp_name,
      "{$folderUpload}/{$file_sptjm->name}"
    );

    // if ($uploadSrSukses) {
    //   $link = "{$folderUpload}/{$file_surat_rekomendasi->name}";
    //   echo "Sukses Upload Foto: <a href='{$link}'>{$file_surat_rekomendasi->name}</a>";
    //   echo "<br>";
    // }

    // if ($uploadSptjmSukses) {
    //   $link = "{$folderUpload}/{$file_sptjm->name}";
    //   echo "Sukses Upload KTP: <a href='{$link}'>{$file_sptjm->name}</a>";
    //   echo "<br>";
    // }

    // include database connection file
    include("../koneksi.php");

    // Insert user data into table
    $result = mysqli_query($koneksi, "INSERT INTO registrasi(nama, nim, program, semester, no_hp, email, alamat, surat_rekomendasi, sptjm, status) VALUES('$nama','$nim','$program', '$semester', '$no_hp', '$email', '$alamat', ' $file_surat_rekomendasi->name', '$file_sptjm->name', 'Belum Diverifikasi')");

    // Show message when user added
    echo "<script>alert('Pendaftaran Anda Berhasil');</script>";
  }
  ?>

  <!-- Navigation -->
  <?php include("../partials/navbar.php"); ?>


  <!-- Start Card Registrasi -->
  <div class="container m-auto px-5 py-5 bg-body rounded-5 my-5 shadow-lg">
    <div class="divider-custom mb-5">
      <div class="divider-custom-line"></div>
      <div class="divider-custom-icon">
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Form Pendaftaran</h2>
      </div>
      <div class="divider-custom-line"></div>
    </div>
    <!-- Form Registrasi -->
    <form class="mx-auto" action="registrasi.php" method="post" enctype="multipart/form-data">
      <!-- <div class="alert alert-success" role="alert">
          Form Terkirim !!!
        </div> -->
      <!-- 2 column grid layout with text inputs for the first and last names -->
      <div class="row mb-2">
        <div class="col">
          <div class="form-outline">
            <label class="form-label" for="form6Example1">Nama Lengkap</label>
            <input type="text" id="form6Example1" class="form-control shadow-sm" name="nama" />
          </div>
        </div>
        <div class="col">
          <div class="form-outline">
            <label class="form-label" for="form6Example2">NIM</label>
            <input type="number" disabled id="form6Example2" class="form-control shadow-sm" name="nim" value="<?php echo $_SESSION['username']; ?>" />
          </div>
        </div>
      </div>

      <!-- Text input -->
      <div class="form-outline mb-2">
        <label class="form-label" for="form6Example3">Program MBKM</label>
        <select class="form-select shadow-sm" id="inputGroupSelect01" name="program">
          <option value="Studi Independen">Studi Independen</option>
          <option value="Magang">Magang</option>
          <option value="Pertukaran Mahasiswa">Pertukaran Mahasiswa</option>
          <option value="Proyek Kemanusiaan">Proyek Kemanusiaan</option>
          <option value="Kegiatan Wirausaha">Kegiatan Wirausaha</option>
          <option value="Asistensi Mengajar">Asistensi Mengajar</option>
          <option value="Penelitian/Riset">Penelitian/Riset</option>
          <option value="Membangun Desa/KKN">Membangun Desa/KKN</option>
        </select>
      </div>

      <!-- 2 column grid layout with text inputs for the first and last names -->
      <div class="row mb-2">
        <div class="col">
          <div class="form-outline">
            <label class="form-label" for="form6Example1">Semester</label>
            <select class="form-select shadow-sm" id="inputGroupSelect01" name="semester">
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
            </select>
          </div>
        </div>
        <div class="col">
          <div class="form-outline">
            <label class="form-label" for="form6Example2">No. HP</label>
            <input type="number" id="form6Example2" class="form-control shadow-sm" name="no_hp" />
          </div>
        </div>
      </div>

      <!-- Email input -->
      <div class="form-outline mb-2">
        <label class="form-label" for="form6Example5">Email</label>
        <input type="email" id="form6Example5" class="form-control shadow-sm" name="email" />
      </div>

      <!-- Text input -->
      <div class="form-outline mb-3">
        <label class="form-label" for="form6Example4">Alamat</label>
        <input type="text" id="form6Example4" class="form-control shadow-sm" name="alamat" />
      </div>

      <!-- Text input -->
      <div class="form-outline mb-2">
        <label class="form-label" for="form6Example4">Surat Rekomendasi Prodi</label>
        <input type="file" id="form6Example4" class="form-control shadow-sm" name="surat_rekomendasi" />
      </div>

      <!-- Text input -->
      <div class="form-outline mb-4">
        <label class="form-label" for="form6Example4">Surat Pernyataan Tanggung Jawab</label>
        <input type="file" id="form6Example4" class="form-control shadow-sm" name="sptjm" />
      </div>

      <!-- Submit button -->
      <button type="submit" name="Submit" class="btn btn-primary btn-block mb-1 w-100 shadow-lg">
        Mendaftar
      </button>
    </form>
    <!-- End form registrasi -->
  </div>
  <!-- End Card Registrasi -->

</body>

</html>