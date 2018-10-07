<?php
	session_start();
	if(empty($_SESSION['user_name'])){
		echo "<script>alert('Anda belum mempunyai hak akses.'); window.location = '../login.php'</script>";
	}
?>
<html>
<head>
	<title>Ubah Data Pengguna</title>
	<link	rel="stylesheet"	type="text/css" href="../style/styleuser.css"/>
</head>
<body bgcolor="#f9f9f9">
		<?php
			
			require "head.php";
			require "../konek_db.php";
			$panggil = mysql_query("SELECT * FROM user WHERE user_name='$_GET[kd]'", $konek);
			$data = mysql_fetch_array($panggil);
			
		?>
		<div class = "menu2">
			<div class = "isi">
				<h1>Ubah Pengguna</h1>
					
				<form action = "../admin/ubah-simpan-pengguna.php" enctype="multipart/form-data" method = "POST">
				<table class = "tabel-barang" border = "0" cellspacing="20" cellpadding="0" > 
					
					<tr>
						<td></td><td>  </td><td><input class = "inputan" type = "hidden" name = "nama"  value="<?php echo $data['user_name']; ?>" ></td>
					</tr>
					
					<tr>
						<td>Nama Pengguna </td><td> : <td><?php echo ''.$data['user_name'].''?></td>
					</tr>
					<tr>
						<td>Kata Sandi </td><td> : </td><td><input class = "inputan" name="katasandi" required="required" type="password" id="password" placeholder = "Masukan Kata Sandi" /> <small><i>Maximal 32 karakter</i></small></td>
					</tr>
					<tr>
						<td>Ulangi Kata Sandi </td><td> : </td><td><input class = "inputan" name="ulangi-katasandi" required="required" type="password" id="password_confirm" oninput="check(this)" placeholder = "Ulangi Kata Sandi" / ></td>
					</tr>
					<script language='javascript' type='text/javascript'>
					function check(input) {
						if (input.value != document.getElementById('password').value) {
							input.setCustomValidity('Kata Sandi dan Ulangi Kata Sandi Anda Tidak Cocok');
						} 
						else {
							// input is valid -- reset the error message
							input.setCustomValidity('');
						}
					}
					</script>
					<tr>
						<td>&nbsp;</td><td></td><td><input class = "inputan" type="submit" name="submit" class = "tombol-simpan" value="Ubah"/> <input class = "inputan" type="reset" name="reset" class = "tombol" value="Batal"/> &nbsp; &nbsp; <a  href="daftar-pengguna.php" style = "margin-top:50px; text-decoration:none;" >Kembali</a></td>
						
					</tr>
					
				</table>
				</form>
			</div>
		</div>
	
</body>
</html>