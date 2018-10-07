<?php 

# curl api get city -------------------------------------- #
		
	$curl = curl_init();

	// $provinsi = $_GET['id'];

	curl_setopt_array($curl, array(
	  CURLOPT_URL => "https://api.rajaongkir.com/starter/city?id=278",
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

# ---------------------------------------------------- #

require_once("cart.php"); 
require "konek_db.php";

		$tampil = "select * from barang order by kd_brg";
		$query = mysql_query ($tampil) or die ("Gagal".mysql_error());
		$jumlah = mysql_num_rows ($query);
		
		$norek = mysql_query ("select * from info");
		$rekening = mysql_fetch_array($norek);

?>

<html>
<head>
	<title>Selesai</title>
	<link	rel="stylesheet"	type="text/css" href="style/style.css"/>
</head>
<body bgcolor="#9bc535">

<?php
	require "head.php";
?>	

<div id = "sitecontainer-selesai">
		<div class = "menu-kiri">
		<?php
				require"sidebar.php";
		?>
	<div class = "detail-selesai">
<?php

	session_destroy();	
	$t = $_GET['t'];

	$query 	= mysql_query("SELECT * FROM transaksi WHERE no_tagihan ='".$t."'");
	$data 	= mysql_fetch_array($query);

	
	echo "<h2 style = 'margin:10px;  '>&raquo; Proses Belanja Selesai</h2>";
	echo "<center><hr width = 97%></center>";
	echo "<p style = 'margin:10px;'>Terima kasih Anda sudah berbelanja di Toko Online kami. Dan berikut ini adalah data yang perlu Anda catat.</p>";
	echo "<p style = 'margin:10px;'>Total biaya untuk pembelian Produk adalah Rp. <u><b><i>".$data['totalbayar']."</i></b></u> dan biaya bisa di kirimkan melalui Rekening Bank dengan nomor rekening <i><b><u>".$rekening['norek']."</u></b></i> atas nama <i><b><u>".$rekening['atasnama']."</u></b></i>.</p>";
	echo "<p style = 'margin:10px;'>Dan barang akan kami kirim ke alamat di bawah ini</p>";
	echo "<pre style = 'margin:10px; margin-left:20px;'>";
	echo "&raquo; Nomor Tagihan		: <span style='color:red;'><b>#".$data['no_tagihan']."</b></span><br>";
	echo "&raquo; Nama Pelanggan	: ".$data['nama']." <br>";
	echo "&raquo; No Telepon		: ".$data['notlpn']." <br>";
	echo "&raquo; Provinsi		: ".$city['rajaongkir']['results']['province']." <br>";
	echo "&raquo; Kota			: ".$city['rajaongkir']['results']['city_name']." <br>";
	echo "&raquo; Alamat		: ".$data['alamat']." <br>";
	echo "&raquo; Keterangan		: ".$data['keterangan']." <br>";
	echo "&raquo; Ongkir		: Rp. ".$data['ongkir'].",- <br>";
	echo "&raquo; Total Bayar		: Rp. ".$data['totalbayar'].",- <br><br>";
		echo "*<span style='color:red;'>NB</span>: <i><small>Total bayar sudah termasuk ongkos kirim</small></i>";
	echo "</pre>";

	

	?>
	<input class = "kuitansi" type="button" value="Cetak Kwitansi" onclick="window.open('kwitansi.php?no_tagihan=<?php echo $data['no_tagihan']; ?>')" />
	<?php
		require "lihat-produk-lain.php"
	?>
	</div>
</div>


<?php

	include "footer.php";

?>
</body>
</html>