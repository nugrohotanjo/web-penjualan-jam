<?php require "cart.php"; ?>

<?php
require "konek_db.php";

		$tampil = "select * from barang order by kd_brg";
		$query = mysql_query ($tampil) or die ("Gagal".mysql_error());
		$jumlah = mysql_num_rows ($query);
		
?>


<html>
<head>
	<title>Detail Produk</title>
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
		include "head.php";
		mysql_query(" UPDATE barang SET dilihat = dilihat + 1 WHERE kd_brg = '$_GET[kd]' ");
					
	?>
		
	<div id = "detail-produk">
		<div class = "menu-kiri">
		<?php
				require"sidebar.php";
		?>
		<div class = "menu-kanan">
		
		
		<?php
					
					$panggil = mysql_query("SELECT * FROM barang WHERE kd_brg='$_GET[kd]'", $konek);
					$data = mysql_fetch_array($panggil);
		
				?>
		
			<div class = "breadcumbs"><a href = "index.php">Home </a> &raquo;<a href = "cari.php?cari_produk=&kategori=<?php echo $data['kategori'] ?>"><?php echo $data['kategori'] ?> </a>&raquo;<?php echo $data['nama_brg']; ?></div>
			<div class = "judul-produk"><h2><?php echo $data['nama_brg']; ?><h2></div>
			<center><hr width = "97%"></center>
			<div class = "gambar-produk">
			<img class="parentimage"  src = "gambar-produk/<?php echo $data['nama_gambar']; ?>">
			</div>
			<div class = "tabel-detail-produk">
				<table border = 0 >
					<tr>
						<th>Kategori</th>
						<td><?php echo $data['kategori']; ?></td>
					</tr>
					
					<tr>
						<th>Stok</th>
						<td><?php echo $data['stok']; ?></td>
					</tr>
					
					<tr>
						<th>Kode</th>
						<td><?php echo $data['kd_brg']; ?></td>
					</tr>
					
					<tr>
						<th>Dilihat</th>
						<td><?php echo $data['dilihat']; ?></td>
					</tr>
					
					<tr>
						<th>Berat</th>
						<td><?php echo $data['berat']; ?> Gram</td>
					</tr>
					
					<tr>
						<th>Harga</th>
						<td>Rp <?php echo $data['harga_barang']; ?></td>
					</tr>
				</table>
	
			</div>
			<a href="produk.php?beli=<?php echo $data['kd_brg'] ?>"><div class = "add-cart"><h4>Tambah Ke Keranjang</h4></div></a>
			<br class="floating" />
			<div class = "deskripsi-produk"><h3>Deskripsi Produk</h3></div>
			<div class = "deskripsi"><p><?php echo $data['deskripsi']; ?></p></div>
			<?php
				require "testimoni.php"
			?>
	</div>
	<?php

		include "footer.php";

	?>

</body>
</html>