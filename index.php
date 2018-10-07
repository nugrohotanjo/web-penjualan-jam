<?php require_once("cart.php"); ?>

<?php
require_once("config.php");
require"konek_db.php";
?>

<html>

<head>
	<title>TOKOJAM.com</title>
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
	<!--Start of Tawk.to Script-->
	<script type="text/javascript">
		var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
		(function(){
			var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
			s1.async=true;
			s1.src='https://embed.tawk.to/581c4a4c1e35c727dc21e073/default';
			s1.charset='UTF-8';
			s1.setAttribute('crossorigin','*');
			s0.parentNode.insertBefore(s1,s0);
		})();
	</script>
	<!--End of Tawk.to Script-->

	<?php
	include "head.php";
	?>

	<div class="menu_prodak_baru" >
		<h2><center>Produk Paling Banyak Dilihat</center></h2>
	</div>
	<div id="best_seller">

		<?php 
		require"konek_db.php";
		$best = "select * from barang order by dilihat DESC LIMIT 5";
		$tambah = mysql_query ($best) or die ("Gagal".mysql_error());
		$dilihat = mysql_num_rows ($tambah);

		$awal = 0;
		$max = 4;
		while ($row = mysql_fetch_array($tambah) and ($awal <= $max))
		{				
			$a = $row['nama_gambar'];
			$b = $row['nama_brg'];
			$c = $row['harga_barang'];
			$d = $row['kd_brg'];

			?>

			<div class='best_seller_item'>
				<div class='gambar-best'><a href='produk.php?kd=<?php echo $d; ?>'><img  width='149px' height='170px' src='gambar-produk/<?php echo $a; ?>'/></a></div>
				<div class='nama-prodak'><a href='produk.php?kd=<?php echo $d; ?>'><b><?php echo $b; ?></b></a></div>
				<div class='harga'><b>Rp <?php echo $c; ?></b></div>
				<div class='detail-beli'>
					<a href='produk.php?kd=<?php echo $d; ?>'><div class='detail'><b>Detail</b></div></a>
					<a href='index.php?beli=<?php echo $d; ?>'><div class='beli'><b>Beli</b></div></a>
				</div>
			</div>



		<?php } ?>	
	</div>

	<div class="menu_prodak_baru">
		<h2><center>Produk Terbaru Toko Jam</center></h2>
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

		$tampil = "SELECT * FROM barang ORDER BY kd_brg DESC limit $posisi, $batas";
		$query = mysql_query ($tampil) or die ("Gagal".mysql_error());
		$jumlah = mysql_num_rows ($query);


		$awal = 0;
		$max = 9;
		while ($row = mysql_fetch_array($query) and ($awal <= $max))
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
		$jml_data = mysql_num_rows(mysql_query("SELECT * FROM barang"));
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