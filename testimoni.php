<div class = "lihat-produk-lain"><h3>Testimoni</h3></div>	
	<div class = "testimoni">
	<h2 style = "margin:10px;  ">Testimoni &raquo; Testimoni Pelanggan</h2>
	<center><hr width = "98%"></center>
	<h4 style = "margin:10px;  ">Silahkan isi testimoni Anda di bawah ini:</h4>
	<form action = "simpan-testimoni.php" method = "POST">
		<input style = "margin:10px;" type = "text" class = "inputan-testimoni" name = "nama" placeholder = "Nama Anda"  required><br>
		<input style = "margin:10px;" type = "text" class = "inputan-testimoni" name = "kota" placeholder = "Kota Asal Anda"  required><br>
		<input style = "margin:10px;" type = "text" class = "inputan-testimoni" name = "email" placeholder = "Email Anda"  required><br>
		<textarea style = "margin:10px;" class = "inputan-testimoni" rows = "4" cols = "35" name = "ulasan" placeholder = "Ulasan Anda" required></textarea><br>	
		<?php
		$panggil = mysql_query("SELECT kd_brg FROM barang WHERE kd_brg='$_GET[kd]'", $konek);
		$data = mysql_fetch_array($panggil);
		?>
		<input style = "margin:10px;" type = "hidden" class = "inputan-testimoni"  name = "kd"  value="<?php echo $data['kd_brg']; ?>" ><br>
		<input style = "margin:10px;margin-top:-10px;" type = "submit" name="kirim" class = "tombol" value="Kirim"  />
		<center><hr width = "98%"></center><br>
	</form>	
	
	<table border ="1" class = "tabel-testimoni">
		<tr>
			<td>Nama</td>
			<td>Asal</td>
			<td>Email</td>
			<td>Ulasan</td>
		</tr>
			<?php 
			require "konek_db.php";
			
			$batas = 4;
			
			$tampil = "select * from testimoni where kd_brg='$_GET[kd]' order by no_testi DESC LIMIT $batas";
			$tambah = mysql_query ($tampil) or die ("Gagal".mysql_error());
			$dilihat = mysql_num_rows ($tambah);
			
			$awal = 0;
			$max = 4;
			while ($row = mysql_fetch_array($tambah) and ($awal <= $max))
			{				
				$a = $row['no_testi'];
				$b = $row['nama'];
				$c = $row['kota'];
				$d = $row['email'];
				$e = $row['testimoni'];
				$kd = $row['kd_brg'];
				?>
				
		<tr>
			<td><?php echo $b; ?></td>
			<td><?php echo $c; ?></td>
			<td><?php echo $d; ?></td>
			<td><?php echo $e; ?></td>
		<?php 
			}
		?>
		</tr>
		
	</table>

	</div>
</div>