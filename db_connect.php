<?php 
$koneksi = mysqli_connect("localhost","root","","ppl");

// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}

function test_input($data){
	global $koneksi;

	$data= trim($data);
	$data = htmlspecialchars($data);
	$data = $koneksi->real_escape_string($data);

	return $data;
}
