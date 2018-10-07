<?php 
require_once('config.php'); 
require "konek_db.php";
?>

<html>
<head>
	<title>Detail Keranjang</title>
	<link	rel="stylesheet"	type="text/css" href="style/style.css"/>
</head>
<body bgcolor="#9bc535">

<?php
	require "head.php";
?>	
	
<div id = "sitecontainer-keranjang">
<div class = "menu-kiri">
<?php
	require"sidebar.php";
?>

<div class = "detail-keranjang">		
<h1 align = "center">Keranjang Belanja</h1>
<center><hr width = "80%"></center>
	<div class="keranjang">
	<table border="0" class="tabel-keranjang" cellpadding="10">
				<tr style="background-color: #9bc535;">
					<th>No.</th>
					<th>Nama Barang</th>
					<th>Jumlah</th>
					<th>Harga Satuan</th>
					<th>Sub Total</th>
					<th>Opsi</th>
				</tr>
				
<?php

	$session_id = session_id();

	$tampil = mysql_query("SELECT barang.kd_brg, barang.nama_brg, barang.harga_barang, transaksi_temp.jumlah_brg FROM barang INNER JOIN transaksi_temp ON barang.kd_brg = transaksi_temp.kd_brg WHERE transaksi_temp.no_session = '$session_id' ");
	$jumlah = mysql_num_rows($tampil);
	$id_session = session_id();

	$total = 0;
	$no = 1;


	while ($data = mysql_fetch_array($tampil)) {

		if($no % 2 == 0){
			$warna = "#fbf4b5";
		} else {
			$warna = "#fff17e";
		}

		$sub = $data['harga_barang'] * $data['jumlah_brg'];


		echo "<tr bgcolor='".$warna."'>";
		echo "<td>".$no."</td>";
		echo "<td>".$data['nama_brg']."</td>";
		echo "<td>".$data['jumlah_brg']."</td>";
		echo "<td>".number_format($data['harga_barang'],0,',','.')."</td>";
		echo "<td>".number_format($sub,0,',','.')."</td>";
		echo "<td align='center'>
				<a href='keranjang.php?kurangi=".$data['kd_brg']."'>[-]</a> 
				<a href='keranjang.php?tambah=".$data['kd_brg']."'>[+]</a> 
				<a href='keranjang.php?hapus=".$data['kd_brg']."' onclick='return confirm(\'Anda Yakin?\');'>[x]</a><br>
			</td>";
		echo "</tr>";
		$no++;

		$total = $total + $sub;
		
	}
?>

				

	<?php


	if($total == 0){
		echo '<tr bgcolor="#fff17e"><td colspan="5" align="center">Keranjang belanja masih kosong!</td></tr></table>';
		echo '<p><div>
			<a href="index.php"><button style="margin-left:80px;color: white;padding: 7px 15px;background-color: #4CAF50;">&laquo; Lanjutkan Belanja</button></a>
			</div></p>';
	} else {
		$_SESSION['harga'] = $total;
		echo '
			<tr style="background-color: #9bc535;"><td colspan="4" align="right"><b>Total :</b></td><td align="right"><b>Rp. '.number_format($total,0,',','.').'</b></td></td></td><td></td></tr></table>
			<p><div>
			<a href="index.php"><button style="margin-left:80px;color: white;padding: 7px 15px;background-color: #4CAF50;">&laquo; Lanjutkan Belanja</button></a>
			<a href="bayar.php"><button style="color: white;padding: 7px 15px;background-color: #f44336;">Lanjut &raquo;</button></a>
			</p>
			</div>
		';
	}
	?>

	<?php

	if(isset($_GET['tambah'])){

		$kode_brg = mysql_real_escape_string($_GET['tambah']);

		$query = mysql_query("SELECT 	barang.jumlah_brg AS jml_brg, 
									 	transaksi_temp.jumlah_brg AS jumlah_brg
										FROM barang 	INNER JOIN transaksi_temp 
										ON barang.kd_brg = transaksi_temp.kd_brg 
										WHERE barang.kd_brg 	='$kode_brg' 
										AND no_session 			='$session_id' ");
		$data = mysql_fetch_array($query);



		if ($data['jumlah_brg'] >= $data['jml_brg'] ) {
			echo '<script language="javascript">alert("Stok barang tidak mencukupi");</script>';
		}else{
			mysql_query("UPDATE transaksi_temp SET jumlah_brg = jumlah_brg + 1 WHERE kd_brg = '$kode_brg' ");
			echo "<meta http-equiv='refresh' content='0;keranjang.php' />";
		}


	}elseif(isset($_GET['kurangi'])){

		$query = mysql_query("SELECT * FROM transaksi_temp WHERE kd_brg ='".$_GET['kurangi']."' AND no_session = '".$id_session."' ");
		$data = mysql_fetch_array($query);


		if ($data['jumlah_brg'] > 1) {
			mysql_query("UPDATE transaksi_temp SET jumlah_brg = jumlah_brg - 1 WHERE kd_brg = '".$_GET['kurangi']."' ");
		}else{						
			mysql_query("DELETE FROM transaksi_temp WHERE kd_brg = '".$_GET['kurangi']."' AND no_session = '".$id_session."' ");
		}

		echo "<meta http-equiv='refresh' content='0;keranjang.php' />";
	}elseif(isset($_GET['hapus'])){
		mysql_query("DELETE FROM transaksi_temp WHERE kd_brg = '".$_GET['hapus']."' ");
		echo "<meta http-equiv='refresh' content='0;keranjang.php' />";
	}
	?>

</table>
<br>
<?php
	require "lihat-produk-lain.php"
?>

</div>
	
	

</div>
	
	</div>
	<?php

		include "footer.php";

	?>
</body>
</html>