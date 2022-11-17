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

$query2 = 'SELECT * FROM irs WHERE nim="' . $nim . '"';
$result2 = $koneksi->query($query2);

if ($result2->num_rows > 0) {
  while ($row = $result2->fetch_assoc()) {
    $nim = $row['nim'];
    $semester_mhs = $row['semester_mhs'];
    $sks = $row['sks'];
    $status_irs = $row['status_irs'];
    $berkas_irs = $row['berkas_irs'];
  }
}

?>

<?php if ($_POST) {
  $nim = test_input($_POST['nim']);
  $semester_mhs = test_input($_POST['semester_mhs']);
  $sks = test_input($_POST['sks']);
  $status_irs = test_input($_POST['status_irs']);
  $berkas_irs = test_input($_POST['berkas_irs']);

  $query = "UPDATE irs SET semester_mhs = '$semester_mhs', sks = '$sks', status_irs = '$status_irs', 
              berkas_irs = '$berkas_irs' WHERE nim = '$nim_mhs'";
  $result = $koneksi->query($query);
  if ($result) : ?>
    <div class="alert alert-success">Data berhasil disimpan</div>
  <?php else : ?>
    <div class="alert alert-error">Data gagal disimpan <?php echo $koneksi->error; ?></div>
    }
<?php endif;
} ?>

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

  <?php
  if (isset($_POST['submit'])) {
    $nim_mhs = test_input($_POST['nim']);
    $semester_mhs = test_input($_POST['semester_mhs']);
    $sks = test_input($_POST['sks']);
    $status_irs = test_input($_POST['status_irs']);
    $berkas_irs = test_input($_POST['berkas_irs']);


    $query = ("INSERT INTO irs(nim, semester_mhs, sks, status_irs, berkas_irs) VALUES ('$nim_mhs', '$semester_mhs', '$status_irs','$berkas_irs')");
    $result = $koneksi->query($query);

    if ($result) :
  ?>
      <div class="alert alert-success">Data berhasil disimpan</div>
    <?php else : ?>
      <div class="alert alert-error">Data gagal disimpan <?php echo $koneksi->error ?></div>
      }
  <?php
    endif;
  }
  ?>

  <nav class="navbar navbar-expand d-flex flex-column align-item-start" id="sidebar">
    <div class="text-center">
      <img src="foto.jpg" alt="foto" width="150px" class="rounded-circle" />
      <h3 class="font-weight-light">Fadhil Irsyad<br />Mahasiswa</h3>
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
      <div class="card">
        <div class="card-body">
          <h2>Data IRS</h2>
          <form method="POST" autocomplete="on" action="<?php echo htmlspecialchars(
                                                          $_SERVER['PHP_SELF']
                                                        ); ?>">
            <div class="form-group mb-3">
              <label for="nim_mhs">Nomor Induk Mahasiswa</label>
              <input type="text" class="form-control" name="nim_mhs" id="nim_mhs" value="<?= $nim ?>">
              <small class="form-text text-danger" id=""></small>
            </div>
            <div class="form-group mb-3">
              <label for="semester_mhs">Semester Aktif</label>
              <input type="text" class="form-control" name="semester_mhs" id="semester_mhs" value="<?= $semester_mhs ?>">
              <small class="form-text text-danger" id=""></small>
            </div>
            <div class="form-group mb-3">
              <label for="sks">Jumlah SKS</label>
              <input type="text" class="form-control" name="sks" id="sks" value="<?= $sks ?>">
              <small class="form-text text-danger" id="semester_error"></small>
            </div>
            <div class="mb-3">
              <label for="status_irs" class="form-label">Status IRS</label>
              <input type="text" class="form-control" name="status_irs" id="status_irs" value="<?= $status_irs ?>">
              <small class="form-text text-danger" id="semester_error"></small>
            </div>
            <div class="mb-3">
              <label for="berkas_irs" class="form-label">Upload IRS</label>
              <input class="form-control" type="file" id="berkas_irs" name="berkas_irs" />
            </div>

            <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1" />
              <label class="form-check-label" for="exampleCheck1">Data anda sudah benar semua?</label>
            </div>
            <button type="submit" name="submit" value="submit" class="btn btn-primary">Simpan</button>
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