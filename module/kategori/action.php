<?php
    include_once("../../function/koneksi.php");   
    include_once("../../function/helper.php");   
     
    $kategori = $_POST['kategori'];
    $status = $_POST['status'];
    $button = $_POST['button'];
	
	//buat nambah kategori
	if($button == "Add"){
		mysqli_query($koneksi, "INSERT INTO kategori (kategori, status) VALUES('$kategori', '$status')");
	}
	//untuk ngupdate kategori on/off
	else if($button == "Update"){
		$kategori_id = $_GET['kategori_id'];
		
		mysqli_query($koneksi, "UPDATE kategori SET kategori='$kategori',
													status='$status' WHERE kategori_id='$kategori_id'");
		//memakai where agar tidak semua variable berubah (akan dicari sesuai kategori_id)
	}
	
	header("location:" .BASE_URL."index.php?page=profile&module=kategori&action=list");