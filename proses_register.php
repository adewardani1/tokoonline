<!-- Ade Wardani -->
<?php
	
	include_once("function/koneksi.php");
	include_once("function/helper.php");

	$level = 'customer';
	$status = 'on';
	$nama_lengkap = $_POST['nama_lengkap'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$alamat = $_POST['alamat'];
	$password = md5($_POST['password']);

	//untuk mengecek apakah form kosong atau tidak
	if(empty($nama_lengkap) || empty($email) || empty($phone) || empty($alamat) || empty($password) ){
		header("location: ".BASE_URL."index.php?page=register&notif=require");
	}else{
		mysqli_query($koneksi, "INSERT INTO user (level, nama, email, alamat, phone, password, status)
									   VALUES ('$level', '$nama_lengkap', '$email', '$alamat', '$phone', '$password', '$status')");
		header("location: ".BASE_URL."index.php?page=login");
	}