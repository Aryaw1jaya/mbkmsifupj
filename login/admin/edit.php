<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Edit User Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css" />
    <link rel="stylesheet" href="../style/style.css" />
    <?php include("../koneksi.php");

    // Fetech user data based on id
    $result = mysqli_query($koneksi, "SELECT * FROM home WHERE id_home=1");

    while ($user_data = mysqli_fetch_array($result)) {
        $heading = $user_data['heading'];
        $summary = $user_data['summary'];
        $nama_pj = $user_data['nama_penanggungjawab'];
        $no_pj = $user_data['no_penanggungjawab'];
    }
    ?>
</head>

<body>
    <a href="index.php" class="btn btn-warning mt-3 ms-3"><i class="fas fa-arrow-left"></i> Kembali</a>
    <br /><br />

    <!-- Start Card Testimoni -->
    <div class="container m-auto px-5 py-4 bg-body rounded-5 my-1 shadow-lg">
        <div class="divider-custom mb-4">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon">
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Form Edit Home</h2>
            </div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Form Testimoni -->
        <form class="mx-auto" name="update_user" method="post" action="edit.php">

            <!-- 2 column grid layout with text inputs for the first and last names -->
            <div class="row mb-2">
                <div class="col mb-2">
                    <div class="form-outline">
                        <label class="form-label" for="form6Example1">Image</label>
                        <input class="form-control" type="file" name="img">
                    </div>
                </div>

                <div class="col">
                    <div class="form-outline">
                        <label class="form-label" for="form6Example2">Header</label>
                        <input class="form-control" type="text" name="heading" value="<?php echo $heading ?>">
                    </div>
                </div>

                <!-- Image input -->
                <div class="form-outline mb-2">
                    <label class="form-label" for="form6Example3">Summary</label>
                    <textarea class="form-control" type="text" name="summary" style="height: 200px;"><?php echo $summary ?></textarea>
                </div>

                <!-- Prodi input -->
                <div class="form-outline mb-2">
                    <label class="form-label" for="form6Example4">Nama Penanggung Jawab</label>
                    <input class="form-control" type="text" name="nama_penanggungjawab" value="<?php echo $nama_pj ?>">
                </div>

                <!-- Text input -->
                <div class="form-outline mb-3">
                    <label class="form-label" for="form6Example5">Nomor Penanggung Jawab</label>
                    <input class="form-control" type="text" name="no_penanggungjawab" value="<?php echo $no_pj ?>">
                </div>

                <!-- Submit button -->
                <input class="btn btn-primary btn-block mt-2 w-100 shadow-lg" type="submit" name="update" value="Update">
        </form>
        <!-- End form Testimoni -->
    </div>
    <!-- End Card Testimoni -->


    <?php
    // Check if form is submitted for user update, then redirect to homepage after update
    if (isset($_POST['update'])) {
        $heading = $_POST['heading'];
        $summary = $_POST['summary'];
        $nama_pj = $_POST['nama_penanggungjawab'];
        $no_pj = $_POST['no_penanggungjawab'];

        // update user data
        $result2 = mysqli_query($koneksi, "UPDATE home SET heading='$heading', summary='$summary', nama_penanggungjawab='$nama_pj', no_penanggungjawab='$no_pj' WHERE id_home=1");

        // Redirect to homepage to display updated user in list
        header("Location: index.php");
    }
    ?>
</body>

</html>