<?php
if (isset($_POST['submit'])) {
    require_once "koneksi.php";

    $username_user = $_POST['username_user'];
    $password_user = $_POST['password_user'];

    $sql = "SELECT * FROM tabel_user WHERE username_user='$username_user' AND password_user='$password_user'";
    if ($user = $mysqli->query($sql)) {
        $user = $user->fetch_assoc();
        if (!is_null($user)) {
            $_SESSION['nama_user'] = $user['nama_user'];
            $_SESSION['id_user'] = $user['id_user'];
            $_SESSION['status_user'] = $user['status_user'];
            header('Location: index.php');
        } else echo "<script>alert('Username atau Password Salah!');</script>";
    } else echo "Error: " . $sql . "<br>" . $mysqli->error;
}
?>
<main>
    <div class="container">

        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-5 col-xxl-4 col-lg-5 col-md-7 d-flex flex-column align-items-center justify-content-center">

                        <div class="d-flex justify-content-center py-4">
                            <a href="index.html" class="logo d-flex align-items-center w-auto">
                                <!-- <img src="assets/img/logo.png" alt=""> -->
                                <!-- <span class="d-none d-lg-block">NiceAdmin</span> -->
                            </a>
                        </div><!-- End Logo -->

                        <div class="card mb-3">

                            <div class="card-body">

                                <div class="pt-4 pb-2">
                                    <div class="d-flex">
                                        <img src="assets/img/kotabaru.png" width="100" alt="">
                                        <div class="d-flex flex-column">
                                            <h5 class="card-title text-center pb-0 fs-5">Aplikasi Pengarsipan Surat, Inventaris, dan Mutasi Barang</h5>
                                            <p class="text-center">Kecamatan Kelumpang Utara</p>
                                        </div>
                                    </div>
                                    <!-- <h5 class="card-title text-center pb-0 fs-4">Login</h5> -->
                                    <!-- <p class="text-center small">Masukkan username & password</p> -->
                                </div>

                                <form class="row g-3 needs-validation mt-1" novalidate method="POST">

                                    <div class="col-12">
                                        <label for="username_user" class="form-label">Username</label>
                                        <input type="text" autofocus name="username_user" class="form-control" id="username_user" required>
                                        <div class="invalid-feedback">Masukkan username.</div>
                                    </div>

                                    <div class="col-12">
                                        <label for="password_user" class="form-label">Password</label>
                                        <input type="password" name="password_user" class="form-control" id="password_user" required>
                                        <div class="invalid-feedback">Masukkan Password!</div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" name="submit" type="submit">Login</button>
                                    </div>
                                </form>

                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </section>

    </div>
</main><!-- End #main -->