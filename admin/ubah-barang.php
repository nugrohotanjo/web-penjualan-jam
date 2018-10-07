<?php
	session_start();
	if(empty($_SESSION['user_name'])){
		echo "<script>alert('Anda belum mempunyai hak akses.'); window.location = '../login.php'</script>";
	}
?>
<html>
<head>
	<title>Ubah Data Barang</title>
	<link	rel="stylesheet"	type="text/css" href="../style/styleuser.css"/>
</head>
<body bgcolor="#f9f9f9">
		<?php
			
			require "head.php";
			require "../konek_db.php";
			$panggil = mysql_query("SELECT * FROM barang WHERE kd_brg='$_GET[kd]'", $konek);
			$data = mysql_fetch_array($panggil);
			
		?>
		<div class = "menu2">
			<div class = "isi">
				<h1>Ubah Produk</h1>
					
				<form action = "../admin/ubah-simpan-barang.php" enctype="multipart/form-data" method = "POST">
				<table class = "tabel-barang" border = "0" cellspacing="20" cellpadding="0" > 
					
					<tr>
						<td></td><td>  </td><td><input class = "inputan" type = "hidden" name = "kodebarang"  value="<?php echo $data['kd_brg']; ?>" ></td>
					</tr>
					
					<tr>
						<td>Nama Produk </td><td> : </td><td><input class = "inputan" type = "text" name = "nama-barang" maxlength="35" value="<?php echo $data['nama_brg']; ?>"> <small><i>Maximal 35 Karakter</i></small></td>
					</tr>
					<tr>
						<td>Harga Barang</td><td> : </td><td><input class = "inputan" type = "text" name = "harga-barang" value="<?php echo $data['harga_barang']; ?>"></td>
					</tr>
					<tr>
						<td>Jumlah Barang </td><td> : </td><td><input class = "inputan" type = "text" name = "jumlah-barang" value="<?php echo $data['jumlah_brg']; ?>"></td>
					</tr>
					<tr>
						<td>Kategori</td><td> : </td><td><select class = "inputan" name = "kategori" value="<?php echo $data['kategori']; ?>"> <option value = "Jam Tangan Pria">Jam Tangan Pria</option> <option value = "Jam Tangan Wanita">Jam Tangan Wanita</option></select></td>
					</tr>
					<tr>
						<td>Stok</td><td> : </td><td><select class = "inputan" name = "status" value="<?php echo $data['stok']; ?>"> <option value = "Tersedia">Tersedia</option> <option value = "Tidak Tersedia">Tidak Tersedia</option>
					</tr>
					<tr>
						<td>Berat</td><td> : </td><td><input class = "inputan" type = "text" name = "berat" value="<?php echo $data['berat']; ?>">  <small><i>gram</i></small> </td>
					</tr>
					<tr>
						<td>Deskripsi Produk</td><td> : </td><td><textarea class = "inputan" rows = "4" cols = "22" name = "deskripsi" ><?php echo $data['deskripsi']; ?></textarea></td>
					</tr>
					<tr>
						<td></td><td></td><td><img class = "inputan" width = "90px" height = "100px" src = "../gambar-produk/<?php echo $data['nama_gambar']; ?>"></td>
					</tr>
					<tr>
						<td>Gambar Barang</td><td> : </td><td><input class = "inputan" type = "file" name = "gambar" > </td>
					</tr>
					<tr>
						<td>&nbsp;</td><td></td><td><input class = "inputan" type="submit" name="submit" class = "tombol-simpan" value="Ubah"/> <input class = "inputan" type="reset" name="reset" class = "tombol" value="Batal"/> &nbsp; &nbsp; <a  href="daftar-barang.php" style = "margin-top:50px; text-decoration:none;" >Kembali</a></td>
						
					</tr>
					
				</table>
				</form>
			</div>
		</div>
	
</body>
</html>