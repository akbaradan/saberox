<?php
session_start(); //inisialisasi session
if (!isset($_SESSION['username'])) {
  header('Location: ../login_mhs.php');
}
require_once('../db_connect.php');
?>

<?php


$email = $_SESSION['username'];



$query = 'SELECT * FROM mahasiswa WHERE email_mhs="' . $email . '"';

$result = $koneksi->query($query);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $nama = $row['nama_mhs'];
    $status = $row['status_mhs'];
    $nim = $row['NIM'];
    $angkatan = $row['angkatan'];
    $alamat = $row['alamat_mhs'];
    $phone = $row['no_hp_mhs'];
    $email = $row['email_mhs'];
    $jalur = $row['jalur_masuk'];
  }
}
?>

<?php
if ($_POST) {
  $nama = $_POST['nama'];
  $status = $_POST['status'];
  $nim = $_POST['nim'];
  $angkatan = $_POST['angkatan'];
  $alamat = $_POST['alamat'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $jalur = $_POST['jalur'];

  $query = "UPDATE mahasiswa SET nama_mhs = '$nama', status_mhs = '$status', NIM = '$nim', angkatan = '$angkatan',
            alamat_mhs = '$alamat', no_hp_mhs = '$phone', email_mhs = '$email', jalur_masuk = '$jalur' WHERE NIM = '$nim'";
  $result = $d->query($query);
  if (!$result) {
    die("Could not query the database: <br>" . $koneksi->error . "<br>Query: " . $query);
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>AAA SIAP</title>
  <!-- bootstrap 5 css -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css" integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous" />
  <!-- custom css -->
  <style>
    * {
      margin: 0;
    }

    body {
      min-height: 100vh;
      background-color: #fff;
    }

    .navbar {
      width: 250px;
      height: 100vh;
      position: fixed;
      margin-left: -300px;
      background-color: #ff3273;
      transition: 0.4s;
    }

    .nav-link {
      font-size: 1.25em;
    }

    .nav-link:active,
    .nav-link:focus,
    .nav-link:hover {
      background-color: #07a6e0;
    }

    .my-container {
      transition: 0.4s;
    }

    /* for navbar */

    .active-nav {
      margin-left: 0;
    }

    h3 {
      padding-top: 5px;
      font-size: 15px;
      color: rgb(255, 255, 255);
    }

    .h3 {
      color: black;
    }

    /* for main section */

    .active-cont {
      margin-left: 250px;
    }

    #menu-btn {
      background-color: #ff3273;
      color: #fff;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand d-flex flex-column align-item-start" id="sidebar">
    <div class="text-center">
      <?php
      if (isset($_GET['email_mhs'])) {
        $email = $_GET['email_mhs'];
      }
      $res = mysqli_query($koneksi, "SELECT nama_mhs FROM mahasiswa WHERE email_mhs = '$email'");
      $hasil = mysqli_fetch_array($res); ?>
      <img src="foto.jpg" alt="foto" width="150px" class="rounded-circle" />
      <h3 class="font-weight-light">
        <?php echo $hasil['nama_mhs'] ?>
        <br />Mahasiswa
      </h3>
    </div>
    <ul class="navbar-nav d-flex flex-column mt-3 w-100 text-center font-weight-bold">
      <li class="nav-item w-100">
        <a href="home.php" class="nav-link text-light pl-1">Profile</a>
      </li>
      <li class="nav-item w-100">
        <a href="datairs.php" class="nav-link text-light pl-2">Data IRS</a>
      </li>
      <li class="nav-item w-100">
        <a href="datakhs.php" class="nav-link text-light pl-2">Data KHS</a>
      </li>
      <li class="nav-item w-100">
        <a href="datapkl.php" class="nav-link text-light pl-2">Data PKL</a>
      </li>
      <li class="nav-item w-100">
        <a href="dataskripsi.php" class="nav-link text-light pl-2">Data Skripsi</a>
      </li>
      <li class="nav-item w-100">
        <a href="../logout_mhs.php" class="nav-link text-light pl-2">Keluar</a>
      </li>
    </ul>
  </nav>
  <div class="foto text-center">
    <img src="logoundip.png" alt="" class="logo" width="100px" />
  </div>

  <section class="p-1 my-container">
    <div class="container m-p-0">
      <button class="btn my-1" id="menu-btn">Menu</button>
      <div class="row">
        <div class="col-lg-3">
          <br><br>
          <div class="container m-p-0">
            <a href="edit.php" class="btn my-1" id="menu-btn">Edit Profile</a>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <img src="foto.jpg" alt="foto" width="100px" class="rounded-circle" />
            <form method="POST" autocomplete="on" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
              <div class="mb-3">
                <br><br>
                <label for="nama" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="nama" value="<?= $nama ?>">
              </div>
              <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="status" value="<?= $status ?>">
              </div>
              <div class="mb-3">
                <label for="nim" class="form-label">NIM</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="nim" value="<?= $nim ?>">
              </div>
              <div class="mb-3">
                <label for="angkatan" class="form-label">Angkatan</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="angkatan" value="<?= $angkatan ?>">
              </div>
              <div class="mb-3">
                <label for="jalur" class="form-label">Jalur Masuk</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="jalur" value="<?= $jalur ?>">
              </div>
              <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="alamat" value="<?= $alamat ?>">
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" name="email" value="<?= $email ?>">
              </div>
              <div class="mb-3">
                <label for="phone" class="form-label">No.Telepon</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="phone" value="<?= $phone ?>">
              </div>
            </form>
          </div>
        </div>
      </div>
  </section>

  <!-- bootstrap js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.min.js" integrity="sha384-5h4UG+6GOuV9qXh6HqOLwZMY4mnLPraeTrjT5v07o347pj6IkfuoASuGBhfDsp3d" crossorigin="anonymous"></script>
  <!-- custom js -->
  <script>
    var menu_btn = document.querySelector('#menu-btn');
    var sidebar = document.querySelector('#sidebar');
    var container = document.querySelector('.my-container');
    menu_btn.addEventListener('click', () => {
      sidebar.classList.toggle('active-nav');
      container.classList.toggle('active-cont');
    });
  </script>
</body>

</html>