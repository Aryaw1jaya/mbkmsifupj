<?php

if ($_SESSION['level'] == "lecturer") {
    echo '<nav class="navbar navbar-expand-lg bg-dark">
            <div class="container">
                <a class="navbar-brand text-light" href="#">MBKM SIF UPJ</a>
                <button class="navbar-toggler text-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon text-light"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav ">
                        <li class="nav-item ">
                            <a class="nav-link active text-light" aria-current="page" href="../lecturer/index.php">Home</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link text-light" href="../manage-pendaftar/index.php">List Pendaftar</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link text-light" href="../manage-testimoni/index.php">List testimoni</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-light float-end" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Account
                            </a>
                            <ul class="dropdown-menu">
                                <!-- <li><a class="dropdown-item " href="#">Action</a></li> -->
                                <li><a class="dropdown-item " href="#">Change Password</a></li>
                                <li><a class="dropdown-item " href="../logout.php">Log Out</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>';
} elseif ($_SESSION['level'] == "student") {
    echo '<nav class="navbar navbar-expand-lg bg-dark">
            <div class="container">
                <a class="navbar-brand text-light" href="#">MBKM SIF UPJ</a>
                <button class="navbar-toggler text-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon text-light"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav ">
                        <li class="nav-item ">
                            <a class="nav-link active text-light" aria-current="page" href="../student/index.php">Home</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link text-light" href="../pendaftaran/registrasi.php">Pendaftaran MBKM</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-light float-end" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Account
                            </a>
                            <ul class="dropdown-menu">
                                <!-- <li><a class="dropdown-item " href="#">Action</a></li> -->
                                <li><a class="dropdown-item " href="#">Change Password</a></li>
                                <li><a class="dropdown-item " href="../logout.php">Log Out</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>';
} elseif ($_SESSION['level'] == "admin") {
    echo '<nav class="navbar navbar-expand-lg bg-dark">
            <div class="container">
                <a class="navbar-brand text-light" href="#">MBKM SIF UPJ</a>
                <button class="navbar-toggler text-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon text-light"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav ">
                        <li class="nav-item ">
                            <a class="nav-link active text-light" aria-current="page" href="../admin/index.php">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-light float-end" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Manage
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="../manage-user/index.php">Manage User</a></li>
                                <!-- <li><a class="dropdown-item" href="../manage-pendaftar/index.php">Manage Pendaftar</a></li> -->
                                <li><a class="dropdown-item" href="../manage-program/index.php">Manage Program</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-light float-end" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Account
                            </a>
                            <ul class="dropdown-menu">
                                <!-- <li><a class="dropdown-item " href="#">Action</a></li> -->
                                <li><a class="dropdown-item " href="#">Change Password</a></li>
                                <li><a class="dropdown-item " href="../logout.php">Log Out</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>';
}
