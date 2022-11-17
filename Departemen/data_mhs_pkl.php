<?php
session_start(); //inisialisasi session
if (!isset($_SESSION['email'])) {
    header('Location: ../login.php');
}
?>

<?php
require '../db_connect.php';
$query = mysqli_query($koneksi, "SELECT * FROM pkl WHERE status_pkl = 'Lulus'");
$jumlah_lulus = mysqli_num_rows($query);
$query2 = mysqli_query($koneksi, "SELECT * FROM pkl WHERE status_pkl = 'Belum Lulus'");
$jumlah_belum_lulus = mysqli_num_rows($query2);
$query3 = mysqli_query($koneksi, "SELECT * FROM pkl WHERE status_pkl = 'Belum PKL'");
$jumlah_belum_pkl = mysqli_num_rows($query3);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AAA SIAP</title>
    <!-- bootstrap 5 css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css" integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous">
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
    h3{
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

    #customers {
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
    }

    #customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
    }

    #customers tr {
    background-color: #07a6e0;
    color: white; 
    }

    #customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #ff3273;
    color: white;
    }

	</style>
</head>

<body>
    <nav class="navbar navbar-expand d-flex flex-column align-item-start" id="sidebar">
        <div class="text-center" >
            <img src="foto.jpg" alt="foto" width="150px" class="rounded-circle">
            <h3 class="font-weight-light">Rafly Ardhiananda<br>Departemen</h3>
        </div>
        <ul class="navbar-nav d-flex flex-column mt-3 w-100 text-center font-weight-bold">
            <li class="nav-item w-100">
                <a href="home.php" class="nav-link text-light pl-2">Home</a>
            </li>
            <li class="nav-item w-100">
                <a href="data_mahasiswa.php" class="nav-link text-light pl-2">Data Mahasiswa</a>
            </li>
            <li class="nav-item w-100">
                <a href="data_mhs_pkl.php" class="nav-link text-light pl-2">Data Mahasiswa PKL</a>
            </li>
			<li class="nav-item w-100">
                <a href="data_mhs_skripsi.php" class="nav-link text-light pl-2">Data Mahasiswa Skripsi</a>
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
            <button class="btn my-1" id="menu-btn">Menu</button><br><br><br>
            <div class="row">
            <div class="col-lg-4">
                    <div class="container m-p-0"><br>                    
                        <center><h5>Total Mahasiswa Lulus PKL</h5></center><br>
                        <center><a href="data_mhs_lulus_pkl.php"><h1><?php echo $jumlah_lulus ?></h1></a></center><br>
                        <center><h5>Total Mahasiswa Belum Lulus PKL</h5></center><br>
                        <center><a href="data_mhs_blm_lulus_pkl.php"><h1><?php echo $jumlah_belum_lulus ?></h1></a></center><br>
                        <center><h5>Total Mahasiswa Belum PKL</h5></center><br>
                        <center><a href="data_mhs_blm_pkl.php"><h1><?php echo $jumlah_belum_pkl ?></h1></a></center><br>

                    </div>
            </div>
            <div class="col-lg-7">
                <div class="card">
                    <div class="card-body">
                        <?php include("chart/index-pkl.php"); ?>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </section>


    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.min.js" integrity="sha384-5h4UG+6GOuV9qXh6HqOLwZMY4mnLPraeTrjT5v07o347pj6IkfuoASuGBhfDsp3d" crossorigin="anonymous"></script>
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