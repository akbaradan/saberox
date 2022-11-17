<?php
include('../db_connect.php');

$nim = $_GET['nim'];
$status = $_GET['status_irs'];

$query = "UPDATE irs SET status_irs=$status WHERE nim=$nim";

mysqli_query($koneksi, $query);

header('location:verifikasi.php')
