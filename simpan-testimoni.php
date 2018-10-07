<?php
	require "konek_db.php";
	
	$kd = $_POST['kd'];
	$a = $_POST['nama'];
	$b = $_POST['kota'];
	$c = $_POST['email'];
	$d = $_POST['ulasan'];
	$e = date("dmy");
	
	$perintah = "INSERT INTO testimoni values ('','$kd','$a','$b','$c','$d','$e')";
	$simpan = mysql_query ($perintah);
	if($simpan){
		header("Refresh:0; url=produk.php?kd=$kd");
		echo "<script type='text/javascript'> alert('Terimakasih Telah Memberikan Testimoni') </script>";
	}
	else{
		header("Refresh:0; url=produk.php?kd=$kd");
		echo "<script type='text/javascript'> alert('Maaf Testimoni Tidak Tersimpan ,Silahkan Menghubungi Kami') </script>";
	}

?>