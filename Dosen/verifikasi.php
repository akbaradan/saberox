<?php

use LDAP\Result;

session_start(); //inisialisasi session
if (!isset($_SESSION['email'])) {
    header('Location: ../login.php');
}
require '../db_connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AAA SIAP</title>
    <!-- bootstrap 5 css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css" integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/charts.css/dist/charts.min.css">
    <!-- custom css -->
    <style>
        * {
            margin: 0;
        }

        body {
            min-height: 100vh;
            /* background-color: #858585; */
            background-image: url('dips.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
        }

        .navbar {
            width: 250px;
            height: 100vh;
            position: fixed;
            margin-left: -300px;
            background-color: #292C6D;
            transition: 0.4s;
        }

        .nav-link {
            font-size: 1.25em;
        }


        .nav-link:active,
        .nav-link:focus,
        .nav-link:hover {
            background-color: #5DA7DB;
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

        .charts-css {
            --color-1: rgb(111, 56, 197);
            --color-2: rgb(33, 146, 255);
            /* for main section */
        }

        .active-cont {
            margin-left: 250px;
        }

        #menu-btn {
            background-color: #292C6D;
            color: #fff;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand d-flex flex-column align-item-start" id="sidebar">
        <div class="text-center">
            <?php
            $namadosen = 'nama_dosen';
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
        <ul class="navbar-nav d-flex flex-column mt-3 w-100 text-center font-weight-bold">
            <li class="nav-item w-100">
                <a href="awalan.php" class="nav-link text-light pl-2">Home</a>
            </li>
            <li class="nav-item w-100">
                <a href="mahasiswadata.php" class="nav-link text-light pl-2">Data Mahasiswa</a>
            </li>
            <li class="nav-item w-100">
                <a href="verifikasi.php" class="nav-link text-light pl-2">Verifikasi Berkas Mahasiswa</a>
            </li>
            <li class="nav-item w-100">
                <a href="datapkl.php" class="nav-link text-light pl-2">Data Mahasiswa PKL</a>
            </li>
            <li class="nav-item w-100">
                <a href="skripsi.php" class="nav-link text-light pl-2">Data Mahasiswa Skripsi</a>
            </li>
            <li class="nav-item w-100">
                <a href="../logout.php" class="nav-link text-light pl-2 bg-danger">Log Out</a>
            </li>
        </ul>
    </nav>
    <div class="foto text-center">
        <img src="logoundip.png" alt="" class=" logo" width="100px">
    </div>

    <section class="p-1 my-container ">
        <div class="container m-p-0">
            <button class="btn my-1 font-weight-bold" id="menu-btn"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="20" fill="currentColor" class="bi bi-house-fill" viewBox="0 2 16 16">
                    <path fill-rule="evenodd" d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                    <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
                </svg> Home
            </button>

            <div class="card ">
                <div class="card-header"></div>
                <div class="card-body text-center">
                    <h2>Daftar IRS</h2>
                    <table class="table">
                        <?php
                        $skl = "SELECT * FROM irs ORDER BY nim";
                        $result = $koneksi->query($skl);
                        ?>
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nim</th>
                                <th scope="col">Semester</th>
                                <th scope="col">SKS</th>
                                <th scope="col">Status IRS</th>
                                <th scope="col">Update</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = mysqli_query($koneksi, $skl);
                            if (mysqli_num_rows($query) > 0) {
                                $no = 1;
                                while ($row = mysqli_fetch_array($query)) {
                            ?>
                                    <tr class="">
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $row['nim']; ?></td>
                                        <td><?php echo $row['semester_mhs']; ?></td>
                                        <td><?php echo $row['sks']; ?></td>
                                        <td><?php if ($row['status_irs'] == 1) {
                                                echo 'Sudah Disetujui';
                                            } else {
                                                echo 'Belum Disetujui';
                                            } ?></td>
                                        <td>
                                            <?php
                                            if ($row['status_irs'] == 1) {
                                                echo '<p><a href="updateirs.php?nim=' . $row['nim'] . '&status_irs=0" class="btn btn-danger">Batalkan</a></p>';
                                            } else {
                                                echo '<p><a href="updateirs.php?nim=' . $row['nim'] . '&status_irs=1" class="btn btn-success">Setujui</a></p>';
                                            }
                                            ?>
                                        </td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>


    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.min.js" integrity="sha384-5h4UG+6GOuV9qXh6HqOLwZMY4mnLPraeTrjT5v07o347pj6IkfuoASuGBhfDsp3d" crossorigin="anonymous">
    </script>
    <!-- custom js -->
    <script>
        var menu_btn = document.querySelector("#menu-btn")
        var sidebar = document.querySelector("#sidebar")
        var container = document.querySelector(".my-container")
        menu_btn.addEventListener("click", () => {
            sidebar.classList.toggle("active-nav")
            container.classList.toggle("active-cont")
        })
    </script>
</body>

</html>