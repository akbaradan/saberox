<?php 
// mengaktifkan session pada php
session_start();
 
// menghubungkan php dengan koneksi database
include 'db_connect.php';
 //sdasdnaksndmanqwsqw
// menangkap data yang dikirim dari form login
$email = $_POST['email'];
$password = $_POST['password'];
 
 
// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi,"select * from mahasiswa where email_mhs='$email' and password_mhs='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
 
// cek apakah username dan password di temukan pada database
if($cek > 0){
 
	$data = mysqli_fetch_assoc($login);
 
	// cek jika user login sebagai admin
	if($data['role']=="customer"){
 
		// buat session login dan username
		$_SESSION['username'] = $email;
		$_SESSION['role'] = "operator";
		// alihkan ke halaman dashboard admin
		header("location:customer2/index.php");
    }
    else if($data['role']=="admin"){
 
            // buat session login dan username
            $_SESSION['username'] = $email;
            $_SESSION['role'] = "dosen";
            // alihkan ke halaman dashboard admin
            header("location:index.php");
    }
}
