<?php
session_start(); //inisialisasi session
if (!isset($_SESSION['email'])) {
    header('Location: ../login.php');
}
require '../db_connect.php';

$sql = "SELECT * FROM mahasiswa ORDER BY NIM";
$result = $koneksi->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AAA SIAP</title>
    <!-- bootstrap 5 css -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css" integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous">
    <!-- custom css -->
    <style>
        * {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
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

        .card {
            background-color: rgba(255, 255, 255, 0.8);
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
            <button class="btn my-1 font-weight-bold" id="menu-btn"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="20" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 2 16 16">
                    <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z" />
                </svg> Data Mahasiswa
            </button>
            <div class="card ">
                <div class="card-header font-weight-bold fs-2">Data Mahasiswa</div>
                <div class="card-body">
                    <div class="content mt-3">
                        <table class="table table-borderless table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Foto</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">NIM</th>
                                    <th scope="col">View</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = mysqli_query($koneksi, $sql);
                                if (mysqli_num_rows($query) > 0) {
                                    $no = 1;
                                    while ($row = mysqli_fetch_array($query)) {
                                ?>
                                        <tr class="">
                                            <td><?php echo $no++; ?></td>
                                            <td>
                                                <img src="foto.jpg" width="90" height="90">
                                            </td>
                                            <td><?php echo $row['nama_mhs']; ?></td>
                                            <td><?php echo $row['NIM']; ?></td>
                                            <td>
                                                <a href="datamahasiswa.php?NIM=<?php echo $row['NIM']; ?>" class="btn btn-info">Detail</a>
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