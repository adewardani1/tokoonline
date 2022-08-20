<!-- Ade Wardani -->
<?php
	
	//jika sudah login maka akan dikembalikan ke base_url / halaman utama
	if($user_id){
		header("location: ".BASE_URL);
	}

?>

<div id="container-user-akses">

	<form action="<?php echo BASE_URL."proses_register.php"; ?>" method="POST">

		<?php
			$notif = isset($_GET['notif']) ? $_GET['notif'] : false;

			if($notif == "require"){
				echo "<div class='notif'>Lengkapi Form dibawah ini</div>";
			}

		?>

		<div class="element-form">
			<label>Nama Lengkap</label>
			<span><input type="text" name="nama_lengkap"></span>
		</div>

		<div class="element-form">
			<label>Email</label>
			<span><input type="text" name="email"></span>
		</div>

		<div class="element-form">
			<label>Nomor Telepon</label>
			<span><input type="text" name="phone"></span>
		</div>

		<div class="element-form">
			<label>Alamat</label>
			<span><textarea name="alamat"></textarea></span>
		</div>
		
		<div class="element-form">
			<label>Password</label>
			<span><input type="password" name="password"></span>
		</div>

		<div class="element-form">
			<span><input type="submit" value="register"></span>
		</div>

	</form>
	

</div>