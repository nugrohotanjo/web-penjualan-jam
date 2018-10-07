<?php

require "../konek_db.php";
session_start();
?>
<html>
<head>
	<title>Lihat Konfirmasi</title>
	<link	rel="stylesheet"	type="text/css" href="../style/styleuser.css"/>
</head>
<body bgcolor="#f9f9f9">
	
	<?php
			
			require "head.php";
			require "../konek_db.php";
			$panggil = mysql_query("SELECT * FROM transaksi_detail WHERE no_tagihan='$_GET[no_tagihan]'",$konek);
			
		?>
		<div class = "menu2">
			<div class = "isi">
				<h1>Orderan Penjualan</h1>
					<div class = "daftar-produk">
				<form action = "../admin/ubah-simpan-barang.php" enctype="multipart/form-data" method = "POST">
				<table style="margin:20px auto;" class = "tabel-barang" border= "1" cellspacing="0" cellpadding="50" width="700px" > 
					<tr>
						<th>Jumlah Pembelian</th>
						<th>Nama Barang</th>
						<th>Harga Barang</th>
					</tr>	
					<?php 
					$subtotal = 0;
					while($row = mysql_fetch_array($panggil)){
						
						$a = $row['jumlah'];
						$b = $row['kd_brg'];
						$ambil = mysql_query("SELECT * FROM barang WHERE kd_brg='$b'");
						$barang = mysql_fetch_array($ambil);
						
						$sub = $a * $barang['harga_barang'];
						$subtotal = $subtotal + $sub;
						?>
					<tr>
						<td align="center"><?php echo $a;?></td>
						<td align="center"><?php echo $barang['nama_brg'];?></td>
						<td align="center"><?php echo "Rp. ".number_format($sub,0,'.','.');?></td>	
					</tr>
					<?php } ?>
					
					</table>
				</form>
				</div>
				<hr>
				<br>
				<div style="border:1px solid black;height:auto;">
					<?php
						
					?>
						<div style="float:left; solid red;width:450px;">
							<center><h1>Detail Order</h1></center>
							<table style="10px,5px; border:0px;" border="0"  cellspacing="10" width="430px" >
								<tr>
									<td><b>Sub Total</b></td><td><?php echo "Rp. ".number_format($subtotal,0,'.','.'); ?></td>
								</tr>
								<tr>			
									<td><b>Ongkir</b></td><td>
									<?php
											$ongkir = 0;
											$tampil = mysql_query("SELECT * FROM transaksi WHERE no_tagihan = '$_GET[no_tagihan]'");
											$data = mysql_fetch_array($tampil);
											 echo "Rp. ".number_format($data['ongkir'],0,'.','.');
									?>
									</td>
								</tr>		
								<tr>
									<td><b>Total Bayar</b></td><td>
									<?php 
										$total = $subtotal + $ongkir;
										 echo "Rp. ".number_format($total,0,'.','.');
									?></td>
								</tr>
								<tr>
									<td ><b>Tanggal Order</b></td><td>
									<?php 
											$tampil = mysql_query("SELECT * FROM transaksi WHERE no_tagihan = '$_GET[no_tagihan]'");
											$data = mysql_fetch_array($tampil);
											echo "<i>".$data['waktu_order']."</i> WIB "; 
									?></td>
								</tr>
							</table>
						</div>
						
						<div style="float:right;width:550px;">
							<center><h1>Data Konfirmasi Pembayaran</h1></center>
							<table style="10px,5px;border:1px;" border="0"  cellspacing="10" width="530px" >
							<?php 
											$tampil = mysql_query("SELECT * FROM konfirmasi WHERE no_tagihan = '$_GET[no_tagihan]'");
											$data = mysql_fetch_array($tampil);
											
								echo'
							
								<tr>
									<td><b>No Tagihan	</b></td><td>'.$data['no_tagihan'].'</td>
								</tr>
								<tr>
									<td><b>Tanggal Transfer</b></td><td>'.$data['waktu_trans'].'</td>
								</tr>
								<tr>
									<td><b>Jumlah Transfer</b></td><td>'.$data['jml_trans'].'</td>
								</tr>
								<tr>
									<td><b>Nama Pentranfer</b></td><td>'.$data['nama'].'</td>
								</tr>
								<tr>
									<td><b>Email</b></td><td>'.$data['email'].'</td>
								</tr>
								<tr>
									<td><b>Keterangan</b></td><td>'.$data['ket'].'</td>
								</tr>
								<tr>
									<td><b>Bukti Transfer</b></td><td><a href="../gambar-bukti/'.$data['nama_gambar'].'"><img style ="height:300px; width:300px;" src = "../gambar-bukti/'.$data['nama_gambar'].'"></a></td>
								</tr>
								';
							?>
							</table>
							
						</div>
					</div>
			</div>
					
		</div>
	
</body>
</html>