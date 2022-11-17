<?php
session_start(); //inisialisasi session
if (!isset($_SESSION['email'])) {
    header('Location: ../login.php');
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
        color: white;
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
    <nav
      class="navbar navbar-expand d-flex flex-column align-item-start"
      id="sidebar"
    >
      <div class="text-center">
        <img src="foto.jpg" alt="foto" width="150px" class="rounded-circle" />
        <h3 class="font-weight-light">Idham Hanif Multazam <br />Operator</h3>
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
            <div class="container text-center">
            <div class="container">
        <div class="card mt-4"  opacity: 0.9;">
            <div class="card-header" style="background-color: #a9c4c2;">Customers Data</div>
            <div class="card-body" style="background-color:#d6d6d6;">
                <br>
                <table class="table table-striped" style="border-bottom: 1px solid;">
                    <tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Angkatan</th>
                        <th>Action</th>
                    </tr>

                    <?php
                    // include our login information
                    require_once '../db_connect.php';

                    // execute the query
                    // yang berbeda dengan sebelumnya yaitu pada view_customer untuk nama panggilan label pada fetch object harus sama dengan di database
                    // tetapi kalau view_customer2 pada pemanggilan querynya dirubah untuk tiap label sesuai dengan keinginan masing masing seperti dibawah
                    // dan pada fetch object menyesuaikan dengan pemanggilan query yang telah diubah
                    $query =
                        ' SELECT nim AS NIM, nama_mhs AS NamaMahasiswa, angkatan AS Angkatan FROM mahasiswa ORDER BY Angkatan';
                    $result = $koneksi->query($query);
                    if (!$result) {
                        die(
                            'Could not the query the database: <br />' .
                                $koneksi->error .
                                '<br>Query: ' .
                                $query
                        );
                    }

                    // fetch and display the results
                    $i = 1;
                    while ($row = $result->fetch_object()) {
                        echo '<tr>';
                        echo '<td>' . $i . '</td>';
                        echo '<td>' . $row->NIM . '</td>';
                        echo '<td>' . $row->NamaMahasiswa . '</td>';
                        echo '<td>' . $row->Angkatan . '</td>';
                        echo '<td><a class="btn btn-danger btn-sm" href="reset.php?op=reset&NIM=' .
                            $row->NIM .
                            '">Reset Password</a>
                                      </td>';
                        echo '</tr>';
                        $i++;
                    }
                    echo '</table>';
                    echo '<br />';
                    echo 'Total Mahasiswa = ' . $result->num_rows;
                    $result->free();
                    $koneksi->close();
                    ?>
            </div>
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
