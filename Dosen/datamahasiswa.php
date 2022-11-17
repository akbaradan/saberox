<?php
session_start(); //inisialisasi session
if (!isset($_SESSION['email'])) {
    header('Location: ../login.php');
}
require '../db_connect.php';
if (isset($_GET['NIM'])) {
    $nimmhs = $_GET['NIM'];
}

$sql = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE NIM='$nimmhs'");
$result = mysqli_fetch_array($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AAA SIAP</title>
    <!-- bootstrap 5 css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css" integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
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

        /* for main section */
        .active-cont {
            margin-left: 250px;
        }

        h5 {
            font-size: 25px;
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
                <a href="programstudi.php" class="nav-link text-light pl-2">Program Studi Mahasiswa</a>
            </li>
            <li class="nav-item w-100">
                <a href="datapkl.php" class="nav-link text-light pl-2">Data Mahasiswa PKL</a>
            </li>
            <li class="nav-item w-100">
                <a href="skripsi.php" class="nav-link text-light pl-2">Data Mahasiswa Skripsi</a>
            </li>
            <li class="nav-item w-100">
                <a href="../logout.php" class="nav-link text-light pl-2">Log Out</a>
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
            <div class="card">
                <div class="card-header text-center font-weight-bold">Data Mahasiswa</div>
                <div class="card-body text-center">
                    <div class="container text-center">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="profile text-center">
                                    <img src="foto.jpg" alt="" class="rounded-circle" width="100px">
                                </div>
                                <div class="keterangan">
                                    <h5 class="mt-2">Nama</h5>
                                    <?php
                                    echo $result['nama_mhs']
                                    ?>
                                    <h5 class="m-2">NIM</h5>
                                    <?php
                                    echo $result['NIM'];
                                    ?>
                                    <h5 class="m-2">Angkatan</h5>
                                    <?php
                                    echo $result['angkatan'];
                                    ?>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="accordion accordion-flush" id="accordionFlushExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-headingOne">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                                Semester 1
                                            </button>
                                        </h2>
                                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">
                                                <?php
                                                if (isset($_GET['nim_mhs'])) {
                                                    $nimmhs = $_GET['nim_mhs'];
                                                }
                                                $sks = 'sks_semester';
                                                $ipk = 'ip_kumulatif';
                                                $sll = mysqli_query($koneksi, "SELECT * FROM khs WHERE semester_mhs = '1' AND nim_mhs = $nimmhs");
                                                $hasi = mysqli_fetch_array($sll);
                                                ?>
                                                <div class="container px-4">
                                                    <div class="row gx-5">
                                                        <div class="col">
                                                            <div class="p-3 border bg-info text-light">
                                                                <h5> IP KUMULATIF </h5>
                                                                <?php echo $hasi['ip_kumulatif']; ?>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="p-3 border bg-info text-light">
                                                                <h5> SKS </h5>
                                                                <?php echo $hasi['sks_semester']; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-headingTwo">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                                Semester 2
                                            </button>
                                        </h2>
                                        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">
                                                <?php
                                                if (isset($_GET['nim_mhs'])) {
                                                    $nimmhs = $_GET['nim_mhs'];
                                                }
                                                $sks = 'sks_semester';
                                                $ipk = 'ip_kumulatif';
                                                $sll = mysqli_query($koneksi, "SELECT * FROM khs WHERE semester_mhs = '2' AND nim_mhs = $nimmhs");
                                                $hasi = mysqli_fetch_array($sll);
                                                ?>
                                                <div class="container px-4">
                                                    <div class="row gx-5">
                                                        <div class="col">
                                                            <div class="p-3 border bg-info text-light">
                                                                <h5> IP KUMULATIF </h5>
                                                                <?php echo $hasi['ip_kumulatif']; ?>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="p-3 border bg-info text-light">
                                                                <h5> SKS </h5>
                                                                <?php echo $hasi['sks_semester']; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-headingThree">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                                Semester 3
                                            </button>
                                        </h2>
                                        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">
                                                <?php
                                                if (isset($_GET['nim_mhs'])) {
                                                    $nimmhs = $_GET['nim_mhs'];
                                                }
                                                $sks = 'sks_semester';
                                                $ipk = 'ip_kumulatif';
                                                $sll = mysqli_query($koneksi, "SELECT * FROM khs WHERE semester_mhs = '3' AND nim_mhs = $nimmhs");
                                                $hasi = mysqli_fetch_array($sll);
                                                ?>
                                                <div class="container px-4">
                                                    <div class="row gx-5">
                                                        <div class="col">
                                                            <div class="p-3 border bg-info text-light">
                                                                <h5> IP KUMULATIF </h5>
                                                                <?php echo $hasi['ip_kumulatif']; ?>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="p-3 border bg-info text-light">
                                                                <h5> SKS </h5>
                                                                <?php echo $hasi['sks_semester']; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-headingFour">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                                                Semester 4
                                            </button>
                                        </h2>
                                        <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">
                                                <?php
                                                if (isset($_GET['nim_mhs'])) {
                                                    $nimmhs = $_GET['nim_mhs'];
                                                }
                                                $sks = 'sks_semester';
                                                $ipk = 'ip_kumulatif';
                                                $sll = mysqli_query($koneksi, "SELECT * FROM khs WHERE semester_mhs = '4' AND nim_mhs = $nimmhs");
                                                $hasi = mysqli_fetch_array($sll);
                                                ?>
                                                <div class="container px-4">
                                                    <div class="row gx-5">
                                                        <div class="col">
                                                            <div class="p-3 border bg-info text-light">
                                                                <h5> IP KUMULATIF </h5>
                                                                <?php echo $hasi['ip_kumulatif']; ?>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="p-3 border bg-info text-light">
                                                                <h5> SKS </h5>
                                                                <?php echo $hasi['sks_semester']; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-headingFive">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
                                                Semester 5
                                            </button>
                                        </h2>
                                        <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">
                                                <?php
                                                if (isset($_GET['nim_mhs'])) {
                                                    $nimmhs = $_GET['nim_mhs'];
                                                }
                                                $sks = 'sks_semester';
                                                $ipk = 'ip_kumulatif';
                                                $sll = mysqli_query($koneksi, "SELECT * FROM khs WHERE semester_mhs = '5' AND nim_mhs = $nimmhs");
                                                $hasi = mysqli_fetch_array($sll);
                                                ?>
                                                <div class="container px-4">
                                                    <div class="row gx-5">
                                                        <div class="col">
                                                            <div class="p-3 border bg-info text-light">
                                                                <h5> IP KUMULATIF </h5>
                                                                <?php echo $hasi['ip_kumulatif']; ?>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="p-3 border bg-info text-light">
                                                                <h5> SKS </h5>
                                                                <?php echo $hasi['sks_semester']; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-headingSix">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseSix">
                                                Semester 6
                                            </button>
                                        </h2>
                                        <div id="flush-collapseSix" class="accordion-collapse collapse" aria-labelledby="flush-headingSix" data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">
                                                <?php
                                                if (isset($_GET['nim_mhs'])) {
                                                    $nimmhs = $_GET['nim_mhs'];
                                                }
                                                $sks = 'sks_semester';
                                                $ipk = 'ip_kumulatif';
                                                $sll = mysqli_query($koneksi, "SELECT * FROM khs WHERE semester_mhs = '6' AND nim_mhs = $nimmhs");
                                                $hasi = mysqli_fetch_array($sll);
                                                ?>
                                                <div class="container px-4">
                                                    <div class="row gx-5">
                                                        <div class="col">
                                                            <div class="p-3 border bg-info text-light">
                                                                <h5> IP KUMULATIF </h5>
                                                                <?php echo $hasi['ip_kumulatif']; ?>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="p-3 border bg-info text-light">
                                                                <h5> SKS </h5>
                                                                <?php echo $hasi['sks_semester']; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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