<?php
	session_start();
	if(empty($_SESSION['user_name'])){
		echo "<script>alert('Anda belum mempunyai hak akses.'); window.location = '../login.php'</script>";
	}
?>
<html>
<head>
	<title>Tambah Barang</title>
	<link	rel="stylesheet"	type="text/css" href="../style/styleuser.css"/>

</head>
<body bgcolor="#f9f9f9">
		<?php
			
			require "head.php";
			require "../konek_db.php";
			
		?>
		<div class = "menu2">
			<div class = "isi">
				<h1>Tambah Produk</h1>
					<div style="text-align: right;">Tanggal Barang di Simpan &nbsp; <?php echo date ("y-m-d") ?></div>
				<form action = "../admin/simpan-produk.php" enctype="multipart/form-data" method = "POST">
				<table class = "tabel-barang" border = "0" cellspacing="20" cellpadding="0" > 
					
					<tr>
						<td>Nama Produk </td><td> : </td><td><input class = "inputan" type = "text" name = "nama-barang" maxlength="35"> <small><i>Maximal 35 Karakter</i></small></td>
					</tr>
					<tr>
						<td>Harga Barang</td><td> : </td><td><input class = "inputan" type = "text" name = "harga-barang" ></td>
					</tr>
					<tr>
						<td>Jumlah Barang </td><td> : </td><td><input class = "inputan" type = "text" name = "jumlah-barang" ></td>
					</tr>
					<tr>
						<td>Kategori</td><td> : </td><td><select class = "inputan" name = "kategori"> <option value = "Jam Tangan Pria">Jam Tangan Pria</option> <option value = "Jam Tangan Wanita">Jam Tangan Wanita</option></select></td>
					</tr>
					<tr>
						<td>Stok</td><td> : </td><td><select class = "inputan" name = "status"> <option value = "Tersedia">Tersedia</option> <option value = "Tidak Tersedia">Tidak Tersedia</option>
					</tr>
					<tr>
						<td>Berat</td><td> : </td><td><input class = "inputan" type = "text" name = "berat">  <small><i>gram</i></small> </td>
					</tr>
					<tr>
						<td>Deskripsi Produk</td><td> : </td><td><textarea class = "inputan" rows = "4" cols = "22" name = "deskripsi"></textarea></td>
					</tr>
					<tr>
						<td>Gambar Barang</td><td> : </td><td><input class = "inputan" type = "file" name = "gambar"> </td>
					</tr>
					<tr>
						<td>&nbsp;</td><td></td><td><input class = "inputan" type="submit" name="submit" class = "tombol-simpan" value="Simpan"/> <input class = "inputan" type="reset" name="reset" class = "tombol" value="Batal"/></td>
					</tr>
					
				</table>
				</form>
			</div>
		</div>
	
</body>
</html>