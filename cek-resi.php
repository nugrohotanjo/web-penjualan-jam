<?php require_once("cart.php"); ?>

<?php
require_once("config.php");
require"konek_db.php";
?>


<html>
<head>
	<title>Cek Resi</title>
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
	<h2 style = "margin:10px;  ">Cek Resi &raquo; Data Pengiriman TIKI</h2>
	<center><hr width = "98%"></center>
	<h4 style = "margin:10px;  ">Silahkan isi Nomor Resi Anda di bawah ini:</h4>
	<form action = "proses-resi.php" method = "POST" target="_BLANK">
		<input style = "margin:10px;" type = "text" class = "inputan" name='resi'  placeholder = "Nomor Resi Anda"  required><br><br>
		<input style = "margin:10px;margin-top:-10px;" type = "submit"  class = "tombol" value="Cari"  />
		<i>Hanya untuk Resi Tiki</i>
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