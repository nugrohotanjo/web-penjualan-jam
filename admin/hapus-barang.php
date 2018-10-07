<?php
	session_start();
	if(empty($_SESSION['user_name'])){
		echo "<script>alert('Anda belum mempunyai hak akses.'); window.location = '../login.php'</script>";
	}
	require "../konek_db.php";
	
	$a = $_GET[kd];
	
	
	$tampil = mysql_query("SELECT * FROM barang WHERE kd_brg='$a'", $konek);
	$data = mysql_fetch_array($tampil);
	
	$gambar = $data['nama_gambar'];
	
	
	$target = "../gambar-produk/$gambar";
	if(file_exists($target)){
		unlink($target);
		
	}
	
	$qry = mysql_query ("delete from barang where kd_brg='$a'");
	if ($qry){
		header("Refresh:0; url=daftar-barang.php");
		echo "<script type='text/javascript'> alert('Barang Telah Terhapus') </script>";
	}
		
?>
	