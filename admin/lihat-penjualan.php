<?php
session_start();
?>
<html>
<head>
	<title>Lihat Penjualan</title>
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
										$total = $subtotal + $data['ongkir'];
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
							<center><h1>Data Pembeli</h1></center>
							<table style="10px,5px;border:1px;" border="0"  cellspacing="10" width="530px" >
							<?php 
											$tampil = mysql_query("SELECT * FROM transaksi WHERE no_tagihan = '$_GET[no_tagihan]'");
											$data = mysql_fetch_array($tampil);

								# curl api get city -------------------------------------- #
		
									$curl = curl_init();

									$kota = $data['kota'];

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
								echo'
								<tr>
									<td><b>Nomor Tagihan	</b></td><td>'.$_GET['no_tagihan'].'</td>
								</tr>
								<tr>
									<td><b>Nama Pembeli	</b></td><td>'.$data['nama'].'</td>
								</tr>
								<tr>
									<td><b>No. Telp</b></td><td>'.$data['notlpn'].'</td>
								</tr>
								<tr>
									<td><b>Provinsi</b></td><td>'.$city['rajaongkir']['results']['province'].'</td>
								</tr>
								<tr>
									<td><b>Kota</b></td><td>'.$city['rajaongkir']['results']['city_name'].'</td>
								</tr>
								<tr>
									<td><b>Alamat</b></td><td>'.$data['alamat'].'</td>
								</tr>
								<tr>
									<td><b>Keterangan</b></td><td>'.$data['keterangan'].'</td>
								</tr>
								<tr>
									<td><b>Status Order</b></td><td>'.$data['status_order'].'</td>
								</tr>
								<tr>
									<td><b>Resi</b></td><td>'.$data["resi"].'</td>
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