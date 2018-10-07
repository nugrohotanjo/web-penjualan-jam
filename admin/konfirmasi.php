<?php

require "../konek_db.php";
		session_start();
		
?>
<html>
<head>
	<title>Konfirmasi Pembayaran</title>
	<link	rel="stylesheet"	type="text/css" href="../style/styleuser.css"/>
</head>

<body bgcolor="#f9f9f9">
		<?php
			
			require "head.php";
			require "../konek_db.php";
		?>
		<div class = "menu2">
			<div class = "isi">
				<h1>Konfirmasi Pembayaran</h1>
				<div class = "daftar-produk">
				<table style = "width:100%;" border = 1 cellspacing="0" cellpadding="10" >
					<tr>
						<th>No. Tagihan</th>
						<th>Tanggal Konfirmasi</th>
						<th>Jumlah Transfer </th>
						<th>Nama Pentransfer</th>
						<th>Email</th>
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
				
					$tampil = "select * from konfirmasi ORDER BY no_konfirmasi DESC LIMIT $posisi, $batas";
					$query = mysql_query ($tampil) or die ("Gagal".mysql_error());
					$jumlah = mysql_num_rows ($query);
					
					while ($row = mysql_fetch_array($query)){
						
						$a = $row['no_tagihan'];
						$b = $row['waktu_trans'];
						$c = $row['jml_trans'];
						$e = $row['nama'];
						$f = $row['email'];
						$h = $row['jam_konfirmasi'];
						$i = $row['no_konfirmasi'];
						$j = $row['tgl_konfirmasi'];
						
					?>
					
					<tr bgcolor = "white">
						<td><?php echo $a; ?></td>
						<td><?php echo "$j | $h WIB"; ?></td>
						<td>Rp. <?php echo $c; ?></td>
						<td><?php echo $e; ?></td>
						<td><?php echo $f; ?></td>
						<td><a href = "lihat-konfirmasi.php?no_tagihan=<?php echo $a; ?>">Lihat</a></td>
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