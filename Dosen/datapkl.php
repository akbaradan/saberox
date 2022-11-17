<?php
session_start(); //inisialisasi session
if (!isset($_SESSION['email'])) {
    header('Location: ../login.php');
}
?>

<?php
require '../db_connect.php';

$result = mysqli_query($koneksi, "SELECT * FROM pkl");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AAA SIAP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css" integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous">

    <!-- custom css -->
    <style>
        * {
            margin: 0;
        }

        body {
            min-height: 100vh;
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

        /* for main section */

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
            <button class="btn my-1 font-weight-bold" id="menu-btn"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="20" fill="currentColor" class="bi bi-pc-display-horizontal" viewBox="0 2 16 16">
                    <path d="M1.5 0A1.5 1.5 0 0 0 0 1.5v7A1.5 1.5 0 0 0 1.5 10H6v1H1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1h-5v-1h4.5A1.5 1.5 0 0 0 16 8.5v-7A1.5 1.5 0 0 0 14.5 0h-13Zm0 1h13a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .5-.5ZM12 12.5a.5.5 0 1 1 1 0 .5.5 0 0 1-1 0Zm2 0a.5.5 0 1 1 1 0 .5.5 0 0 1-1 0ZM1.5 12h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1ZM1 14.25a.25.25 0 0 1 .25-.25h5.5a.25.25 0 1 1 0 .5h-5.5a.25.25 0 0 1-.25-.25Z" />
                </svg> Data PKL
            </button>
            <div class="card ">
                <div class="card-header text-center font-weight-bold">Data PKL Mahasiswa</div>
                <div class="card-body">
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">NIM</th>
                                <th scope="col">Status</th>
                                <th scope="col">Nilai</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $i = 1;
                            while ($row = $result->fetch_object()) {
                                echo '<tr>';
                                echo '<td>' . $i . '</td>';
                                echo '<td>' . $row->nim_mhs . '</td>';
                                echo '<td>' . $row->status_pkl . '</td>';
                                echo '<td>' . $row->nilai_pkl . '</td>';
                                echo '</tr>';
                                $i++;
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