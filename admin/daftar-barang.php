<?php
	session_start();
	if(empty($_SESSION['user_name'])){
		echo "<script>alert('Anda belum mempunyai hak akses.'); window.location = '../login.php'</script>";
	}
require "../konek_db.php";
		
		
?>

<html>
<head>
	<title>Daftar Barang</title>
	<link	rel="stylesheet"	type="text/css" href="../style/styleuser.css"/>
</head>
<body bgcolor="#f9f9f9">
		<?php
			
			require "head.php";
			require "../konek_db.php";
		?>
		<div class = "menu2">
			<div class = "isi">
				<h1>Daftar Produk</h1>
				<div class = "daftar-produk">
				<table style = "width:100%;" border = 1 cellspacing="0" cellpadding="10" >
					<tr>
						<th>Nama Produk</th>
						<th>Kode Barang</th>
						<th>Harga</th>
						<th>Stok</th>
						<th>Kategori</th>
						<th>Tanggal</th>
						<th>Dilihat</th>
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
					
					$tampil = "select * from barang order by kd_brg DESC LIMIT $posisi, $batas";
					$query = mysql_query ($tampil) or die ("Gagal".mysql_error());
					$jumlah = mysql_num_rows ($query);
					
					while ($row = mysql_fetch_array($query)){
						
						$a = $row['nama_brg'];
						$b = $row['kd_brg'];
						$c = $row['harga_barang'];
						$d = $row['stok'];
						$e = $row['kategori'];
						$f = $row['tanggal'];
						$g = $row['dilihat'];
					?>
					
					<tr bgcolor = "white">
						<td><?php echo $a; ?></td>
						<td><?php echo $b; ?></td>
						<td><?php echo $c; ?></td>
						<td><?php echo $d; ?></td>
						<td><?php echo $e; ?></td>
						<td><?php echo $f; ?></td>
						<td><?php echo $g; ?></td>
						<td><a href = "ubah-barang.php?kd=<?php echo $b; ?>">Ubah</a></td><td><a href = "hapus-barang.php?kd=<?php echo $b; ?>">Hapus</td>
					</tr>
				<?php }

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
				
				</table>
				<center><?php echo $prev." | ".$nmr . $next; ?></center>
			</div>
			</div>
		</div>
	
</body>
</html>