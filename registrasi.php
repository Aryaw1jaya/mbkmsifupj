<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Registrasi</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css" />
  <link rel="stylesheet" href="registrasi.css" />
  <link rel="stylesheet" href="style.css" />
  <style>
    @media (min-width: 500px) {
      form {
        width: 75%;
      }
    }

    @media (max-width: 992px) {
      form {
        width: 100%;
      }
    }
  </style>
</head>

<body class="pt-5">
  <!-- Start of Navbar -->
  <?php include('partials/navbar.php'); ?>
  <!-- End of Navbar -->

  <!-- Start Step Registrasi -->
  <div class="container my-5 pt-4 mb-5 d-flex flex-column justify-content-center">
    <h3 class="fw-bolder text-center mt-4">Tata Cara Daftar MBKM</h3>
    <hr class="mb-4 w-75 mx-auto" />

    <div class="card w-75 mx-auto mb-3 shadow">
      <div class="row g-2">
        <div class="col-md-4">
          <img src="https://img.freepik.com/free-vector/download-concept-illustration_114360-2857.jpg" class="img-fluid rounded-start" alt="download Document" />
        </div>
        <div class="col-md-8">
          <div class="card-body p-5">
            <h5 class="card-title fw-bolder fw-bolder">Download Document</h5>
            <p class="card-text">
              Kamu bisa mendownload Dokumen yang diperlukan untuk pendaftaran
              MBKM, yaitu Surat Rekomendasi dari Prodi dan Surat Pernyataan
              Tanggung Jawab (SPTJM) untuk Magang & Studi Independen.
            </p>
            <hr />
            <p class="card-text">
              <small class="text-muted">Silahkan Download pada Link Berikut</small>
              <br />
              <a href="http://ringkas.kemdikbud.go.id/SrtRekomendasiMSIB4"><button class="btn btn-info shadow">
                  Surat Rekomendasi MSIB
                </button></a>
              <a href="http://ringkas.kemdikbud.go.id/SPJTMMSIB4"><button class="btn btn-info shadow">
                  SPTJM MSIB
                </button></a>
            </p>
            <small class="text-muted">*untuk program MBKM lainnya silahkan hubungi dosen terkait</small>
          </div>
        </div>
      </div>
    </div>

    <div class="card w-75 mx-auto mb-3 shadow">
      <div class="row g-2">
        <div class="col-md-8">
          <div class="card-body p-5">
            <h5 class="card-title fw-bolder">Fill and Complete Documents</h5>
            <p class="card-text">
              Isi dan Lengkapi data yang tertera pada dokumen-dokumen diatas,
              dan jangan lupa untuk di Tanda Tangan.
            </p>
            <hr />
            <p class="card-text">
              <small class="text-muted">*Jika ada pertanyaan mengenai pengisian form silahkan hubungi
                dosen pembimbing masing-masing.</small>
            </p>
          </div>
        </div>
        <div class="col-md-4">
          <img src="https://img.freepik.com/free-vector/checklist-concept-illustration_114360-479.jpg" class="img-fluid rounded-start" alt="Isi Document" />
        </div>
      </div>
    </div>

    <div class="card w-75 mx-auto mb-3 shadow">
      <div class="row g-2">
        <div class="col-md-4">
          <img src="https://img.freepik.com/free-vector/mobile-login-concept-illustration_114360-83.jpg" class="img-fluid rounded-start" alt="lOGIN" />
        </div>
        <div class="col-md-8">
          <div class="card-body p-5">
            <h5 class="card-title fw-bolder">Login</h5>
            <p class="card-text">
              Silahkan Login pada web ini sebagai Mahasiswa untuk melakukan
              pendaftaran pada form pendaftaran yang disediakan.
            </p>
            <hr />
            <p class="card-text">
              <small class="text-muted"><a href="login/"><button class="btn btn-info shadow">
                    Login Disini
                  </button></a></small>
            </p>
          </div>
        </div>
      </div>
    </div>

    <div class="card w-75 mx-auto mb-3 shadow">
      <div class="row g-2">
        <div class="col-md-8">
          <div class="card-body p-5">
            <h5 class="card-title fw-bolder">Registration Form</h5>
            <p class="card-text">
              Setelah Login silahkan isi dan lengkapi Form pendaftaran yang
              ada pada halaman registrasi. Dan cantumkan Dokumen Surat
              Rekomendasi dan Surat Pernyataan Tanggung Jawab pada form
              pendaftaran.
              Jika Sudah Berhasil, Silahkan Menunggu persetujuan Dosen
            </p>
            <hr />
            <p class="card-text">
              <small class="text-muted">*Tidak perlu mencantumkan Surat rekomendasi & SPTJM untuk Program MBKM diluar Magang & Studi Independen</small>
            </p>
          </div>
        </div>
        <div class="col-md-4">
          <img src="https://img.freepik.com/free-vector/forms-concept-illustration_114360-4947.jpg" class="img-fluid rounded-start" alt="Isi Form" />
        </div>
      </div>
    </div>

    <div class="card w-75 mx-auto mb-3 shadow">
      <div class="row g-2">
        <div class="col-md-4">
          <img src="https://img.freepik.com/free-vector/emails-concept-illustration_114360-1217.jpg" class="img-fluid rounded-start" alt="cheking" />
        </div>
        <div class="col-md-8">
          <div class="card-body p-5">
            <h5 class="card-title fw-bolder">Document Checking</h5>
            <p class="card-text">
              Data dan Dokumen yang sudah mendaftar pada Form Pendaftaran akan
              diperiksa dan cek apakah sudah sesuai atau belum. Jika belum
              sesuai kamu akan mendapatkan email untuk kekurangan data yang
              diperlukan.
            </p>
            <!-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
          </div>
        </div>
      </div>
    </div>

    <div class="card w-75 mx-auto mb-3 shadow">
      <div class="row g-2">
        <div class="col-md-8">
          <div class="card-body p-5">
            <h5 class="card-title fw-bolder">Approved</h5>
            <p class="card-text">
              Jika Data dan Dokumen yang di input sudah lengkap dan sesuai,
              maka dosen akan memverifikasi pendaftaranmu dan kamu juga akan
              mendapatkan email bahwa kamu sudah bisa menjalankan program
              MBKM.
            </p>
            <!-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
          </div>
        </div>
        <div class="col-md-4">
          <img src="https://img.freepik.com/free-vector/product-quality-concept-illustration_114360-7301.jpg" class="img-fluid rounded-start" alt="Approved" />
        </div>
      </div>
    </div>
  </div>
  <!-- End Step Registrasi -->

  <?php include('partials/footer.php'); ?>

  <!-- partial -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="./script.js"></script>
</body>

</html>