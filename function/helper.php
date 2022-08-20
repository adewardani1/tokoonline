<?php
	
	//untuk mendefinisikan/membuat konstanta bernilai tetap / bisa juga disebut variabel
	define("BASE_URL", "http://localhost/onlineshop/");

	$arrayStatusPesanan[0] = "Menunggu Pembayaran";
	$arrayStatusPesanan[1] = "Pembayaran sedang divalidasi";
	$arrayStatusPesanan[2] = "Lunas";
	$arrayStatusPesanan[3] = "Pembayaran Di Tolak";


	function rupiah($nilai = 0){
		$string = "Rp," . number_format($nilai);
		return $string;
	}

	function kategori($kategori_id = false){
		global $koneksi;

		$string = "<div id='menu-kategori'>";
		
		$string .= "<ul>";		
	
				$query = mysqli_query($koneksi, "SELECT * FROM kategori WHERE status='on'");

				while($row=mysqli_fetch_assoc($query)){
					if($kategori_id == $row['kategori_id']){
						$string .= "<li><a href='".BASE_URL."$row[kategori_id]/$row[kategori].html' class='active'>$row[kategori]</a></li>";
					}else{
						// index.php?kategori_id=$row[kategori_id]
						$string .= "<li><a href='".BASE_URL."$row[kategori_id]/$row[kategori].html'>$row[kategori]</a></li>";
					}	
				}

		$string .= "<ul>";	

	$string .= "</div>";

	return $string;

	}

	
