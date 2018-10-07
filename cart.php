<?php

require("config.php");

$session_id = session_id();


$tanggal = date("Y/m/d");
$jam = date("h:i:s");

if(isset($_GET['beli'])){
	$sid = session_id();
	$query = mysql_query("SELECT * from barang where kd_brg = '".$_GET['beli']."' ");
	$row = mysql_fetch_array($query);
	
	if($row['jumlah_brg'] < 1){
		echo '<script language="javascript">alert("Stok produk abis!") </script>';
	}else{
		// cek apakah produk sudah ditambahkan di tabel transaksi sementara atau belum
		$sql = mysql_query("SELECT * from transaksi_temp WHERE kd_brg='".$_GET['beli']."' AND no_session='$session_id'");
		$ketemu = mysql_num_rows($sql);

		if($ketemu >= 1){
			mysql_query("UPDATE transaksi_temp SET jumlah_brg = jumlah_brg + 1 WHERE no_session = '$session_id' AND kd_brg='".$_GET['beli']."' ");
		}
		else {
			// isi tabel
			mysql_query("INSERT INTO transaksi_temp values ('','".$_GET['beli']."','$session_id','1','$tanggal','$jam')");
		}
	}

	echo "	<script type='text/javascript'> 
				alert('Barang telah ditambahkan ke Keranjang') 
		 		history.back() 
	 		</script>";

}

function cart(){
	$session_id = session_id();

	$total = 0;
	$jumlah = 0;

	$query 		= mysql_query("SELECT * FROM barang INNER JOIN transaksi_temp ON barang.kd_brg = transaksi_temp.kd_brg WHERE no_session = '$session_id'");
	$cek 		= mysql_num_rows($query);

	if ($cek < 1) {
		echo 'Keranjang Masih Kosong!';
	}else{
		while ($data   = mysql_fetch_array($query)) {

			$jumlah = $jumlah + $data['jumlah_brg'];

			$sub = $data['jumlah_brg'] * $data['harga_barang'];
			$total = $total + $sub;
		}

		echo "<b style = 'color:black;'>Rp <span style='color:red;'>".$total."</span></b><br>";
		echo "<b style = 'color:black;'>Jumlah = <span style='color:red;'>".$jumlah."</span></b>";
		
		echo '<a href="keranjang.php" style="text-decoration:none;"><div class = "tombol-keranjang"><b>Keranjang</b></div></a>';
	}

}
	
?>