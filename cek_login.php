<?php 
// mengaktifkan session pada php
session_start();
 
// menghubungkan php dengan koneksi database
include 'db_connect.php';
 
// menangkap data yang dikirim dari form login
$email = $_POST['email'];
$password = $_POST['password'];
 
 
// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi,"select * from user where email='$email' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
 
// cek apakah username dan password di temukan pada database
if($cek > 0){
 
	$data = mysqli_fetch_assoc($login);
 
	// cek jika user login sebagai admin
	if($data['role']=="operator"){
 
		// buat session login dan username
		$_SESSION['email'] = $email;
		$_SESSION['role'] = "operator";
		// alihkan ke halaman dashboard admin
		header("location:operator/operator.php");
    }
    else if($data['role']=="dosen"){
 
            // buat session login dan username
            $_SESSION['email'] = $email;
            $_SESSION['role'] = "dosen";
            // alihkan ke halaman dashboard admin
            header("location:dosen/awalan.php");
    }
    else if($data['role']=="mahasiswa"){
 
        // buat session login dan username
        $_SESSION['email'] = $email;
        $_SESSION['role'] = "mahasiswa";
        // alihkan ke halaman dashboard admin
        header("location:mahasiswa/home.php");
    }	
    else if($data['role']=="departemen"){
 
        // buat session login dan username
        $_SESSION['email'] = $email;
        $_SESSION['role'] = "departemen";
        // alihkan ke halaman dashboard admin
        header("location:departemen/home.php");
    }
}
 
?>