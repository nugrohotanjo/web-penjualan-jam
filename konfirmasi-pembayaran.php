<?php require_once("cart.php"); ?>

<?php
require_once("config.php");
require"konek_db.php";
?>


<?php
require "konek_db.php";
		$tampil = "select * from barang order by kd_brg";
		$query = mysql_query ($tampil) or die ("Gagal".mysql_error());
		$jumlah = mysql_num_rows ($query);
?>


<html>
<head>
	<title>Konfirmasi Pembayaran</title>
	<link	rel="stylesheet"	type="text/css" href="style/style.css"/>
	<link href="jquery-ui-1.11.4/smoothness/jquery-ui.css" rel="stylesheet" />
	<script src="jquery-ui-1.11.4/external/jquery/jquery.js"></script>
	<script src="jquery-ui-1.11.4/jquery-ui.js"></script>
	<script src="jquery-ui-1.11.4/jquery-ui.min.js"></script>
	<link rel="stylesheet" href="jquery-ui-1.11.4/jquery-ui.theme.css">
	<script>
		$(document).ready(function(){
		$("#tanggal").datepicker({
		})
	})
	</script>
</head>
<body bgcolor="#9bc535">
<div id = "keranjang-belanja">
		<div class = "keranjang-belanja-detail">
		<?php cart(); ?>
		</div>
		<div class = "keranjang-belanja-gambar">
			<img src="images/keranjang.jpg" width="60px" height="70px"/>
		</div>
	</div>


<?php
	require "head.php";
?>	

<div id = "sitecontainer-konfir-pem">
		<div class = "menu-kiri">
		<?php
				require"sidebar.php";
		?>
	<div class = "detail-bayar">
	<h2 style = "margin:10px;  ">Konfirmasi Pembayaran &raquo; Data Transaksi</h2>
	<center><hr width = "98%"></center>
	<form action = "proses-konfirmasi.php" enctype="multipart/form-data" method = "POST" >
		<input style = "margin:10px;" type = "text" class = "inputan" name = "notagihan" placeholder = "Nomor Tagihan Anda"  required><br>
		<input style = "margin:10px;" type = "text" class = "inputan" name = "waktutrans" id = "tanggal" placeholder = "Waktu Transfer"  required><br>
		<input style = "margin:10px;" type = "text" class = "inputan" name = "jmltrans" placeholder = "Jumlah Transfer (Rp)"  required><br>
		<input style = "margin:10px;" type = "text" class = "inputan" name = "nama" placeholder = "Nama Anda"  required><br>
		<input style = "margin:10px;" type = "text" class = "inputan" name = "email" placeholder = "Alamat Email"  required><br>
		<input style = "margin:10px;" type = "text" class = "inputan" name = "notlpn" placeholder = "Nomor Telepon/HP"  required><br>
		<textarea style = "margin:10px;" class = "inputan" name = "ket" rows = "4" cols = "22" placeholder = "Ket. Tambahan"  required></textarea><br>
		<h4 style = "margin:10px;  ">Masukan Bukti Pembayaran Anda:</h4>
		<input style = "margin:10px;" type = "file" class = "inputan" name = "gambar"><br><br>
		<input style = "margin:10px;margin-top:-10px;" type = "submit" name="cari" class = "tombol" value="Kirim"  />
		<center><hr width = "98%"></center><br>
	</form>	
	<?php
		require "lihat-produk-lain.php"
	?>

	</div>
	
</div>


<?php

	include "footer.php";

?>


</body>
</html>
