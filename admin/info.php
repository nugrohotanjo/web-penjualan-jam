<?php
	session_start();
	if(empty($_SESSION['user_name'])){
		echo "<script>alert('Anda belum mempunyai hak akses.'); window.location = '../login.php'</script>";
	}
?>
<html>
<head>
	<title>Update Info</title>
	<link	rel="stylesheet"	type="text/css" href="../style/styleuser.css"/>

</head>
<body bgcolor="#f9f9f9">
		<?php
			
			require "head.php";
			require "../konek_db.php";
			$panggil = mysql_query("SELECT * FROM info ", $konek);
			$data = mysql_fetch_array($panggil);
			
		?>
		<div class = "menu2">
			<div class = "isi">
				<h1>Update Info</h1>
				<form action = "../admin/simpan-info.php" method = "POST" enctype="multipart/form-data">
				<table class = "tabel-barang" border = "0" cellspacing="20" cellpadding="0" > 
					<tr>
						<td><h3>Info Rekening BANK</h3></td>
					</tr>
					<tr>
						<td>Nomor Rekening</td><td> : </td><td><input class = "inputan" type = "text" name = "norek" maxlength="20" value="<?php echo $data['norek']; ?> " required> <small><i>Maximal 20 Karakter</i></small></td>
					</tr>
					<tr>
						<td>Atas Nama</td><td> : </td><td><input class = "inputan" type = "text" name = "nama" maxlength="25" value="<?php echo $data['atasnama']; ?> " required> <small><i>Maximal 25 Karakter</i></small></td>
					</tr>
					<tr>
						<td><h3>Info Kontak</h3></td>
					</tr>
					<tr>
						<td>Hotline </td><td> : </td><td><input class = "inputan" type = "text" name = "hotline" maxlength="15" value="<?php echo $data['hotline']; ?> " required> <small><i>Maximal 15 Karakter</i></small></td>
					</tr>
					<tr>
						<td>BBM </td><td> : </td><td><input class = "inputan" type = "text" name = "bbm" maxlength="15" value="<?php echo $data['bbm']; ?> "required> <small><i>Maximal 15 Karakter</i></small></td>
					</tr>
					<tr>
						<td>whatsapp </td><td> : </td><td><input class = "inputan" type = "text" name = "whatsapp" maxlength="15" value="<?php echo $data['wa']; ?> "required> <small><i>Maximal 15 Karakter</i></small></td>
					</tr>
					<tr>
						<td><h3>Info Sidebar Berjalan</h3></td>
					</tr>
					<tr>
						<td>Info 1 </td><td> : </td><td><input class = "inputan" type = "text" name = "info1" maxlength="99" value="<?php echo $data['info1']; ?> " required> <small><i>Maximal 99 Karakter</i></small></td>
					</tr>
					<tr>
						<td>Info 2 </td><td> : </td><td><input class = "inputan" type = "text" name = "info2" maxlength="99" value="<?php echo $data['info2']; ?> "required> <small><i>Maximal 99 Karakter</i></small></td>
					</tr>
					<tr>
						<td>Info 3 </td><td> : </td><td><input class = "inputan" type = "text" name = "info3" maxlength="99" value="<?php echo $data['info3']; ?> "required> <small><i>Maximal 99 Karakter</i></small></td>
					</tr>
	
					<tr>
						<td>&nbsp;</td><td></td><td><input class = "inputan" type="submit" name="submit" class = "tombol-simpan" value="Update"/> <input class = "inputan" type="reset" name="reset" class = "tombol" value="Batal"/></td>
					</tr>
					
				</table>
		
				</form>
			</div>
		</div>
	
</body>
</html>