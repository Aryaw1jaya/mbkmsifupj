<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Frequently Ask Questions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./style.css" />
</head>

<?php
include('./login/koneksi.php');

$phone = mysqli_query($koneksi, "SELECT no_penanggungjawab FROM home where id_home = 1");
$phone = mysqli_fetch_column($phone);
?>

<body>
    <?php include './partials/navbar.php'; ?>
    <div class="my-5 py-5">
        <section class="container my-5" id="faq">
            <h3 class="fw-bolder text-center mt-4">Frequently Ask Questions</h3>
            <hr>
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <strong> Apa itu Kampus Merdeka ?</strong>
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Kampus Merdeka adalah kebijakan yang dikeluarkan oleh Kemendikbudristek dengan memberikan hak kepada Mahasiswa untuk mengambil mata kuliah di luar program studi selama 1 semester dan berkegiatan di luar perguruan tinggi selama 2 semester. Perguruan tinggi diberikan kebebasan untuk menyediakan kegiatan Kampus Merdeka yang sesuai dengan kebutuhan dan minat mahasiswanya.
                            <br><br>
                            Berikut jenis kegiatan yang tersedia di program Kampus Merdeka, yaitu: <br>

                            Magang Bersertifikat <br>
                            Studi Independen <br>
                            Kampus Mengajar <br>
                            Indonesian International Student Mobility Awards (IISMA) <br>
                            Pertukaran Mahasiswa Merdeka <br>
                            Membangun Desa (KKN Tematik) <br>
                            Proyek Kemanusiaan <br>
                            Riset atau Penelitian <br>
                            Wirausaha <br>
                            <br>
                            Pengalaman Mahasiswa di kegiatan Kampus Merdeka akan berpengaruh besar terhadap kesiapan karir mahasiswa dengan cara memastikan Mahasiswa terus menyimak perubahan dunia luar kampus selama berkuliah dan dapat kesempatan untuk menerapkan ilmu kepada masalah di dunia nyata.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <strong>Syarat & Ketentuan Pendaftaran Mahasiswa Magang & Studi Independen Bersertifikat (MSIB) </strong>
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            1. Mahasiswa aktif dan terdaftar di Pangkalan Data Pendidikan Tinggi (PDDIKTI) atau yang belum dinyatakan lulus dari program studi terakreditasi dari seluruh Perguruan Tinggi Negeri (PTN) dan Perguruan Tinggi Swasta (PTS) di bawah naungan Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi (Kemdikbudristek).<br>
                            <br>
                            2. Mahasiswa aktif pada jenjang D2/D3/D4/S1 dengan ketentuan semester sebagai berikut pada saat program MSIB dimulai:<br>
                            D2: minimal semester 3 <br>
                            D3: minimal semester 4 <br>
                            D4 dan S1: minimal semester 5 <br>
                            <br>
                            3. Mahasiswa berstatus aktif atau belum yudisium selama program MSIB berjalan.
                            <br>
                            <br>
                            4. Data Mahasiswa terdaftar di PDDIKTI dan data sudah sesuai dengan nama di KTP Mahasiswa.


                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            <strong>Bagaimana Cara Pendaftaran Kampus Merdeka ?</strong>
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Kamu bisa mendapatkan SPTJM dan Surat Rekomendasi dari prodi untuk keperluan dokumen Kampus Merdeka <a href="./registrasi.php">Disini</a>.
                            Jika sudah, jangan lupa untuk login ke website ini dan isi data pendaftaran Kampus Merdeka, agar dapat diproses oleh prodi.
                            <br>
                            <br>
                            <strong>Silahkan Masuk ke <a href="https://kampusmerdeka.kemdikbud.go.id/">website Kampus merdeka</a>, Daftar dan login akun dengan data-data Mahasiswa.</strong>
                            <br>
                            Cari Program yang ingin diikuti, lalu klik tombol Daftar. Kumpulkan berkas yang diperlukan dan upload ke dalam sistem. <br>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <a href="https://api.whatsapp.com/send?phone=<?php echo $phone ?>">
            <button class="btn btn-success rounded-pill me-3 p-2 float-end" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                <i class="fa fa-whatsapp"></i>
                Whatsapp
            </button>
        </a>
    </div>

    <?php include './login/partials/footer.php'; ?>

    <!-- partial -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="./script.js"></script>
</body>

</html>