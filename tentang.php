<?php require_once("cart.php"); ?>
<?php require_once('config.php'); ?>

<?php
require "konek_db.php";

		$tampil = "select * from barang order by kd_brg";
		$query = mysql_query ($tampil) or die ("Gagal".mysql_error());
		$jumlah = mysql_num_rows ($query);
?>

<html>
<head>
	<title>Tentang Toko Jam</title>
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
	
<div class = "sitecontainer-tentang">
<div class = "menu-kiri">
<?php
	require"sidebar.php";
?>

<div class = "detail-keranjang">		
<h1 align = "center">Tentang Toko Jam</h1>
<center><hr width = "97%"></center>
	<div class="keranjang">
	<center><img src="images/logo.png"></center><br>
	<p style = "margin-left:10px;margin-right:10px;">Toko Jam adalah Pusat Penjualan Jam Tangan murah berkualitas dengan alamat website localhost/toko_jam/index.php Toko Jam dibawah naungan manajemen CV. CARINGIN JAYAINDO.</p>
	<br>
	<p style = "margin-left:10px;margin-right:10px;">Banyak orang percaya dan setuju dengan pernyataan "Waktu adalah uang", pernyataan tersebut tidak salah. Akan tetapi, jika kita tarik lebih luas "Waktu itu adalah Kehidupan". Kesuksesan di dalam hal apapun dipupuk dari kedisiplinan yang terlebih dahulu diuji oleh waktu yang dilaksanakan oleh pribadi / individu / bangsa. Semakin maju sebuah negara semakin penting serta semakin berharga kedisiplinan waktu tersebut. Hal ini berbanding lurus dengan minat masyarakat akan sebuah jam tangan murah berkualitas. Dalam beberapa acara penting, persembahan sebuah jam tangan indah merupakan salah satu pilihan terbaik dibanding dengan hadiah mewah lainnya. Maka tidak heran, jam tangan sering diasosiasikan dengan sosok-sosok penting di dunia, seperti pemimpin negara, artis kelas dunia, atlit kelas dunia, dllsbg.</p>
	<br>
	<p style = "margin-left:10px;margin-right:10px;">Sebagai warga Indonesia, CEO Toko Jam berharap seluruh Toko Jamrs ikut serta dalam membangun negara ini dengan sadar dan menghargai atas pentingnya waktu melalui #ayoontime. Jika seluruh bangsa kita menghargai dan menggunakan waktu sebijak mungkin, Indonesia PASTI MAJU dalam waktu yang jauh lebih cepat dan kokoh secara fondasi. HIDUP INDONESIA !</p>
	<br>
	<p style = "margin-left:10px;margin-right:10px;">VISI</p>
	<br>
	<p style = "margin-left:10px;margin-right:10px;">"Menjadi bukan hanya sekedar online retailer jam tangan murah berkualitas, namun juga sebagai lokasi tujuan utama bagi setiap pelanggan untuk membangun personality dan menambah koleksi jam tangan dengan selalu menyediakan hanya produk-produk murah berkualitas dan berstandar internasional serta didukung oleh pelayanan purnajual yang berorientasi pada kepuasan pelanggan."</p>
	<br>
	<p style = "margin-left:10px;margin-right:10px;">MISI</p>
	<br>
	<p style = "margin-left:10px;margin-right:10px;">"Menjadikan Toko Jam sebagai online watchshop yang selalu memberikan kenyamanan dan keamanan serta dipercaya sebagai partner oleh setiap pelanggan dalam membangun kepribadian dan meningkatkan kepercayaan diri melalui produk jam tangan murah berkualitas prima."</p>
	<br>
	<p style = "margin-left:10px;margin-right:10px;">CV. CARINGIN JAYAINDO (localhost/toko_jam/index.php)</p>
	<p style = "margin-left:10px;margin-right:10px;">Jl. caringin raya No.10</p>
	<p style = "margin-left:10px;margin-right:10px;">Kelurahan Pancoran Mas Kecamatan Pancoran Mas</p>
	<p style = "margin-left:10px;margin-right:10px;">Telp. +6285101500xxx</p>
	<p style = "margin-left:10px;margin-right:10px;">Email: sales@tokojam.co.id</p>
	</div>
	
	

	</div>
	
	</div>
</div>
	<?php

		include "footer.php";

	?>
</body>
</html>