<?php
session_start(); //inisialisasi session
if (!isset($_SESSION['email'])) {
    header('Location: ../login.php');
}
?>

<?php
require_once('../db_connect.php');
?>

<?php
// mengecek apakah user sudah menekan tombol submit
if (isset($_POST["submit"])){
    $valid = TRUE; //flag validasi
    $nim = ($_POST['nim']);
    if ($nim == ''){
        $error_nim = "NIM is required";
        $valid = FALSE;
    } 
    
    $nama = ($_POST['nama']);
    if ($nama == ''){
        $error_nama = "Nama Mahasiswa is required";
        $valid = FALSE;
    }
    $email = ($_POST['email']);
    if ($email == ''){
        $error_email = "Email is required";
        $valid = FALSE;
    }

    if ($valid){
        $query = "INSERT INTO mahasiswa (NIM, nama_mhs, email_mhs, password_mhs, angkatan, status_mhs) VALUES ('" . $nim . "', '" . $nama . "', '" . $email . "', '12345', '2023', 'aktif')";
        //execute the query
        $result = $koneksi->query($query);
        if (!$result){
            die ("Could not the query the database: <br />" . $koneksi->error . '<br>Query:' .$query);
        } else{
            //ketika sudah di submit , maka akan langsung pindah ke halaman view_customer.php
            $koneksi->close();
            header('Location: buat_akun.php');
        }
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
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css"
      integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK"
      crossorigin="anonymous"
    />
    <!-- custom css -->
    <style>
      * {
        margin: 0;
      }

      body {
        min-height: 100vh;
            /* background-color: #858585; */
            background-image: url('../dips.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;

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
        color: white;
      }

      /* for main section */

      .active-cont {
        margin-left: 250px;
      }

      .card {
            background-color: rgba(255, 255, 255, 0.8);
        }

      #menu-btn {
        background-color: #ff3273;
        color: #fff;
      }
    </style>
  </head>

  <body>
    <nav
      class="navbar navbar-expand d-flex flex-column align-item-start"
      id="sidebar"
    >
    <div class="text-center">
            <?php
            $namaoperator = 'nama_dosen';
            $query = mysqli_query($koneksi, "SELECT nama_dosen FROM dosen");
            $res = mysqli_fetch_array($query);
            ?>
            <img src="foto.jpg" alt="foto" width="150px" class="rounded-circle">
            <h3 class="font-weight-light">
                <?php
                echo $res['nama_dosen'];
                ?>
                <br>Dosen
            </h3>
        </div>
      <ul
        class="navbar-nav d-flex flex-column mt-3 w-100 text-center font-weight-bold"
      >
        <li class="nav-item w-100">
          <a href="operator.php" class="nav-link text-light pl-2">Home</a>
        </li>
        <li class="nav-item w-100">
          <a href="buat_akun.php" class="nav-link text-light pl-2"
            >Buat Akun Mahasiswa Baru</a
          >
        </li>
        <li class="nav-item w-100">
          <a href="reset_password.php" class="nav-link text-light pl-2"
            >Reset Password Mahasiswa</a
          >
        </li>
        <li class="nav-item w-100">
          <a href="../logout.php" class="nav-link text-light pl-2"
            >Logout</a
          >
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
            <div class="container">
            <form method="POST" autocomplete="on" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <div class="aform-group">
                            <label for="nim">NIM</label><br>
                            <input type="text" class="form-control" id="nim" name="nim" size="30" value="<?php if(isset($nim)) echo $nim;?>">
                            <div class="text-danger"><?php if(isset($error_nim)) echo $error_nim;?></div>
                        </div>
                        <div class="aform-group">
                            <label for="nama">Nama</label><br>
                            <input type="text" class="form-control" id="nama" name="nama" size="30" value="<?php if(isset($nama)) echo $nama;?>">
                            <div class="text-danger"><?php if(isset($error_nama)) echo $error_nama;?></div>
                        </div>
                        <div class="aform-group">
                            <label for="nama">Angkatan</label><br>
                            <input type="text" class="form-control" id="angkatan" name="angkatan" size="30" disabled value="2023">
                            <div class="text-danger"></div>
                        </div>
                        <div class="aform-group">
                            <label for="nama">Status</label><br>
                            <input type="text" class="form-control" id="status" name="status" size="30" disabled value="aktif">
                            <div class="text-danger"></div>
                        </div>
                        <div class="aform-group">
                            <label for="email">Email</label><br>
                            <input type="email" class="form-control" id="email" name="email" size="30" value="<?php if(isset($email)) echo $email;?>">
                            <div class="text-danger"><?php if(isset($error_email)) echo $error_email;?></div>
                        </div>
                        <div class="aform-group">
                            <label for="password">Password</label><br>
                            <input type="password" class="form-control" id="password" name="password" size="30" value="12345" disabled>
                            <div class="text-danger"></div>
                        </div>
                        <div class="aform-group">
                        <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
                    </form>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- bootstrap js -->
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
      integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.min.js"
      integrity="sha384-5h4UG+6GOuV9qXh6HqOLwZMY4mnLPraeTrjT5v07o347pj6IkfuoASuGBhfDsp3d"
      crossorigin="anonymous"
    ></script>
    <!-- custom js -->
    <script>
      var menu_btn = document.querySelector("#menu-btn");
      var sidebar = document.querySelector("#sidebar");
      var container = document.querySelector(".my-container");
      menu_btn.addEventListener("click", () => {
        sidebar.classList.toggle("active-nav");
        container.classList.toggle("active-cont");
      });
    </script>
  </body>
</html>
