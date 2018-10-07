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

<?php
	require "head.php";
?>	

<div id = "sitecontainer-cek-transaksi">
		<div class = "menu-kiri">
			<div class = "menu-kiri-1">
				<ul><h4 class = "menu-kiri-customer">Customer Sevice</h4>
					<li>Costomer Sevice 1</li>
					<li><img src = "images/online.gif"></li>
					<li>Costomer Sevice 2</li>
					<li><img src = "images/online.gif"></li>
				</ul>
			</div>
			<div class = "menu-kiri-2">
				<ul><h4 class = "menu-kiri-cari">Cari Produk</h4>
					<div class = "menu-kiri-cari-1">
						<form action = "action" method = "method" enctype = "media type">
							<li><input class = "input-cari"  type = "text" name = "cari_produk" placeholder = "Seacrh"></li>
							<li>
								<select class = "input-cari" name = "kategori" value = "kategori">
								<option>Semua Kategori</option>
									<option>Jam Tangan Pria</option>
									<option>Jam Tangan Wanita</option>
								</select>
							</li>
							<li> 
								<input class = "tombol-cari" type = "submit"  name = "submit" value = "Seacrh">
							</li>
						</form>
					</div>
				</ul>
			</div>
			<div class = "menu-kiri-3">
				<ul><h4 class = "menu-kiri-terbaru">Produk Terbaru</h4>
					<div class = "menu-kiri-terbaru-1">
					<?php
					
					
					
					
					$awal = 0;
					$max = 5;
					while ($row = mysql_fetch_array($query) and ($awal <= $max))
					{
						$a = $row['nama_gambar'];
						
						
						echo			"<div class='produk-baru-detail'>";
						echo				"<div class='gambar-best-detail'><a href='#'><img width='75px' height='72px' src='gambar-produk/$a'/></a></div>";
						echo 			"</div>";
						$awal++;
					}
		
				?>	
					
					
					</div>
			</div>
		</div>
		
	<div class = "detail-bayar">
	<?php
		require "konek_db.php";
		
		$a = $_POST['notagihan'];
		$tampil = mysql_query("select * from transaksi WHERE no_tagihan='$a'");
		$cek= mysql_num_rows($tampil);
		$row= mysql_fetch_array($tampil);
		
		if($a == ""){
			echo '<script language="javascript">alert("Anda Belum Memasukan Nomor Tagihan / Transaksi"); document.location="cek-transaksi.php";</script>';	
		}
		else if($a != $row['no_tagihan']){
			echo '<script language="javascript">alert("Nomor Tagihan / Transaksi tidak ditemukan"); document.location="cek-transaksi.php";</script>';	
		}
		else{
			echo "<h2 style = 'margin:10px;  '>&raquo; Data Anda</h2>";
			echo "<center><hr width = 97%></center>";
			echo "<p style = 'margin:10px;'>Terima kasih Anda sudah berbelanja di Toko Online kami. Dan berikut ini adalah data transaksi anda.</p>";
				$ambil = mysql_query("SELECT * FROM transaksi WHERE no_tagihan ='$a'");
				$data = mysql_fetch_array($ambil);
			echo "<pre style = 'margin:10px; margin-left:20px;'>";
			echo "&raquo; Nomor Tagihan		: <span style='color:red;'><b>#".$data['no_tagihan']."</b></span><br>";
			echo "&raquo; Nama Pelanggan	: ".$data['nama']." <br>";
			echo "&raquo; No Telepon		: ".$data['notlpn']." <br>";
			echo "&raquo; Status Order		: ".$data['status_order']." <br>";
			echo "&raquo; Nomor Resi		: ".$data['resi']." <br><br>";
			echo "<a href = 'cek-transaksi.php' style ='text-decoration:none;'>Cek Transaksi Lagi</a><br><br>";
			echo "</pre>";
			echo "<center><hr width = 97%></center><br>";
		}
	?>
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