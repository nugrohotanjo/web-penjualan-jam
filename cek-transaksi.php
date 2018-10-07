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
	<title>Cek Transaksi</title>
	<link	rel="stylesheet"	type="text/css" href="style/style.css"/>
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

<div id = "sitecontainer-cek-transaksi">
		<div class = "menu-kiri">
		<?php
				require"sidebar.php";
		?>
	<div class = "detail-bayar">
	<h2 style = "margin:10px;  ">Cek Transaksi &raquo; Data Transaksi</h2>
	<center><hr width = "98%"></center>
	<h4 style = "margin:10px;  ">Silahkan isi Nomor Transaksi Anda di bawah ini:</h4>
	<form action = "proses-cek-transaksi.php" method = "POST">
		<input style = "margin:10px;" type = "text" class = "inputan" name = "notagihan" placeholder = "Nomor Tagihan Anda"  required><br><br>
		<input style = "margin:10px;margin-top:-10px;" type = "submit" name="cari" class = "tombol" value="Cari"  />
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