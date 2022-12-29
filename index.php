<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>MBKM SIF UPJ</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css" />
  <link rel="stylesheet" href="./style.css" />
  <link rel="stylesheet" href="./testimonial.css" />
</head>

<body>
  <!-- Start of Navbar -->
  <?php include('partials/navbar.php'); ?>
  <!-- End of Navbar -->

  <!-- Start Hero Section -->
  <section class="container" style="margin-top: 150px;" id="hero">
    <div class="row">
      <div class="col-md-6">
        <img class="img-fluid rounded-4" src="https://images.unsplash.com/photo-1515879218367-8466d910aaa4?ixlib=rb-0.3.5&q=85&fm=jpg&crop=entropy&cs=srgb&ixid=eyJhcHBfaWQiOjE0NTg5fQ&s=f6812c92d213124d45a1719e3d2d39ba"></img>
      </div>
      <div class="col-md-6 text-end pt-5 px-4">
        <h2 class="block fw-bold">Merdeka Belajar Kampus Merdeka</h2>
        <p>Sistem Informasi khususnya di Universitas Pembangunan Jaya telah berusaha terus bersinergi dalam mempersiapkan lulusan yang siap terjun di dalam dunia kerja, khususnya di bidang Sistem Informasi.</p>
        <p>Untuk itu Program Merdeka Belajar yang merupakan bagian dari kebijakan Merdeka Belajar oleh Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi Republik Indonesia yang memberikan kesempaatan bagi mahasiswa/i untuk mengasah kemampuan sesuai bakat dan minat dengan terjun langsung ke dunia kerja sebagai persiapan karier masa depan.</p>
        <a class="btn btn-outline-primary" href="registrasi.php"><i class="far fa-paper-plane"></i> Daftarkan Dirimu</a>
        <a class="btn btn-dark button-home" href="#program-mbkm"><i class="far fa-clone"></i> Telusuri lebih lanjut</a>
      </div>
    </div>
  </section>
  <!-- End of Hero Section -->

  <!-- Start of program mbkm -->
  <section class="page-section program-mbkm container" id="program-mbkm">
    <div class="container">
      <!-- program-mbkm Section Heading-->
      <div class="divider-custom mb-5">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Program MBKM</h2>
        </div>
        <div class="divider-custom-line"></div>
      </div>
      <!-- program-mbkm Grid Items-->
      <div class="row justify-content-center">
        <?php
        // Create database connection using config file
        include_once("./login/koneksi.php");
        // Fetch all users data from database
        $result = mysqli_query($koneksi, "SELECT * FROM program ORDER BY id ASC");
        ?>
        <?php
        while ($testi_data = mysqli_fetch_array($result)) {
          echo '
        <div class="col-md-6 col-lg-3 mb-3">
        <div class="program-mbkm-item mx-auto" data-bs-toggle="modal" data-bs-target="#program-mbkmModal' . $testi_data['id'] . '">
          <div class="program-mbkm-item-caption d-flex align-items-center justify-content-center h-100 w-100">
            <div class="program-mbkm-item-caption-content text-center text-white">' . $testi_data['nama_program'] . '</div>
          </div>
          <img class="img-fluid" src="./login/img/program/' . $testi_data['images'] . '" alt="images program">
        </div>
      </div>';
        }
        ?>
        <!--End Portofolio-->
      </div>
    </div>
  </section>
  <!-- End of 8 Program mbkm -->

  <!-- Start of Testimoni -->
  <section class="page-section container mb-5" id="testimoni" style="margin-top: -2%;">
    <div class="container">
      <!-- program-mbkm Section Heading-->
      <div class="divider-custom mb-5">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Testimoni</h2>
        </div>
        <div class="divider-custom-line"></div>
      </div>
      <!-- Grid Testimoni -->
    </div>
    <div class="container d-flex align-items-center justify-content-center flex-wrap">
      <?php
      // Create database connection using config file
      include_once("./login/koneksi.php");
      // Fetch all users data from database
      $result = mysqli_query($koneksi, "SELECT * FROM testimoni ORDER BY id ASC");
      ?>
      <?php
      while ($testi_data = mysqli_fetch_array($result)) {
        echo '
          <div class="box">
            <div class="body">
              <div class="imgContainer">
                <img src="./login/img/testimoni/' . $testi_data['foto'] . '" alt="foto_mhs">
              </div>
              <div class="content d-flex flex-column align-items-center justify-content-center">
                <div>
                  <h3 class="text-white fs-5">' . $testi_data['nama'] . '(' . $testi_data['prodi_angkatan'] . ')</h3>
                  <p class="fs-6 text-white">' . $testi_data['testimoni'] . '</p>
                </div>
              </div>
            </div>
          </div>';
      }
      ?>
    </div>
  </section>
  <!-- End of Testimoni -->

  <!-- Start of footer -->
  <?php include('partials/footer.php'); ?>
  <!-- End of footer -->

  <?php
  // Create database connection using config file
  include_once("./login/koneksi.php");
  // Fetch all users data from database
  $result = mysqli_query($koneksi, "SELECT * FROM program ORDER BY id ASC");
  ?>
  <?php
  while ($testi_data = mysqli_fetch_array($result)) {
    echo '
      <div class="program-mbkm-modal modal fade" id="program-mbkmModal' . $testi_data['id'] . '" tabindex="-1" aria-labelledby="program-mbkmModal' . $testi_data['id'] . '" aria-hidden="true">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
            <div class="modal-body text-center pb-5">
              <div class="container">
                <div class="row justify-content-center">
                  <div class="col-lg-8">
                    <!-- program-mbkm Modal - Title-->
                    <h2 class="program-mbkm-modal-title text-secondary text-uppercase mb-0">' . $testi_data['nama_program'] . '</h2>
                    <br>
                    <!-- program-mbkm Modal - Image-->
                    <img class="img-fluid rounded mb-5" src="./login/img/program/' . $testi_data['images'] . '" alt="images program"/>
                    <!-- program-mbkm Modal - Text-->
                    <p class="mb-4">
                    ' . $testi_data['deskripsi'] . '</p>
                    <a href="registrasi.php" style="color: white">
                      <button class="btn btn-primary">
                        <i class="fas fa-paper-plane"></i>
                        Daftar Program
                      </button>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>';
  }
  ?>

  <!-- partial -->

  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="./script.js"></script>
</body>

</html>