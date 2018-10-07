<?php

require "../konek_db.php";
session_start();
?>

<html>
<head>
	<title>Transaksi Penjualan</title>
	<link	rel="stylesheet"	type="text/css" href="../style/styleuser.css"/>
</head>
<body bgcolor="#f9f9f9">
		<?php
			
			require "head.php";
			require "../konek_db.php";
		?>
		<div class = "menu2">
			<div class = "isi">
				<h1>Transaksi Penjualan</h1>
				<div class = "daftar-produk">
				<table style = "width:100%;" border = 1 cellspacing="0" cellpadding="10" >
					<tr>
						<th>No. Transaksi</th>
						<th>Tanggal Order</th>
						<th>Nama Pembeli</th>
						<th>Kota</th>
						<th>Status Order</th>
						<th colspan="2">Tindakan</th>
					<tr>
				<?php 
					$batas = 10;
					$pg = isset( $_GET['pg'] ) ? $_GET['pg'] : "";
 
					if(empty($pg)) {
						$posisi = 0;
						$pg = 1;
					} else {
						$posisi = ( $pg - 1 ) * $batas;
					}
				
					$tampil = "select * from transaksi ORDER BY no_tagihan DESC LIMIT $posisi, $batas";
					$query = mysql_query ($tampil) or die ("Gagal".mysql_error());
					$jumlah = mysql_num_rows ($query);
					
					while ($row = mysql_fetch_array($query)){
						
						$a = $row['no_tagihan'];
						$b = $row['waktu_order'];
						$c = $row['nama'];
						$e = $row['kota'];
						$f = $row['status_order'];

						# curl api get city -------------------------------------- #
		
							$curl = curl_init();

							$kota = $row['kota'];

							curl_setopt_array($curl, array(
							  CURLOPT_URL => "https://api.rajaongkir.com/starter/city?id=$kota",
							  CURLOPT_RETURNTRANSFER => true,
							  CURLOPT_ENCODING => "",
							  CURLOPT_MAXREDIRS => 10,
							  CURLOPT_TIMEOUT => 30,
							  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
							  CURLOPT_CUSTOMREQUEST => "GET",
							  CURLOPT_HTTPHEADER => array(
							    "key: b9e4d5305b25625d54c7bb77a9302b94"
							  ),
							));

							$response = curl_exec($curl);
							$err = curl_error($curl);

							curl_close($curl);

							$city = json_decode($response, true);

						# -------------------------------------------------------- #
						
					?>
					
					<tr bgcolor = "white">
						<td><?= $a; ?></td>
						<td><?= $b."WIB"; ?></td>
						<td><?= $c; ?></td>
						<td><?= $city['rajaongkir']['results']['city_name']; ?></td>
						<td><span style="color:red;"><?php echo $f; ?></span></td>
						<td><a href = "lihat-penjualan.php?no_tagihan=<?php echo $a; ?>">Lihat</a></td><td><a href = "ubah-penjualan.php?no_tagihan=<?php echo $a; ?>">Ubah</td>
					</tr>
				<?php } 
			// membuat halaman
			//hitung jumlah barang
			$jml_data = mysql_num_rows(mysql_query("SELECT * FROM transaksi"));
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
				
				</table>
				<center><?php echo $prev." | ".$nmr . $next; ?></center>
			</div>
			</div>
		</div>
	
</body>
</html>