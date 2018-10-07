<div class = "lihat-produk-lain"><h3>Lihat Produk Lain</h3></div>
	<div class = "produk-lain">
		<?php
					
			require "konek_db.php";
			$tampil = "select * from barang order by dilihat DESC limit 4";
			$query = mysql_query ($tampil);
	
			$awal = 0;
			$max = 3;
			while ($row = mysql_fetch_array($query) and ($awal <= $max))
				
			{
				
			$a = $row['nama_gambar'];
			$b = $row['nama_brg'];
			$c = $row['harga_barang'];
			$d = $row['kd_brg'];
					
			?>
					
			<div class='prodak_baru_item'>
				<div class='gambar-best'><a href='produk.php?kd=<?php echo $d; ?>'><img width='149px' height='170px' src='gambar-produk/<?php echo $a ?>'/></a></div>
				<div class='nama-prodak'><a href='produk.php?kd=<?php echo $d; ?>'><b><?php echo $b ?></b></a></div>
				<div class='harga'><b>Rp. <?php echo $c ?></b></div>
				<div class='detail-beli'>
					<div class='detail'><b><a href='produk.php?kd=<?php echo $d; ?>'>Detail</a></b></div>
					<div class='beli'><b><a href='produk.php?beli=<?php echo $d; ?>'>Beli</a></b></div>
				</div>
			</div>
						
		<?php } ?>	
	</div>
</div>