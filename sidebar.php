			<div class = "menu-kiri-2">
				<ul><h4 class = "menu-kiri-cari">Cari Produk</h4>
					<div class = "menu-kiri-cari-1">
						<form action="cari.php" method="GET" >
							<li><input class = "input-cari"  type="text" name ="cari_produk" placeholder = "Search"></li>
							<li>
								<select class = "input-cari" name = "kategori" value = "kategori" required>
								<option value='' disabled selected>Pilih Kategori</option>
									<option value="Jam Tangan Pria">Jam Tangan Pria</option>
									<option value="Jam Tangan Wanita">Jam Tanga Wanita</option>
								</select>
							</li>
							<li> 
								<input class = "tombol-cari" type ="submit"  name = "submit">
							</li>
						</form>
					</div>
				</ul>
			</div>
			<div class = "menu-kiri-3">
				<ul><h4 class = "menu-kiri-terbaru">Produk Terbaru</h4>
					<div class = "menu-kiri-terbaru-1">
					<?php
					
					require "konek_db.php";

					$tampil = "select * from barang order by kd_brg DESC";
					$query = mysql_query ($tampil) or die ("Gagal".mysql_error());
					$jumlah = mysql_num_rows ($query);
					
					
					$awal = 0;
					$max = 5;
					while ($row = mysql_fetch_array($query) and ($awal <= $max))
					{
						$a = $row['nama_gambar'];
						$kd = $row['kd_brg'];
						
						echo			"<div class='produk-baru-detail'>";
						echo				"<div class='gambar-best-detail'><a href='produk.php?kd=$kd'><img width='75px' height='72px' src='gambar-produk/$a'/></a></div>";
						echo 			"</div>";
						$awal++;
					}
		
				?>	
					
					
					</div>
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