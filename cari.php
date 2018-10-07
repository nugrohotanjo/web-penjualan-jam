<?php require_once("cart.php"); ?>

<?php
require_once("config.php");
require"konek_db.php";
?>

<html>

<head>
	<title>BUKATOKO.com</title>
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
		?>
	
	<div class="menu_prodak_baru" >
		<h2>Mencari Jam "<?php echo $_GET['cari_produk']?>"</h2>
	</div>
	<div id='prodak_baru'>
		<?php
				
		$batas = 10;
		$pg = isset( $_GET['pg'] ) ? $_GET['pg'] : "";
 
		if(empty($pg)) {
			$posisi = 0;
			$pg = 1;
		} else {
			$posisi = ( $pg - 1 ) * $batas;
		}
				
		$cari_produk = $_GET['cari_produk'];		
		$kategori = $_GET['kategori'];
				
			$tampil = "SELECT * FROM barang WHERE nama_brg like '%$cari_produk%' AND kategori = '$kategori' limit $posisi, $batas";
			$query = mysql_query ($tampil) or die ("Gagal".mysql_error());
			$jumlah = mysql_num_rows ($query);
			
			if($jumlah == 0){
				echo "<center>Maaf Produk <b>".$cari_produk."</b> tidak ditemukan, Cari barang lain!";
				echo '<form action="cari.php" method="GET" >
							<li><input class = "input-cari"  type="text" name ="cari_produk" placeholder = "Search"></li>
							<li>
								<select class = "input-cari" name = "kategori" value = "kategori" required>
								<option value="" disabled selected>Pilih Kategori</option>
									<option value="Jam Tangan Pria">Jam Tangan Pria</option>
									<option value="Jam Tangan Wanita">Jam Tanga Wanita</option>
								</select>
							</li>
							<li> 
								<input class = "tombol-cari" type ="submit"  name = "submit">
							</li>
						</form></center>';
			}
			
			while ($row = mysql_fetch_array($query))
			{
				$a = $row['nama_gambar'];
				$b = $row['nama_brg'];
				$c = $row['harga_barang'];
				$d = $row['kd_brg'];
				echo			"<div class='prodak_baru_item'>";
				echo				"<div class='gambar-best'><a href='produk.php?kd=$d'><img width='149px' height='170px' src='gambar-produk/$a'/></a></div>";
				echo				"<div class='nama-prodak'><a href='produk.php?kd=$d'><b>$b</b></a></div>";
				echo				"<div class='harga'><b>Rp. $c</b></div>";
				echo				"<div class='detail-beli'>";
				echo					"<a href='produk.php?kd=$d'><div class='detail'><b>Detail</b></div></a>";
				echo					"<a href='index.php?beli=$d'><div class='beli'><b>Beli</b></div></a>";
				echo				"</div>";
				echo 			"</div>";
				$awal++;
			}
			// membuat halaman
			//hitung jumlah barang
			$jml_data = mysql_num_rows(mysql_query("SELECT * FROM barang WHERE kategori='$kategori'"));
			// hitung jumlah halaman
			$JmlHalaman = ceil($jml_data/$batas);
			
			//navigasi kesebelumnya
			if ( $pg > 1 ) {
				$link = $pg-1;
				$prev = "<a href='?pg=$link'>Sebelumnya </a>";
			} else {
				$prev = "Sebelumnya ";
			}
			
			//Navigasi nomor
			$nmr = '';
			for ( $i = 1; $i<= $JmlHalaman; $i++ ){
 
				if ( $i == $pg ) {
					$nmr .= $i . " ";
				} else {
					$nmr .= "<a href='?pg=$i'>$i</a> ";
				}
			}
			
			//Navigasi ke selanjutnya
			if ( $pg < $JmlHalaman ) {
				$link = $pg + 1;
				$next = " <a href='?pg=$link'>Selanjutnya</a>";
			} else {
				$next = " Selanjutnya";
			}
			
			
		?>	
		
	</div>
	
	<div class="info_terbaru">
		<center><?php echo $prev." | ".$nmr . $next; ?></center>
	</div>
	
	
	
	
	<?php

			include "footer.php";

	?>

</body>

</html>