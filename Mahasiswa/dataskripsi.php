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

$query2 = 'SELECT * FROM skripsi WHERE nim_mhs="' . $nim . '"';
$result2 = $koneksi->query($query2);

if ($result2->num_rows > 0) {
  while ($row = $result2->fetch_assoc()) {
    $status_skripsi = $row['status_skripsi'];
    $nim_mhs = $row['nim_mhs'];
    $nilai_skripsi = $row['nilai_skripsi'];
    $lama_belajar = $row['lama_belajar'];
    $tanggal = $row['tanggal_sidang'];
    $ba_skripsi = $row['ba_skripsi'];
  }
}

?>


<?php if ($_POST) {
  $nim_mhs = test_input($_POST['nim_mhs']);
  $status_skripsi = test_input($_POST['status_skripsi']);
  $nilai_skripsi = test_input($_POST['nilai_skripsi']);
  $lama_belajar = test_input($_POST['lama_belajar']);
  $ba_skripsi = test_input($_POST['ba_skripsi']);
  $query = "UPDATE skripsi SET status_skripsi = '$status_skripsi', nilai_skripsi = '$nilai_skripsi', lama_belajar = '$lama_belajar',
            ba_skripsi = '$ba_skripsi' WHERE nim_mhs = '$nim_mhs'";
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

    input[type="date"] {
      width: 200px;
      height: 30px;
      top: 100%;
      left: 50%;
      background: #ff3273;
      padding: 5px;
      font-size: 18px;
      font-weight: 500;
      border: none;
      outline: none;
    }
  </style>
</head>

<body>
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
          <h2>Data Skripsi</h2>
          <form method="POST" autocomplete="on" action="<?php echo htmlspecialchars(
                                                          $_SERVER['PHP_SELF']
                                                        ); ?>">
            <div class="form-group mb-3">
              <label for="nim_mhs">Nomor Induk Mahasiswa</label>
              <input type="text" class="form-control" name="nim_mhs" id="nim_mhs" value="<?= $nim ?>">
              <small class="form-text text-danger" id=""></small>
            </div>
            <div class="mb-3">
              <label for="status_skripsi" class="form-label">Status Skripsi</label>
              <input name="status_skripsi" id="status_skripsi" class="form-control" type="text" id="status_skripsi" name="status_skripsi" value="<?= $status_skripsi ?>">
            </div>
            <div class="mb-3">
              <label for="nilai_skripsi" class="form-label">Nilai Skripsi (A/B/C/D/E)</label>
              <input name="nilai_skripsi" id="nilai_skripsi" class="form-control" type="text" id="nilai_skripsi" name="nilai_skripsi" value="<?= $nilai_skripsi ?>">
            </div>
            <div class="mb-3">
              <label for="lama_belajar" class="form-label">Lama Studi (Semester)</label>
              <input name="lama_belajar" id="lama_belajar" class="form-control" type="text" id="lama_belajar" name="lama_belajar" value="<?= $lama_belajar ?>">
            </div>
            <div class="mb-3">
              <label for="tanggal_sidang" class="date">Tanggal Sidang</label>
              <br>
              <input type="date" name="tanggal_sidang" id="tanggal_sidang" value="<?= $tanggal ?>">
            </div>
            <div class="mb-3">
              <label for="ba_skripsi" class="form-label">Scan Berita Acara</label>
              <input class="form-control" type="file" id="formFile" value="ba" name="ba_skripsi" id="ba_skripsi">
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