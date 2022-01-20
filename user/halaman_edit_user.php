<?php

if (isset($_GET['id_user'])) {
    require_once "koneksi.php";
    require_once "utils.php";

    $sql = "SELECT * FROM tabel_user WHERE id_user=" . $_GET['id_user'];
    $result = $mysqli->query($sql);
    $row = $result->fetch_assoc();
} else
    echo "<script>" .
        "window.location.href='index.php?page=user&item=tampil_user';" .
        "</script>";

if (isset($_POST['submit'])) {
    $nama_user = $_POST['nama_user'];
    $username_user = $_POST['username_user'];
    $password_user = $_POST['password_user'];
    $status_user = $_POST['status_user'];

    $sql = "UPDATE tabel_user 
            SET 
                nama_user='$nama_user', 
                username_user='$username_user', 
                password_user='$password_user',  
                status_user='$status_user'  
            WHERE 
                id_user=" . $_GET['id_user'];

    if ($mysqli->query($sql) === TRUE) {
        echo "<script>alert('User berhasil diedit.')</script>";
        echo "<script>" .
            "window.location.href='index.php?page=user&item=tampil_user';" .
            "</script>";
    } else echo "Error: " . $sql . "<br>" . $mysqli->error;
}

?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Edit User</h1>
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
                <form class="needs-validation" novalidate action="" method="POST" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <label for="nama_user" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_user" name="nama_user" required value="<?= $row['nama_user']; ?>">
                            <div class="invalid-feedback">
                                Harap isi Nama User.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="username_user" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="username_user" name="username_user" required value="<?= $row['username_user']; ?>">
                            <div class="invalid-feedback">
                                Harap isi Username.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="password_user" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="password_user" name="password_user" required value="<?= $row['password_user']; ?>">
                            <div class="invalid-feedback">
                                Harap isi Password.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="status_user" class="col-sm-2 col-form-label">Status User</label>
                        <div class="col-sm-10">
                            <select class="form-select" name="status_user" required>
                                <option <?= $row['status_user'] == 'ADMIN' ? 'selected' : ''; ?> value="ADMIN">Admin</option>
                                <option <?= $row['status_user'] == 'PETUGAS' ? 'selected' : ''; ?> value="PETUGAS">Petugas</option>
                            </select>
                            <div class="invalid-feedback">
                                Harap isi Status User.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12 justify-content-end d-flex">
                            <button type="submit" name="submit" class="btn btn-primary">Edit Surat</button>
                        </div>
                    </div>
                </form><!-- End General Form Elements -->
            </div>
        </div>
    </section>

</main><!-- End #main -->