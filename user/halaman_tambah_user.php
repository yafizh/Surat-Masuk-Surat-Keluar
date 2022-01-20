<?php

if (isset($_POST['submit'])) {
    require_once "koneksi.php";
    require_once "utils.php";

    $nama_user = $_POST['nama_user'];
    $username_user = $_POST['username_user'];
    $password_user = $_POST['password_user'];
    $status_user = $_POST['status_user'];

    $sql = "
        INSERT INTO tabel_user (
            nama_user, 
            username_user, 
            password_user, 
            status_user 
        ) VALUES (
            '$nama_user', 
            '$username_user',
            '$password_user', 
            '$status_user' 
        )";

    if ($mysqli->query($sql) === TRUE) echo "<script>alert('User berhasil ditambahkan.')</script>";
    else echo "Error: " . $sql . "<br>" . $mysqli->error;
}

?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Tambah User</h1>
        <!-- <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav> -->
    </div><!-- End Page Title -->
    <br>
    <section class="section dashboard">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">User</h5>

                <!-- General Form Elements -->
                <form class="needs-validation" novalidate action="" method="POST">
                    <div class="row mb-3">
                        <label for="nama_user" class="col-sm-2 col-form-label">Nama User</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_user" name="nama_user" required>
                            <div class="invalid-feedback">
                                Harap isi Nama User.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="username_user" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="username_user" name="username_user" required>
                            <div class="invalid-feedback">
                                Harap isi Username.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="password_user" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="password_user" name="password_user" required>
                            <div class="invalid-feedback">
                                Harap isi Password.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="status_user" class="col-sm-2 col-form-label">Status User</label>
                        <div class="col-sm-10">
                            <select class="form-select" name="status_user" required>
                                <option value="ADMIN">Admin</option>
                                <option value="PETUGAS">Petugas</option>
                            </select>
                            <div class="invalid-feedback">
                                Harap isi Status User.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12 justify-content-end d-flex">
                            <button type="submit" name="submit" class="btn btn-primary">Tambah User</button>
                        </div>
                    </div>

                </form><!-- End General Form Elements -->

            </div>
        </div>
    </section>

</main><!-- End #main -->