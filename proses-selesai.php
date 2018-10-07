<?php
// data pembeli

require "konek_db.php";
session_start();
date_default_timezone_set('Asia/Jakarta');

$session_id = session_id();
$time_stamp = date('Y-m-d H:i:s',time());

$total_bayar = $_POST['kurir'] + $_SESSION['harga'];

$query1 			= mysql_query("SELECT no_tagihan FROM transaksi_detail ORDER BY no_tagihan DESC LIMIT 1");
$fetch_no_tagihan 	= mysql_fetch_array($query1);
$nilaiakhir 		= $fetch_no_tagihan[0];
$no_tagihan 		= $nilaiakhir + 1;
// mendapatkan nomor tagihan detail transaksi

$nama 				= $_POST['nama'];
$notlpn 			= $_POST['notlpn'];
$provinsi			= $_POST['provinsi'];
$kota 				= $_POST['kota'];
$courier			= $_POST['courier'];
$alamat 			= $_POST['alamat'];
$keterangan 		= $_POST['keterangan'];
$status_order 		= "Belum Dibayar";
$waktu_order 		= $time_stamp;
$ongkir 			= $_POST['kurir'];
$resi 				= '';

$proses = mysql_query("INSERT INTO transaksi VALUES('$no_tagihan','$nama','$notlpn','$provinsi','$kota','$courier','$alamat','$keterangan','$status_order','$waktu_order','$total_bayar','$ongkir','$resi')");

if (!$proses) {
	echo "error";
	die();
}

# -------------------------------------------------------- #
# pindahkan dari table transaksi_temp ke transaksi detail
$query2 			= mysql_query("SELECT * FROM transaksi_temp WHERE no_session = '$session_id' ");

while ($data 	= mysql_fetch_array($query2)) {
	#simpen barangnya di tabel transaksi_detail
	mysql_query("INSERT INTO transaksi_detail VALUES('".$no_tagihan."','".$data['kd_brg']."','".$data['jumlah_brg']."')");

	#update jumlah barangnya ketika habis ada pesanan
	mysql_query("UPDATE barang SET jumlah_brg = jumlah_brg - {$data['jumlah_brg']} WHERE kd_brg = '{$data['kd_brg']}' ");

	#setelah data pemesanan tersimpan, hapus data pemesanan di tabel pemesanan sementara (transaksi_temp)
	mysql_query("DELETE FROM transaksi_temp WHERE no_tagihan_temp = {$data['no_tagihan_temp']}");
}

# -------------------------------------------------------- #

?>

<script>window.location="selesai.php?t=<?= $no_tagihan; ?>";</script>

<!-- <script type="text/javascript">
	
$(document).ready(function(){

	$.ajax({
		type: "GET",
		url: "selesai.php",
		data: {no_tagihan: <?= $no_tagihan; ?>},
		success: function(){
			window.location='selesai.php';
		}
	});
});


</script> -->