<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./style/login.css">
  <title>Login</title>
  <style>
    @media only screen and (max-width: 800px) {
      .leftPanel {
        display: none;
      }

      .rightPanel {
        width: 100%;
      }

      .loginForm {
        padding-top: 5px;
        width: 75%;
        height: 300px;
      }
    }

    @media screen and (min-width: 1900px) {
      .txtInput {
        margin-bottom: 20px;
      }

      .loginForm {
        height: 40%;
      }

      .btnLogin {
        height: 50px;
      }
    }
  </style>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css" />
  <link rel="stylesheet" href="../style.css" />
</head>

<body>
  <?php
  if (isset($_GET['pesan'])) {
    if ($_GET['pesan'] == "gagal") {
      echo "<script>alert('Login gagal! username dan password salah!');</script>";
    }
  }
  ?>
  <header>
    <nav class="navbar navbar-expand-custom navbar-mainbg fixed-top">
      <a class="navbar-brand navbar-logo" href="#">MBKM SIF UPJ</a>
      <button class="navbar-toggler" type="button" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars text-white"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <div class="hori-selector">
            <div class="left"></div>
            <div class="right"></div>
          </div>
          <li id="itemActive" class="nav-item">
            <a class="nav-link" href="../index.php"><i class="fas fa-tachometer-alt"></i>Beranda</a>
          </li>
          <li id="itemActive" class="nav-item">
            <a class="nav-link" href="../manfaat.php"><i class="fas fa-plus"></i>Manfaat</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../registrasi.php"><i class="far fa-address-book"></i>Pendaftaran</a>
          </li>
          <li id="itemActive" class="nav-item">
            <a class="nav-link" href="../faq.php"><i class="fas fa-comment"></i>FAQ</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="index.php"><i class="far fa-user"></i>Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://www.sif.upj.ac.id/"><i class="fa fa-search"></i>Tentang Sif UPJ</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <section>
    <div class="leftPanel">
      <h1 class="welcomeTxt">WELCOME</h1>
      <img class="authSideImg" src="https://raw.githubusercontent.com/geethakash/modern-login-page/80b336d976722c2d61f3ee1c6fa21ca73d25ab1f/img/login-authentication.svg" alt="Login Authentication">
      <div class="custom-shape-divider-bottom-1629894577">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
          <path d="M741,116.23C291,117.43,0,27.57,0,6V120H1200V6C1200,27.93,1186.4,119.83,741,116.23Z" class="shape-fill"></path>
        </svg>
      </div>
    </div>
    <div class="rightPanel">
      <form class="loginForm" action="cek_login.php" method="post">
        <h2 class="loginFormH2">Log In</h2>
        <input type="text" name="username" class="txtInput" placeholder="Username .." required="required">
        <input type="password" name="password" class="txtInput" placeholder="Password .." required="required">
        <br>
        <!-- <a href="#" class="forgotlink">Forgot Password?</a> -->
        <input type="submit" class="btn btn-outline-primary w-75 text-light" value="LOGIN">
      </form>
      <!-- <p class="haveacclbl">Need an account? <a href="#" class="reglink">Register</a></p> -->
    </div>
  </section>

  <!-- Partials -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../script.js"></script>
</body>

</html>