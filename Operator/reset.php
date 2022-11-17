<?php
//File      : delete_customer.php
//Deskripsi : menghapus data customer dan mengupdate ke database

require_once '../db_connect.php';

$NIM = $_GET['NIM']; //mendapatkan customerid yang dilewatkan ke url
if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}

//update data into database
if ($op == 'reset') {
    //asign a query
    $query =
        " UPDATE mahasiswa set password_mhs = '12345' WHERE NIM ='$NIM' " ;
    //execute the query
    $result = $koneksi->query($query);
    header('Location: reset_password.php');
}
?>