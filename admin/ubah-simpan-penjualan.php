<?php
	session_start();
	if(empty($_SESSION['user_name'])){
		echo "<script>alert('Anda belum mempunyai hak akses.'); window.location = '../login.php'</script>";
	}
	require "../konek_db.php";
	
	$status = $_POST['status'];
	$resi = $_POST['resi'];	
	$tagihan = $_POST['tagihan'];
		
		
	
	$simpan = mysql_query("UPDATE transaksi SET status_order = '$status',resi = '$resi' WHERE no_tagihan= '$tagihan' ");
	if($simpan){
						echo "<script language='javascript'>alert('Transaksi Telah Di Update'); document.location='penjualan.php';</script>";
						
				}
?>