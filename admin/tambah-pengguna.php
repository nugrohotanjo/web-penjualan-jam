<?php
	session_start();
	if($_SESSION['user_name'] != "admin"){
		echo "<script>alert('Maaf Ente bukan admin.'); window.location = '../user.php'</script>";
	}
?>
<html>
<head>
	<title>Tambah Pengguna</title>
	<link	rel="stylesheet"	type="text/css" href="../style/styleuser.css"/>

</head>
<body bgcolor="#f9f9f9">
		<?php
			
			require "head.php";
			require "../konek_db.php";
			
		?>
		<div class = "menu2">
			<div class = "isi">
				<h1>Tambah Pengguna</h1>
				<form action = "../admin/simpan-pengguna.php" enctype="multipart/form-data" method = "POST">
				<table class = "tabel-barang" border = "0" cellspacing="20" cellpadding="0" > 
					
					<tr>
						<td>Nama Pengguna </td><td> : </td><td><input class = "inputan" type = "text" name = "nama" maxlength="35" required> <small><i>Maximal 35 Karakter</i></small></td>
					</tr>
					<tr>
						<td>Kata Sandi </td><td> : </td><td><input class = "inputan" name="katasandi" required="required" type="password" id="password" /> <small><i>Maximal 32 karakter</i></small></td>
					</tr>
						<td>Ulangi Kata Sandi </td><td> : </td><td><input class = "inputan" name="ulangi" required="required" type="password" id="password_confirm" oninput="check(this)" /></td>
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
						<td>&nbsp;</td><td></td><td><input class = "inputan" type="submit" name="submit" class = "tombol-simpan" value="Simpan"/> <input class = "inputan" type="reset" name="reset" class = "tombol" value="Batal"/></td>
					</tr>
					
				</table>
				</form>
			</div>
		</div>
	
</body>
</html>