<?php

	include_once("function/koneksi.php");
	include_once("function/helper.php");
	
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	
	$query = mysqli_query($koneksi, "SELECT * FROM user WHERE email='$email' AND password='$password' AND status='on'");
	
	//untuk mengecek apakah ada sebuah data
	if(mysqli_num_rows($query) == 0){
		header("location:". BASE_URL . "index.php?page=login&notif=true");
	}else{
		
		//untuk mengeluarkan data menggunakan fungsi
		$row = mysqli_fetch_assoc($query);
		
		//echo $row['nama']; (untuk memunculkan nama)
		session_start();
		
		//session adalah data yang disimpan disisi server dapat digunakan sebelum user belum menutup halaman
		$_SESSION['user_id'] = $row['user_id'];
		$_SESSION['nama'] = $row['nama'];
		$_SESSION['level'] = $row['level'];
		
		if(isset($_SESSION["proses_pesanan"])){
			unset($_SESSION["proses_pesanan"]);
			header("location: ".BASE_URL."data_pemesan.html");
		}else{
			//pindah ke myprofile
			header("location: ".BASE_URL."index.php?page=my_profile&module=pesanan&action=list");
		}
	}